<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodyController extends Controller
{
    public function index($slug) {
        $foody = Foody::where('slug', $slug)->first();

        return view('customer.foody.index', compact(['foody']));
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
}
