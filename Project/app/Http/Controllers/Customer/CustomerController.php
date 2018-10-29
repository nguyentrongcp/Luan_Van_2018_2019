<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use App\FoodyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{

    public function index()
    {
        $foodies = Foody::all();
        $foody_types = FoodyType::all();

        return view('customer.index.index', compact(['foodies', 'foody_types']));
    }

}
