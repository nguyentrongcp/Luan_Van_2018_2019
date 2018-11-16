<?php

namespace App\Http\Controllers\Customer;

use App\Comment;
use App\Favorite;
use App\Foody;
use App\FoodyType;
use App\Image;
use App\ImageComment;
use App\Like;
use App\MiniComment;
use App\Order;
use App\Vote;
use App\VoteDetail;
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
        $foody_type = $foody->foodyType;
        $votes = $foody->getVoted();
        $images = DB::table('foodies')->join('comments', 'foodies.id', 'foody_id')
            ->join('image_comments', 'comments.id', 'comment_id')->join('images', 'image_id', 'images.id')
            ->select('images.link')->get();

        return view('customer.foody.index', compact(['foody', 'foody_type', 'images', 'votes']));
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
        if (Order::where('order_code', $request->value)->count() > 0) {
            $order_code = strtoupper($request->value);
            $url = route('payment.order.show', $order_code);
            $date = date_format(date_create(Order::where('order_code', $order_code)->first()->order_created_at), 'd-m-Y H:i');
            return Response("
                <div class='row search-result-row search-order' data-target='$url'>
                    <a href='#' class='search-result-content' style='width: 100%'>
                        <i class='material-icons left center-align' style='font-size: 40px;line-height: 64px;width: 64px;margin-right: 0;'
                        >assignment</i>
                        <span class='col' style='line-height: 35px;width: calc(100% - 64px);font-size: 18px'>
                            Đ.hàng: <b>$order_code</b>
                        </span>
                        <span class='col' style='font-size: 12px'>
                            Ngày $date
                        </span>
                    </a>
                </div>
            ");
        }
        $slug = str_slug($request->value);
        $foodies = Foody::where('slug','like', "%$slug%")->get();
        $data = '';
        foreach($foodies as $key => $foody) {
            $url = route('customer.foody.show', $foody->slug);
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
                <div class=\"row search-result-row search-foody\" data-target='$url'>
        <img src='$foody->avatar'>
        <div class=\"search-result-content\">
            <div class=\"col s12 search-result-title truncate\">$foody->name</div>
            <div class=\"col s12 search-result-cost\">$cost<sup>đ</sup>$sales_off</div>
            <div class=\"col s12 search-result-rate\">";
            if ($foody->getVoted() != null) {
                for($i=1; $i<=5; $i++) {
                    if ($i <= $foody->getVoted()->average) {
                        $data .= "<i class='fas fa-star'></i>";
                    }
                    elseif(number_format($foody->getVoted()->average) == $i) {
                        $data .= "<i class='fas fa-star-half-alt'></i>";
                    }
                    else {
                        $data .= "<i class='far fa-star'></i>";
                    }
                }
            }
            $data .= "    
            </div>
        </div>
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

    public function like(Request $request) {
        if (Auth::guard('customer')->check()) {
            $foody_id = $request->foody_id;
            $customer_id = Auth::guard('customer')->user()->id;
            $number_of_liked = Foody::find($foody_id)->getLiked();

            $liked = null;
            if (Foody::find($foody_id)->checkLiked($customer_id)) {
                $liked = Foody::find($foody_id)->likes()->where('customer_id', $customer_id)->first();
            }

            if ($liked != null) {
                $liked->delete();

                return Response(['text' => 'Thích', 'number_of_liked' => $number_of_liked - 1]);
            }
            else {
                $like = new Like();
                $like->customer_id = $customer_id;
                $like->foody_id = $foody_id;
                $like->save();

                return Response(['text' => 'Bỏ thích', 'number_of_liked' => $number_of_liked + 1]);
            }
        }
    }

    public function favorite(Request $request) {
        if (Auth::guard('customer')->check()) {
            $customer_id = Auth::guard('customer')->user()->id;

            $favorited = null;
            $foody = Foody::find($request->foody_id);
            if ($foody == null) {
                return Response(['status' => 'error']);
            }
            if ($foody->checkFavorited($customer_id)) {
                $foody->favorites()->where('customer_id', $customer_id)->first();
            }
            $favorited = Favorite::where('customer_id', $customer_id)->where('foody_id', $request->foody_id)->first();

            if ($favorited != null) {
                $favorited->delete();

                return Response('unfavorited');
            }
            else {
                $favorite = new Favorite();
                $favorite->customer_id = $customer_id;
                $favorite->foody_id = $request->foody_id;
                $favorite->save();

                return Response('favorited');
            }
        }
    }

    public function rating(Request $request) {
        if (($request->attitude < 1 && $request->attitude > 5) || ($request->cost < 1 && $request->cost > 5) ||
            ($request->quality < 1 && $request->quality > 5)) {
            return Response([
                'status' => 'error',
                'content' => 'Đánh giá không hợp lệ!'
            ]);
        }
        if (Auth::guard('customer')->check()) {
            $customer_id = Auth::guard('customer')->user()->id;
            if (VoteDetail::where('customer_id', $customer_id)->where('foody_id', $request->foody_id)->count() > 0) {
                $vote_detail = VoteDetail::where('customer_id', $customer_id)->where('foody_id', $request->foody_id)->first();
                $vote_detail->attitude = $request->attitude;
                $vote_detail->cost = $request->cost;
                $vote_detail->quality = $request->quality;
                $vote_detail->update();
            }
            else {
                $vote_detail = new VoteDetail();
                $vote_detail->attitude = $request->attitude;
                $vote_detail->cost = $request->cost;
                $vote_detail->quality = $request->quality;
                $vote_detail->foody_id = $request->foody_id;
                $vote_detail->customer_id = $customer_id;
                $vote_detail->save();
            }
            $vote = Vote::where('foody_id', $request->foody_id)->first();
            $vote->attitude = VoteDetail::where('foody_id',$request->foody_id)->avg('attitude');
            $vote->cost = VoteDetail::where('foody_id',$request->foody_id)->avg('cost');
            $vote->quality = VoteDetail::where('foody_id',$request->foody_id)->avg('quality');
            $vote->average = number_format(($vote->attitude + $vote->cost + $vote->quality) / 3, 1);
            $vote->update();
        }
        else {
            return Response([
                'status' => 'error',
                'content' => 'Bạn chưa đăng nhập!'
            ]);
        }
    }

    public function deleteComment(Request $request) {
        if($request->type == 'comment') {
            $comment = Comment::find($request->comment_id);
            $comment->delete();
        }
        else {
            $comment = MiniComment::find($request->comment_id);
            $comment->delete();
        }

        return Response(['status' => 'success',
            'content' => "<i class='material-icons left green-text'>check</i> Xóa bình luận thành công"]);
    }

    public function miniComment(Request $request) {
        $user = Auth::guard('customer')->user();
        $mini_comment = new MiniComment();
        $mini_comment->customer_id = $user->id;
        $mini_comment->content = $request->get('content');
        $mini_comment->date = date('Y-m-d H:i:s');
        $mini_comment->comment_id = $request->comment_id;
        $mini_comment->save();

        $date = date_format(date_create($mini_comment->date), 'd-m-Y H:i:s');

        return Response([
            'status' => 'success',
            'content' => "
                <div class=\"col comment-comment-container\">
                                <span class=\"comment-avatar\">
                                    <img class=\"circle\" src='$user->avatar'>
                                </span>
                                <div class=\"col comment-comment-content-container\">
                                    <span class=\"comment-comment-name\"><b>$user->name</b></span>
                                    <span id=\"comment-comment-content\">$mini_comment->content</span>
                                </div>
                                <div class=\"col comment-comment-time-container\">
                                    $date
                                    <span data-id=\"$mini_comment->id\" class=\"delete-mini-comment\"
                                                  style=\"cursor: pointer; margin-left: 10px;font-weight: 500\">Xóa</span>
                                </div>
                            </div>
            "
        ]);
    }
}
