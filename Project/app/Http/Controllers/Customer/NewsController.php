<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index() {


        return view('customer.news.index');
    }

    public function show() {


        return view('customer.news.show.index');
    }
}
