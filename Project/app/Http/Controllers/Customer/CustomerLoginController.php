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
//        $validate = Validator::make(
//            $request->all(),
//            [
//                'username' => 'required',
//                'password' => 'required'
//            ],
//            [
//                'required' => 'Bạn chưa nhập :attribute!',
//            ],
//            [
//                'username' => 'tài khoản',
//                'password' => 'mật khẩu'
//            ]
//        );
//
//
//        if ($validate->fails()) {
//            return Response(['errors' => $validate->getMessageBag()->toArray()], 404);
//        }

        // Attempt to log the user in
        if (Auth::guard('customer')->attempt(['username' => $request->username, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            Cart::syncToDB();

            return Response(['status' => 'success']);
        }
        if (Customer::where('username', $request->username)->count() == 0) {
            return Response(['status' => 'username_error' ,'errors' => 'Tài khoản không tồn tại!']);
        }
        else {

            if (!password_verify($request->password, Customer::where('username', $request->username)->first())) {
                return Response(['status' => 'password_error' ,'errors' => 'Mật khẩu không chính xác!']);
            }
        }
    }

    public function logout()
    {
        Cart::destroy();
        Auth::guard('customer')->logout();

        return redirect('/');
    }
}
