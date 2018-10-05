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
        Cart::add($foody->id, $foody->name, 1, 0);
        if(Auth::guard('customer')->check()) {
            if (!Cart::matchedFoodyInDB($foody->id)) {
                Cart::storeToDB($foody->id);
            }
            else {
                if (!Cart::updateToDB($foody->id, 1)) {
                    return Response(['status' => 404]);
                }
            }
        }

        return Response(['count' => Cart::count(), 'status' => 200,
            'added_count' => Cart::matchedFoody($foody->id)->qty]);
    }


}
