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
//    public function addCart(Request $request) {
//        $foody = Foody::find($request->foody_id);
//
//        if (Cart::getCountByID($foody->id) == 10) {
//            return Response(['status' => 404]);
//        }
//        else {
//            Cart::addCart($foody->id, 1);
//            $count = Cart::getCountByID($foody->id);
//
//            return Response(['count' => Cart::count(), 'status' => 200,
//                'added_text' => "
//                    (<span class='red-text'>$count</span>)
//                "]);
//        }
//
//    }

    public function updateCart(Request $request) {
        $foody = Foody::find($request->foody_id);
        if ($foody == null) {
            return Response(['status' => 'error']);
        }
        elseif ($request->count < -1 || $request->count == 0) {
            return Response(['status' => 'error']);
        }
        elseif (CartFunction::matchedInCart($request->foody_id) == null && $request->count == -1) {
            return Response(['status' => 'error']);
        }
        if ($foody->isMaterial()) {
            $cart = CartFunction::matchedInCart($request->foody_id);
            if ($cart == null) {
                $qty = $request->count;
            }
            else {
                $qty = $request->count + $cart->qty;
            }
            if (!$foody->checkQuantity($qty)) {
                return Response(['status' => 'full', 'qty' => $foody->getQuantity()]);
            }
        }

        $cart = CartFunction::matchedInCart($request->foody_id);
        if ($cart != null) {
            if ($cart->qty + $request->count > 100) {
                return Response(['status' => 'max']);
            }
        }
        else {
            if ($request->count > 100) {
                return Response(['status' => 'max']);
            }
        }

        $role = Cart::count() == 0 ? 'new' : 'old';

        CartFunction::updateCart($request->foody_id, $request->count);

        $cart = CartFunction::matchedInCart($request->foody_id);

        $cost = CartFunction::getCost();

        $data = ['total_count' => Cart::count(),
            'total_cost' => number_format($cost)];

        if ($cart == null) {
            $data += ['status' => 'deleted'];
        }
        elseif ($cart->qty != $request->count) {
            $data += [
                'status' => 'updated',
                'count' => $cart->qty,
                'cost_simple' => number_format($foody->getSaleCost()),
                'cost' => number_format($cart->qty * $foody->getSaleCost()),
                'sale' => $foody->getSalePercent()
            ];

        }
        else {
            $cart_cost = number_format($foody->getSaleCost() * $cart->qty);
            $cart_body =
                "<div class='cart-row row' id='$cart->id'>
                <div class='col cart-count' id='cart-qty-$cart->id'
                     style='width: 30px; margin-left: 15px'>
                    $cart->qty
                </div>
                <div class='col' style='width: 20px'>x</div>
                <div class='col cart-name'>
                    $cart->name
                </div>
                <div class='col cart-action'>
                    <a class='ui button cart-update' data-id='$cart->id'>
                        <i class='plus icon'></i>
                    </a>

                    <a class='ui button cart-update' data-qty=\"minus-$cart->id\" data-id='$cart->id'>
                        <i class='minus icon'></i>
                    </a>
                </div>
                <div class='col right-align' style='width: 70px' id='cart-cost-$cart->id'>
                    $cart_cost<sup>đ</sup>
                </div>
                <div class='col cart-remove'>
                    <i onclick='removeCart($cart->id)' class='trash alternate icon'></i>
                </div>
            </div>";
            $data += ['status' => 'added', 'role' => $role, 'cart_body' => $cart_body,
                'count' => $cart->qty];
        }

        return Response($data);
    }

    public function removeCart(Request $request) {
        $foody = Foody::find($request->foody_id);
        if ($foody == null) {
            return Response(['status' => 'error']);
        }

        CartFunction::removeCart($request->foody_id);
        $cost = CartFunction::getCost($request->id);

        $data = ['total_count' => Cart::count(),
            'total_cost' => number_format($cost)];

        return Response($data);
    }

    public function testAPI() {
//        $smsAPI = new SpeedSMSAPI("23CwwNwz_M7cbNUAuB1cWoSnSdahEpnO");
//        $phone = ['0339883047'];
//        $content = "Ma OTP cua ban la 371910";
//        $response = $smsAPI->sendSMS($phone, $content, 4, '');
//
//        dd($response);
//
//        dd(time());
    }

}
