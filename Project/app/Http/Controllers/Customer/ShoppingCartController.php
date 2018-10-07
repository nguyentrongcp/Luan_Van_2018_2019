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

    public function test() {
        dd(Cart::content());
    }


}
