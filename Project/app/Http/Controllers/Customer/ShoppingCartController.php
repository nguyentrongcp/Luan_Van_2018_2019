<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use App\ShoppingCartFoody;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function addCart(Request $request) {
        $foody = Foody::find($request->foody_id);

        if (Cart::getCountByID($foody->id) == 10) {
            return Response(['status' => 404]);
        }
        else {
            Cart::addCart($foody->id, 1);
            $count = Cart::getCountByID($foody->id);

            return Response(['count' => Cart::count(), 'status' => 200,
                'added_text' => "
                    (<span class='red-text'>$count</span>)
                "]);
        }

    }

    public function updateCart(Request $request) {
        $foody = Foody::find($request->foody_id);

        $role = Cart::count() == 0 ? 'new' : 'old';

        Cart::addCart($request->foody_id, $request->count);

        $cart = Cart::matchedFoody($request->foody_id);

        $cost = Cart::getCost($request->id);


        $data = ['total_count' => Cart::count(),
            'total_cost' => number_format($cost)];

        if ($cart == null) {
            $data += ['status' => 'deleted'];
        }
        elseif ($cart->qty != $request->count) {
            $data += ['status' => 'updated', 'count' => $cart->qty,
                'cost' => number_format($cart->qty * $foody->currentCost())];

        }
        else {
            $cart_cost = number_format($foody->currentCost() * $cart->qty);
            $cart_body =
                "<div class='cart-row row' id='$cart->id'>
                <div class='col cart-count' id='cart-count-$cart->id'
                     style='width: 30px; margin-left: 15px'>
                    $cart->qty
                </div>
                <div class='col' style='margin-right: 10px'>x</div>
                <div class='col cart-name'>
                    $cart->name
                </div>
                <div class='col cart-action'>
                    <a class='ui button' onclick='updateCart(this,$cart->id)'>
                        <i class='plus icon'></i>
                    </a>

                    <a class='ui button' onclick='updateCart(this,$cart->id)'
                       id='cart-minus-$cart->id'><i class='minus icon'></i>
                    </a>
                </div>
                <div class='col right-align' style='width: 70px' id='cart-cost-$cart->id'>
                    $cart_cost<sup>đ</sup>
                </div>
                <div class='col cart-remove'>
                    <i class='trash alternate icon'></i>
                </div>
            </div>";
            $data += ['status' => 'added', 'role' => $role, 'cart_body' => $cart_body,
                'count' => $cart->qty];
        }

        return Response($data);
    }

    public function removeCart(Request $request) {
        $foody = Foody::find($request->foody_id);

        Cart::removeCart($request->foody_id);
        $cost = Cart::getCost($request->id);

        $data = ['total_count' => Cart::count(),
            'total_cost' => number_format($cost)];

        return Response($data);
    }


}
