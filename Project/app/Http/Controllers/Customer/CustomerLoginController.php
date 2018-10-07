<?php

namespace App\Http\Controllers\Customer;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username'   => 'required|min:6',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('customer')->attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
            // if successful, then redirect to their intended location
            Cart::syncToDB();

            return redirect()->intended(route('customer.home'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('username'));
    }

    public function logout()
    {
        Cart::destroy();
        Auth::guard('customer')->logout();

        return redirect('/');
    }
}
