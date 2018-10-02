<?php

namespace App\Http\Controllers\Customer;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $foody_types = ProductType::where('product_type_id', null)->get();

        return view('customer.index.index', compact(['foody_types']));
    }

    public function showFoody($foody_type) {

    }
}
