<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|min:6',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location

            $history = new History();
            $history->admin_id = Admin::adminId();
            $history->name = Admin::adminName();
            $history->description = 'Đăng nhập hệ thống';
            $history->time = date('Y-m-d H:i:s');
            $history->save();

            return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withErrors(['username'=>'Tài khoản hoặc mật khẩu không đúng. Vui lòng kiểm tra lại!'])->withInput($request->only('username', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }


}
