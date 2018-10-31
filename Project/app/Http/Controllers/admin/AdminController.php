<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showFormLogin(){

        return view('admin.auth.login');
    }

    public function index() {

        return view('admin.dashboard.index');
    }
}
