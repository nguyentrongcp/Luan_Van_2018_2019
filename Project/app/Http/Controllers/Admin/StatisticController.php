<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function revenue(){
        return view('admin.statistic.revenue.index');
    }
    public function order(){
        return view('admin.statistic.order.index');
    }
    public function foody(){
        return view('admin.statistic.foody.index');
    }

    public function getTable(){

    }
}
