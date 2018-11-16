<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function login(Request $request)
    {
        // Validate the form data
        $validate = Validator::make(
            $request->all(),
            [
                'username' => 'required|email',
                'password' => 'required'
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'email' => ':attribute không đúng định dạng!'
            ],
            [
                'username' => 'Email',
                'password' => 'Mật khẩu'
            ]
        );
//
//
        if ($validate->fails()) {
            return Response(['status' => 'error', 'errors' => $validate->getMessageBag()->toArray()]);
        }

        // Attempt to log the user in
        if (Auth::guard('customer')->attempt(['email' => $request->username, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            CartFunction::syncToDB();

            return Response(['status' => 'success']);
        }
        if (Customer::where('email', $request->username)->count() == 0) {
            return Response(['status' => 'username_error' ,'errors' => 'Email không tồn tại!']);
        }
        else {
            if (!password_verify($request->password, Customer::where('email', $request->username)->first())) {
                return Response(['status' => 'password_error' ,'errors' => 'Mật khẩu không chính xác!']);
            }
        }
    }

    public function logout()
    {
        Cart::destroy();
        Auth::guard('customer')->logout();

        return redirect('/home');
    }
}
