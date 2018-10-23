<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use App\ShoppingCart;
use App\ShoppingCartFoody;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartFunction
{

    private static function getCartID() {
        return ShoppingCart::where('customer_id', Auth::guard('customer')->user()->id)->first()->id;
    }

    private static function matchedInDB($id) {
        return ShoppingCartFoody::where('shopping_cart_id', self::getCartID())
                ->where('foody_id', $id)->count() > 0;
    }

    private static function getQtyInDB($id) {
        return ShoppingCartFoody::where('shopping_cart_id', self::getCartID())
            ->where('foody_id', $id)->first()->count;
    }

    public static function matchedInCart($id) {
        foreach(Cart::content() as $cart) {
            if ($cart->id == $id) {
                return $cart;
            }
        }
        return null;
    }

    public static function syncToDB() {
        foreach(Cart::content() as $cart) {
            if (!self::matchedInDB($cart->id)) {
                $cart_foody = new ShoppingCartFoody();
                $cart_foody->shopping_cart_id = self::getCartID();
                $cart_foody->foody_id = $cart->id;
                $cart_foody->count = $cart->qty;
                $cart_foody->save();
            }
        }
        Cart::destroy();
        foreach(ShoppingCartFoody::where('shopping_cart_id', self::getCartID())->get() as $cart) {
            Cart::add($cart->foody_id, Foody::find($cart->foody_id)->name, $cart->count, 0);
        }
    }

    public static function updateCart($id, $qty) {
        $cart = self::matchedInCart($id);
        if ($cart != null) {
            if ($cart->qty + $qty <= 0) {
                self::removeCart($id);
            }
            else {
                if (Auth::guard('customer')->check()) {
                    $cart_foody = ShoppingCartFoody::where('shopping_cart_id', self::getCartID())
                        ->where('foody_id', $id)->first();
                    $cart_foody->count += $qty;
                    $cart_foody->update();
                }
                Cart::add($id, Foody::find($id)->name, $qty, 0);
            }
        }
        else {
            self::addCart($id, $qty);
        }
    }

    public static function addCart($id, $qty) {
        if (Auth::guard('customer')->check()) {
            $cart = new ShoppingCartFoody();
            $cart->shopping_cart_id = self::getCartID();
            $cart->foody_id = $id;
            $cart->count = $qty;
            $cart->save();
        }
        Cart::add($id, Foody::find($id)->name, $qty, 0);
    }

    public static function removeCart($id) {
        if (Auth::guard('customer')->check()) {
            ShoppingCartFoody::where('shopping_cart_id', self::getCartID())
                ->where('foody_id', $id)->first()->delete();
        }
        Cart::remove(self::matchedInCart($id)->rowId);

    }

    public static function getCost() {
        $cost = 0;
        foreach(Cart::content() as $cart) {
            $cost += Foody::find($cart->id)->getSaleCost() * $cart->qty;
        }

        return $cost;
    }

}
