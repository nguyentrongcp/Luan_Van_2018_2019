<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use App\FoodyType;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $foody_types = FoodyType::where('foody_type_id', null)->get();
        $foodies = Foody::all();

        return view('customer.index.index', compact(['foody_types', 'foodies']));
    }

    public function showFoody($slug) {
        $data = "<div class=\"row\"></div>";

        $foody_type = FoodyType::where('slug', $slug)->first();

        if ($foody_type->foody_type_id == null) {
            $foody_types = FoodyType::where('foody_type_id', $foody_type->id)->get();
            foreach($foody_types as $type) {

                $foodies = $type->foodies;
                foreach($foodies as $foody) {
                    $data .= "<div class=\"col s12 m4 l3 foody-card\">
                <div class=\"card hoverable\">
                <div class=\"card-image\">
                    <img src=\" $foody->avatar \">
                    <a class=\"btn-floating halfway-fab waves-effect waves-light red tooltipped\"
                       data-position=\"top\" data-tooltip=\"Thêm vào giỏ hàng\">
                        <i class=\"material-icons\">add_shopping_cart</i>
                    </a>
                </div>
                <div class=\"card-content\">
                    <div class=\"row\">
                        <a href=\"#\">
                            <p class=\"truncate black-text tooltipped\" data-position=\"top\"
                               data-tooltip=\" $foody->name \">
                                <b> $foody->name </b></p></a>
                    </div>
                    <div class=\"row\">
                        <span>
                            <span class=\"old-cost\">1,000,000</span>
                            <sup>đ</sup>
                        </span>
                        <b class=\"red-text\">145,000<sup>đ</sup></b>
                        <span class=\"ui small label red\">- 60%</span>
                    </div>
                </div>
            </div>
        </div>";
                }
            }
        }

        else {
            $foodies = $foody_type->foodies;

            foreach($foodies as $foody) {
                $data .= "<div class=\"col s12 m4 l3 foody-card\">
            <div class=\"card hoverable\">
                <div class=\"card-image\">
                    <img src=\" $foody->avatar \">
                    <a class=\"btn-floating halfway-fab waves-effect waves-light red tooltipped\"
                       data-position=\"top\" data-tooltip=\"Thêm vào giỏ hàng\">
                        <i class=\"material-icons\">add_shopping_cart</i>
                    </a>
                </div>
                <div class=\"card-content\">
                    <div class=\"row\">
                        <a href=\"#\">
                            <p class=\"truncate black-text tooltipped\" data-position=\"top\"
                               data-tooltip=\" $foody->name \">
                                <b> $foody->name </b></p></a>
                    </div>
                    <div class=\"row\">
                        <span>
                            <span class=\"old-cost\">1,000,000</span>
                            <sup>đ</sup>
                        </span>
                        <b class=\"red-text\">145,000<sup>đ</sup></b>
                        <span class=\"ui small label red\">- 60%</span>
                    </div>
                </div>
            </div>
        </div>";
            }
        }


        return Response($data);
    }
}
