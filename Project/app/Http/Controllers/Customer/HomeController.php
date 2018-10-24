<?php

namespace App\Http\Controllers\Customer;

use App\Favorite;
use App\Foody;
use App\FoodyType;
use App\Like;
use function foo\func;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $foody_types = FoodyType::all();
        $foodies = Foody::all();

        return view('customer.home.index', compact(['foody_types', 'foodies']));
    }

    public function showFoody(Request $request) {
        if ($request->foody_type_id == 'all') {
            $foodies = Foody::all();
        }
        elseif (Foody::where('foody_type_id', $request->foody_type_id)->count() > 0) {
            $foodies = Foody::where('foody_type_id', $request->foody_type_id)->get();
        }
        else {
            return Response('Không có thực phẩm nào!');
        }

        $foody_sorts = [];
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'cost' => $foody->getSaleCost(), 'name' => $foody->name,
                'avatar' => $foody->avatar, 'describe' => $foody->describe, 'slug' => $foody->slug];
        }

        if ($request->foody_sort_id == 'desc') {
            $foody_sorts = array_reverse(array_sort($foody_sorts, function($foody_sorts) {
                return $foody_sorts['cost'];
            }));
        }
        else if($request->foody_sort_id == 'asc') {
            $foody_sorts = array_sort($foody_sorts, function($foody_sorts) {
                return $foody_sorts['cost'];
            });
        }
        else {
            $foody_sorts = $foodies;
        }

//        return Response($foody_sorts);
        $data = '';
        foreach ($foody_sorts as $foody) {
            $id = $foody['id'];
            $avatar = asset($foody['avatar']);
            $name = $foody['name'];
            $describe = $foody['describe'];
            $cost = number_format(Foody::find($foody['id'])->getSaleCost());
            $favorite = 'bookmark outline';
            $slug = $foody['slug'];
            if (Auth::guard('customer')->check()) {
                if (Favorite::where('foody_id', $foody['id'])
                        ->where('customer_id', Auth::guard('customer')->user()->id)->count() > 0) {
                    $favorite = 'bookmark';
                }
            }
            $data .= "
                <div class=\"row white show-foody-row\">
            <div class=\"col s12 m4 l4 show-foody-image\">
                <img src=\"$avatar\" class=\"responsive-img\">
            </div>
            <div class=\"col s12 m8 l8 show-foody-content\">
                <div class=\"show-foody-title truncate\">
                    <a class=\"black-text\" href=\"/foody/$slug\">$name</a>
                </div>
                <div class=\"show-foody-cost\"><span class=\"cost\">
                        $cost<sup>đ</sup>
                    </span></div>
                <div class=\"show-foody-describe\">$describe</div>
                <div class=\"show-foody-rating\">
                    <span class=\"rating-icon\">
                        <i class=\"material-icons\">star</i>
                        <i class=\"material-icons\">star</i>
                        <i class=\"material-icons\">star</i>
                        <i class=\"material-icons\">star_half</i>
                        <i class=\"material-icons\">star_border</i>
                    </span>
                    <span class=\"rating-number\">
                        3.5 / 5
                    </span>
                    <span class=\"rating-spacing\">|</span>
                    <span>
                        <i class=\"like icon\" style=\"font-size: 12px\"></i> 13
                    </span>
                    <span class=\"rating-spacing\">|</span>
                    <span>
                        <i class=\"comment icon\" style=\"font-size: 12px\"></i> 13
                    </span>
                    <span class=\"show-foody-favorite\">
                        <a onclick=\"favorite(this,$id)\" class=\"tooltipped\"
                                   data-tooltip=\"Lưu món ăn\" data-position=\"left\">
                                     <i id=\"favorite-$id\" class=\"$favorite icon\"></i>
                                </a>
                    </span>
                </div>
                <div class=\"show-foody-action\">
                    <a class=\"waves-effect waves-light btn\" onclick=\"updateCart(this,$id)\">
                        <i class=\"cart plus icon\"></i>
                        Thêm vào giỏ
                    </a>
                </div>
            </div>
        </div>
            ";
        }
        return Response($data);
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
            $customer_id = Auth::guard('customer')->user()->id;

            $favorited = Favorite::where('customer_id', $customer_id)->where('foody_id', $request->foody_id)->first();

            if (!empty($favorited)) {
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
}
