<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Facades\Agent;

class CustomerController extends Controller
{

    public function index()
    {
//        return view('customer.home');
//        $detect = new \Mobile_Detect();
        if (Agent::isTablet()) {
            dd('tablet');
        }
        if (Agent::isMobile()) {
            dd('mobile');
        }
        dd('Desktop');
    }

}
