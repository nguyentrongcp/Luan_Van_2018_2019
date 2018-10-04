<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodyController extends Controller
{
    public function index($slug) {
        $foody = Foody::where('slug', $slug)->first();

        return view('customer.foody.index', compact(['foody']));
    }
}
