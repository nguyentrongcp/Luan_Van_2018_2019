<?php

namespace App\Http\Controllers\Customer;

use App\Comment;
use App\Foody;
use App\FoodyType;
use App\Image;
use App\ImageComment;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class FoodyController extends Controller
{
    public function index($slug) {
        $foody = Foody::where('slug', $slug)->first();
        $foody_type = FoodyType::find($foody->id);
        $images = DB::table('foodies')->join('comments', 'foodies.id', 'foody_id')
            ->join('image_comments', 'comments.id', 'comment_id')->join('images', 'image_id', 'images.id')
            ->select('images.link')->get();

        return view('customer.foody.index', compact(['foody', 'foody_type', 'images']));
    }

    public function testsms() {
        $APIKey="ABF7C090E3877B230AA95012AC6BA4";
        $SecretKey="C2228C9FFBE5EE3C3D3926DA9E13BF";
        $YourPhone='0339883047';
        $Content="Ma OTP cua ban la: 571024";

        $SendContent=urlencode($Content);
        $data="http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&SmsType=6";

        $curl = curl_init($data);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        $obj = json_decode($result,true);
        dd($obj);
    }

    public function search(Request $request) {
        $slug = str_slug($request->value);
        $foodies = Foody::where('slug','like', "%$slug%")->get();
        $data = '';
        foreach($foodies as $key => $foody) {
            if ($key == 0) {
                $divider = '';
            }
            else {
                $divider = "<div class=\"divider\"></div>";
            }
            $cost = number_format($foody->getSaleCost());
            $sales_off = '';
            if ($foody->isSalesOff()) {
                $sale_percent = $foody->getSalePercent();
                $sales_off = "";
            }
            $data .= "$divider
                <div class=\"row search-result-row\">
        <img src='$foody->avatar'>
        <a href='#' class=\"search-result-content\">
            <div class=\"col s12 search-result-title truncate\">$foody->name</div>
            <div class=\"col s12 search-result-cost\">$cost<sup>đ</sup>$sales_off</div>
            <div class=\"col s12 search-result-rate\">
                <i class=\"material-icons\">star</i>
                <i class=\"material-icons\">star</i>
                <i class=\"material-icons\">star</i>
                <i class=\"material-icons\">star_half</i>
                <i class=\"material-icons\">star_half</i>
            </div>
        </a>
    </div>
            ";
        }

        return Response($data);
    }

    public function comment(Request $request) {
        $customer_id = Auth::guard('customer')->user()->id;

        $validate = Validator::make(
            $request->all(),
            [
                'title' => array('required', 'max:255'),
                'content' => array('required', 'max:4000'),
            ],
            [
                'required' => 'Vui lòng không bỏ trống :attribute!',
                'max' => ':attribute không được vượt quá :max ký tự!',
//                'regex' => ':attribute không đúng định dạng!'
            ],
            [
                'title' => 'Tiêu đề',
                'content' => 'Nội dung'
            ]
        );

        if ($validate->fails()) {
            return Response(['errors' => $validate->getMessageBag()->toArray(), 'status' => 'error']);
        }

        $content = str_replace('\\n', '<br>', $request->get('content'));
        $comment = new Comment();
        $comment->content = $request->get('content');
        $comment->title = $request->title;
        $comment->date = date('Y-m-d H:i:s');
        $comment->customer_id = $customer_id;
        $comment->foody_id = $request->foody_id;
        $comment->save();

        if ($request->images != '') {
            foreach($request->images as $key => $image) {
                $img = explode(";base64,", $image);
                $img_type_aux = explode("image/", $img[0]);
                $img_type = $img_type_aux[1];
                $img_base64 = base64_decode($img[1]);
                $name = "$customer_id-".time()."-$key.$img_type";
                file_put_contents("customer/image_comment/$name", $img_base64);

                $image_db = new Image();
                $image_db->link = "/customer/image_comment/$name";
                $image_db->save();

                $image_comment = new ImageComment();
                $image_comment->image_id = $image_db->id;
                $image_comment->comment_id = $comment->id;
                $image_comment->save();
            }
        }

        return Response(['status' => 'success']);

//        if ($request->hasFile('files')) {
//            return Response('fdsfsd');
//        }
    }
}
