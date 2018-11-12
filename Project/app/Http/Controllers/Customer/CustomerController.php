<?php

namespace App\Http\Controllers\Customer;

use App\Foody;
use App\FoodyType;
use App\Functions;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{

    public function index()
    {
        $foodies = Foody::all();
        $foody_types = FoodyType::all();
        $newses = News::all();
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'buy' => $foody->orderFoodies()->count()];
        }
        $foody_buys = array_sort($foody_sorts, function($foody_sorts) {
            return $foody_sorts['buy'];
        });
        $foody_sales = DB::table('sales_off_details')->join('foodies', 'foody_id', 'foodies.id')
            ->join('sales_offs', 'sales_off_details.sales_off_id', 'sales_offs.id')
            ->where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->orderBy('percent', 'desc')
            ->select('foodies.id')->get();

        return view('customer.index.index', compact([
            'foodies',
            'foody_types',
            'newses',
            'foody_buys',
            'foody_sales'
        ]));
    }

}
