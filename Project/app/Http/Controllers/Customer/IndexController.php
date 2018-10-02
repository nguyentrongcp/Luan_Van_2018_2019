<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use App\FoodyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $foody_types = FoodyType::where('foody_type_id', null)->get();
        $foodies = Foody::all();

        return view('customer.index.index', compact(['foody_types', 'foodies']));
    }

    public function showFoody($foody_type) {

    }
}
