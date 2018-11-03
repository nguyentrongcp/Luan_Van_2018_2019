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
    public function index(Request $request) {
        $foody_types = FoodyType::all();
        $foodies = Foody::all();
        $type = '';
        if ($request->session()->has('foody_type_id')) {
            $type = session('foody_type_id');
            $request->session()->forget('foody_type_id');
        }

        return view('customer.home.index', compact(['foody_types', 'foodies', 'type']));
    }

    public function getFoody(Request $request) {
        session(['foody_type_id' => $request->type_id]);

        return Response(route('customer.home'));
//        return Response(session('foody_type_id'));
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
            $foody_sorts[] = ['id' => $foody->id, 'cost' => $foody->getSaleCost(),
                'vote' => $foody->getVoted()->average, 'like' => $foody->getLiked(),
                'buy' => $foody->orderFoodies()->count()];
        }

        if ($request->foody_sort_id == 'desc') {
            $foody_sorts = array_reverse(array_sort($foody_sorts, function($foody_sorts) {
                return $foody_sorts['cost'];
            }));
        }
        elseif($request->foody_sort_id == 'asc') {
            $foody_sorts = array_sort($foody_sorts, function($foody_sorts) {
                return $foody_sorts['cost'];
            });
        }
        elseif($request->foody_sort_id == 'vote') {
            $foody_sorts = array_reverse(array_sort($foody_sorts, function($foody_sorts) {
                return $foody_sorts['vote'];
            }));
        }
        elseif($request->foody_sort_id == 'like') {
            $foody_sorts = array_reverse(array_sort($foody_sorts, function($foody_sorts) {
                return $foody_sorts['like'];
            }));
        }
        elseif($request->foody_sort_id == 'buy') {
            $foody_sorts = array_reverse(array_sort($foody_sorts, function($foody_sorts) {
                return $foody_sorts['buy'];
            }));
        }
        else {
            $foody_sorts = $foodies;
        }


//        return Response($foody_sorts);
        $data = '';
        foreach ($foody_sorts as $foody) {
            $foody = Foody::find($foody['id']);
            $id = $foody->id;
            $avatar = asset($foody->avatar);
            $name = $foody->name;
            $describe = $foody->describe;
            $cost = number_format($foody->getSaleCost());
            $favorite = 'bookmark outline';
            $slug = $foody->slug;
            $liked = $foody->getLiked();
            $buy_count = $foody->orderFoodies()->count();
            if (Auth::guard('customer')->check()) {
                if (Favorite::where('foody_id', $id)
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
                <div class=\"show-foody-cost\">";
            if ($foody->isSalesOff()) {
                $old_cost = number_format($foody->currentCost());
                $sale_percent = $foody->getSalePercent();
                $data .= "
                    <span class=\"old-cost-container\">
                         <span class=\"old-cost\">$old_cost</span><sup>đ</sup>
                    </span>
                    <span class=\"cost\">
                         $cost<sup>đ</sup>
                    </span>
                    <span class=\"ui small red label pulse\" style=\"z-index: 10\">- $sale_percent%</span>
                ";
            }
            else {
                $data .= "
                    <span class=\"cost\">
                         $cost<sup>đ</sup>
                    </span>
                ";
            }
            $data .= "</div>
                <div class=\"show-foody-describe\">$describe</div>
                <div class=\"show-foody-rating\">";
            if ($foody->getVoted() != null) {
                $voted = $foody->getVoted()->average;
                $data .= "<span class=\"rating-icon\">";
                for($i=1; $i<=5; $i++) {
                    if ($i <= $voted) {
                        $data .= "<i class='fas fa-star'></i>";
                    }
                    elseif(number_format($voted) == $i) {
                        $data .= "<i class='fas fa-star-half-alt'></i>";
                    }
                    else {
                        $data .= "<i class='far fa-star'></i>";
                    }
                }
                $data .= "</span>
                        <span class=\"rating-number\">
                            <b>$voted</b> / 5
                        </span>
                        <span class=\"rating-spacing\">|</span>";
            }
            $data .= "
                    <span>
                        <i class=\"like icon\" style=\"font-size: 12px\"></i> $liked
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
                <div>
                    Đã được đặt: <b>$buy_count</b> lượt
                </div>
                <div class=\"show-foody-action\">
                    <a class=\"waves-effect waves-light btn\" data-id='$id' onclick='updateCart(this)'>
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
}
