<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{
    public static function getFoodyAmountOnSale() {
        $total = DB::table('sales_off_details')
            ->join('sales_offs as s2', 's2.id', '=', 'sales_off_details.sales_off_id')
            ->join('sales_offs as s1', 's1.id', 's2.sales_off_id')
            ->where('s1.end_date', '>=', date('Y-m-d'))
            ->count();
        return $total;
    }
    public static function getOutOffStock(){
        $total = DB::table('foody_statuses')
            ->where('status',false)
            ->count();

        return $total;
    }
    public static function getFoodyType() {
        $atypefoodies = DB::table('foodies')
            ->leftJoin('foody_types', 'foody_types.id', '=', 'foodies.foody_type_id')
            ->select(['foody_types.name as label', DB::raw('count(*) as value')])
            ->groupBy('foody_types.id')->get();

        return $atypefoodies;
    }

    public static function getTotalOrderNotApproved(){
        $total = DB::table('orders')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status','=',0)
            ->count();
        return $total;
    }
    public static function getTotalOrdershipping(){
        $total = DB::table('orders')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status','=',1)
            ->count();
        return $total;
    }
    public static function getTotalOrderdelivered(){
        $total = DB::table('orders')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status','=',2)
            ->count();
        return $total;
    }
    public static function getTotalOrdercancelled(){
        $total = DB::table('orders')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status','=',3)
            ->count();
        return $total;
    }

    public static function getTotalHotSales(){
        $total =  DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->where(function ($query) {
                $query->where('status', 2)
                    ->orWhere('status', 3);})
            ->groupBy('order_foodies.foody_id')
            ->count('order_foodies.foody_id');
        return $total;
    }
}
