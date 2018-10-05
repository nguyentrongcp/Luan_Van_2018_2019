<?php

namespace App\Http\Controllers\Customer;

use App\Favorite;
use App\Foody;
use App\FoodyType;
use App\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $foody_types = FoodyType::where('foody_type_id', null)->get();
        $foodies = Foody::all();

        return view('customer.home.index', compact(['foody_types', 'foodies']));
    }

    public function showFoody($slug) {
        $data = "<div class=\"row\"></div>";

        $foody_type = FoodyType::where('slug', $slug)->first();

        if ($foody_type->foody_type_id == null) {
            $foody_types = FoodyType::where('foody_type_id', $foody_type->id)->get();
            foreach($foody_types as $type) {

                $foodies = $type->foodies;
                foreach($foodies as $foody) {
                    $liked = $foody->getLiked();
                    $data .=
                        "<div class=\"col s12 m6 l4 foody-card\">
                            <div class=\"ui cards hoverable\">
                                <div class=\"card\">
                                    <div class=\"image\">
                                        <img src=\"$foody->avatar\">
                                    </div>
                                    <div class=\"content\" style=\"padding-bottom: 5px\">
                                        <a class=\"header truncate tooltipped\" data-position=\"top\" 
                                        data-tooltip=\"$foody->name\">
                                        $foody->name</a>
                                        <span>
                                            <span class=\"old-cost\">1,000,000</span>
                                            <sup>đ</sup>
                                        </span>
                                        <b class=\"red-text\">145,000<sup>đ</sup></b>
                                        <span class=\"ui mini red label\">- 60%</span>
                                        <div class=\"meta\">
                                            <span class=\"right floated\">
                                                <i class=\"comment icon\"></i><span>3</span>
                                            </span>
                                            <span class=\"right floated\">
                                                <i class=\"heart icon\"></i>
                                                <span id=\"liked-$foody->id\">$liked</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class=\"extra content\">
                                        <span id=\"like-$foody->id\" data-target=\"$foody->id\" 
                                        onclick='like(this)' class=\"left floated like\">";
                    if(!Auth::guard('customer')->check()) {
                        $data .=
                            "<i id=\"i-like-$foody->id\" class=\"like icon\"></i>
                             <a id=\"a-like-$foody->id\">Thích</a>";
                    }
                    elseif(empty($foody->likes()->where('customer_id',
                        Auth::guard('customer')->user()->id)->first())) {
                        $data .=
                            "<i id=\"i-like-$foody->id\" class=\"like icon\"></i>
                             <a id=\"a-like-$foody->id\">Thích</a>";
                    }

                    else {
                        $data .=
                            "<i id=\"i-like-$foody->id\" class=\"like active icon\"></i>
                             <a id=\"a-like-$foody->id\">Bỏ thích</a>";
                    }
                    $data .=
                        "</span>
                        <span id=\"favorite-$foody->id\" class=\"right floated star\"
                        onclick='favorite(this)' data-target=\"$foody->id\">";
                    if(!Auth::guard('customer')->check()) {
                        $data .= "<i id=\"i-favorite-$foody->id\" class=\"star icon\"></i>
                                <a id=\"a-favorite-$foody->id\">Quan tâm</a>";
                    }
                    elseif(empty($foody->favorites()->where('customer_id',
                        Auth::guard('customer')->user()->id)->first())) {
                        $data .= "<i id=\"i-favorite-$foody->id\" class=\"star icon\"></i>
                                <a id=\"a-favorite-$foody->id\">Quan tâm</a>";
                    }
                    else {
                        $data .= "<i id=\"i-favorite-$foody->id\" class=\"star active icon\"></i>
                                <a id=\"a-favorite-$foody->id\">Bỏ quan tâm</a>";
                    }
                    $data .=
                                    "</span>
                                </div>
                                <a id=\"add-cart-$foody->id\" data-target=\"$foody->id\" onclick=\"addCart(this)\"
                                    class=\"ui bottom attached button\">
                                    <i class=\"cart plus icon\"></i>
                                    Thêm vào giỏ (<span id=\"cart-added-home\" class=\"red-text\">4</span>)
                                </a>
                            </div>
                        </div>
                        </div>";
                }
            }
        }

        else {
            $this->showFoodyAll($foody_type, $data);
        }

//        dd($data);


        return Response($data);
    }

    public function showFoodyAll($foody_type, &$data) {
        $foodies = $foody_type->foodies;

        foreach($foodies as $foody) {
            $liked = $foody->getLiked();
            $data .=
                "<div class=\"col s12 m6 l4 foody-card\">

                            <div class=\"ui cards hoverable\">
                                <div class=\"card\">
                                    <div class=\"image\">
                                        <img src=\"$foody->avatar\">
                                    </div>
                                    <div class=\"content\" style=\"padding-bottom: 5px\">
                                        <a class=\"header truncate tooltipped\" data-position=\"top\" data-tooltip=\"$foody->name\">
                                        $foody->name</a>
                                        <span>
                                            <span class=\"old-cost\">1,000,000</span>
                                            <sup>đ</sup>
                                        </span>
                                        <b class=\"red-text\">145,000<sup>đ</sup></b>
                                        <span class=\"ui mini red label\">- 60%</span>
                                        <div class=\"meta\">
                                            <span class=\"right floated\">
                                                <i class=\"comment icon\"></i><span>3</span>
                                            </span>
                                            <span class=\"right floated\">
                                                <i class=\"heart icon\"></i>
                                                <span id=\"liked-$foody->id\">$liked</span>
                                            </span>
                                        </div>

                                    </div>
                                    <div class=\"extra content\">
                                        <span id=\"like-$foody->id\" data-target=\"$foody->id\" 
                                        onclick='like(this)' class=\"left floated like\">";
            if(!Auth::guard('customer')->check()) {
                $data .=
                    "<i id=\"i-like-$foody->id\" class=\"like icon\"></i>
                                 <a id=\"a-like-$foody->id\">Thích</a>";
            }
            elseif(empty($foody->likes()->where('customer_id',
                Auth::guard('customer')->user()->id)->first())) {
                $data .=
                    "<i id=\"i-like-$foody->id\" class=\"like icon\"></i>
                             <a id=\"a-like-$foody->id\">Thích</a>";
            }

            else {
                $data .=
                    "<i id=\"i-like-$foody->id\" class=\"like active icon\"></i>
                             <a id=\"a-like-$foody->id\">Bỏ thích</a>";
            }
            $data .=
                "</span>
                        <span id=\"favorite-$foody->id\" onclick='favorite(this)'
                        class=\"right floated star\" data-target=\"$foody->id\">";

            if(!Auth::guard('customer')->check()) {
                $data .= "<i id=\"i-favorite-$foody->id\" class=\"star icon\"></i>
                                    <a id=\"a-favorite-$foody->id\">Quan tâm</a>";
            }
            elseif(empty($foody->favorites()->where('customer_id',
                Auth::guard('customer')->user()->id)->first())) {
                $data .= "<i id=\"i-favorite-$foody->id\" class=\"star icon\"></i>
                                <a id=\"a-favorite-$foody->id\">Quan tâm</a>";
            }
            else {
                $data .= "<i id=\"i-favorite-$foody->id\" class=\"star active icon\"></i>
                                <a id=\"a-favorite-$foody->id\">Bỏ quan tâm</a>";
            }
            $data .=
                "</span>
                                </div>
                                <a id=\"add-cart-$foody->id\" data-target=\"$foody->id\" onclick=\"addCart(this)\"
                                    class=\"ui bottom attached button\">
                                    <i class=\"cart plus icon\"></i>
                                    Thêm vào giỏ (<span id=\"cart-added-home\" class=\"red-text\">4</span>)
                                </a>
                            </div>
                        </div>
                        </div>";
        }
    }

    public function like(Request $request) {
        if (Auth::guard('customer')->check()) {
            $foody_id = $request->get('foody_id');
            $customer_id = Auth::guard('customer')->user()->id;
            $number_of_liked = Foody::find($foody_id)->getLiked();

            $liked = Like::where('customer_id', $customer_id)->where('foody_id', $foody_id)->first();

            if (!empty($liked)) {
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
            $foody_id = $request->get('foody_id');
            $customer_id = Auth::guard('customer')->user()->id;

            $favorited = Favorite::where('customer_id', $customer_id)->where('foody_id', $foody_id)->first();

            if (!empty($favorited)) {
                $favorited->delete();

                return Response('Quan tâm');
            }
            else {
                $favorite = new Favorite();
                $favorite->customer_id = $customer_id;
                $favorite->foody_id = $foody_id;
                $favorite->save();

                return Response('Bỏ quan tâm');
            }
        }
    }
}
