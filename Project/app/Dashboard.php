<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Dashboard extends Model
{
    public static function totalFoody(){
        return Foody::where('is_deleted',false)->count();
    }

    public static function totalCommentNotApproved(){
        return Comment::where([
            ['is_approved',false]
        ])->count();
    }
    public static function totalOrders(){
        return Order::where('is_deleted',false)->count();
    }
    public static function totalRevenue(){
        $total = DB::table('orders')
            ->join('order_statuses','order_statuses.order_id','=','orders.id')
            ->where('order_statuses.status','=',2)
            ->where('orders.is_deleted','=',false)
            ->sum('orders.total_of_cost');

        return number_format($total);
    }

    public static function getOrdersStatus() {
        $status = [
            0 => 'Chưa duyệt',
            1 => 'Đang vận chuyển',
            2 => 'Đã giao hàng'
        ];
        $orders = DB::table('orders')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('status', '>=', '0')
            ->selectRaw("order_statuses.status as label, count(*) as total")
            ->groupBy('order_statuses.status')->get();
        foreach ($orders as &$order) {
            $order->label = $status[$order->label];
        }

        return $orders;
    }
    public static function getAmountType(){
        $total = DB::table('foody_types')->count();
        return $total;
    }
    public static function getProductAmountByType() {
        $atypefoodies = DB::table('foodies')
            ->leftJoin('foody_types', 'foody_types.id', '=', 'foodies.foody_type_id')
            ->select(['foody_types.id','foody_types.name', DB::raw('count(*) as total')])
            ->groupBy('foody_types.id')->get();

        return $atypefoodies;
    }
}
