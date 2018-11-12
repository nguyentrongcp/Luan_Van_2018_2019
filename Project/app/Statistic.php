<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class Statistic extends Model
{
    public static function getFoodyAmountOnSale() {
        $total = DB::table('sales_off_details')
            ->join('sales_offs', 'sales_offs.id', '=', 'sales_off_details.sales_off_id')
            ->where('sales_offs.end_date', '>=', date('Y-m-d'))
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

    public static function getOrderByYear() {
        $years = [];
        for ($i = 2014; $i <= date('Y'); $i++){
            $years[] = $i;
        }

        $unApprovedOrders = DB::table('orders')
            ->selectRaw('year(orders.order_created_at) as label, count(*) as total, 
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',0)
            ->groupBy(DB::raw('year(orders.order_created_at)'))
            ->get();

        $shippingdOrders = DB::table('orders')
            ->selectRaw('year(orders.order_created_at) as label, count(*) as total,
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',1)
            ->groupBy(DB::raw('year(orders.order_created_at)'))
            ->get();

        $deliveredOrders = DB::table('orders')
            ->selectRaw('year(orders.order_created_at) as label, count(*) as total,
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',2)
            ->groupBy(DB::raw('year(orders.order_created_at)'))
            ->get();

        $cancelleddOrders = DB::table('orders')
            ->selectRaw('year(orders.order_created_at) as label, count(*) as total,
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',3)
            ->groupBy(DB::raw('year(orders.order_created_at)'))
            ->get();

        $source = ['years'=> $years,'unapproved' => $unApprovedOrders, 'shipping' => $shippingdOrders, 'delivered' => $deliveredOrders,'cancelled'=>$cancelleddOrders];
//        $source = [$unApprovedOrders, $ShippingdOrders,$deliveredOrders,$cancelleddOrders];

        return json_encode($source,true);
    }

    public static function getOrderByMonth() {
        $months = [];
        for ($i = 1; $i <= 12; $i++){
            $months[] = $i;
        }
        $unApprovedOrders = DB::table('orders')
            ->selectRaw('month(orders.order_created_at) as label, count(*) as total, 
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',0)
            ->whereYear('order_created_at','=',2018)
            ->groupBy(DB::raw('month(orders.order_created_at)'))
            ->get();

        $shippingdOrders = DB::table('orders')
            ->selectRaw('month(orders.order_created_at) as label, count(*) as total,
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',1)
            ->whereYear('order_created_at','=',2018)

            ->groupBy(DB::raw('month(orders.order_created_at)'))
            ->get();

        $deliveredOrders = DB::table('orders')
            ->selectRaw('month(orders.order_created_at) as label, count(*) as total,
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',2)
            ->whereYear('order_created_at','=',2018)

            ->groupBy(DB::raw('month(orders.order_created_at)'))
            ->get();

        $cancelleddOrders = DB::table('orders')
            ->selectRaw('month(orders.order_created_at) as label, count(*) as total,
            round(sum(orders.total_of_cost)/1000000, 2) as extra')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status', '=',3)
            ->whereYear('order_created_at','=',2018)

            ->groupBy(DB::raw('month(orders.order_created_at)'))
            ->get();

        $source = ['months'=> $months,'unapproved' => $unApprovedOrders, 'shipping' => $shippingdOrders, 'delivered' => $deliveredOrders,'cancelled'=>$cancelleddOrders];
//        $source = [$unApprovedOrders, $ShippingdOrders,$deliveredOrders,$cancelleddOrders];

        return json_encode($source,true);
    }
}
