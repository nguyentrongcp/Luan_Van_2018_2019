<?php

namespace App\Http\Controllers\admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderStatisticController extends Controller
{
    public function getValue(Request $request) {
        $data = [];
        if ($request->type == 'year') {
            $data = $this->getYear();
        }
        if ($request->type == 'quarter') {
            $data = $this->getQuarter($request->year);
        }
        if ($request->type == 'month') {
            $data = $this->getMonth($request);
        }
        if ($request->type == 'day') {
            $data = $this->getDate($request);
        }

        return Response(['status' => 'success', 'data' => $data]);
    }

    public function getYear() {
        $data = [];
        foreach($this->getYearable() as $year) {
            $data['labels'][] = $year;
            $data['amount']['unapproved'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 0)->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['shipping'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 1)->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['delivered'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 2)->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['cancelled'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 3)->whereYear('order_created_at', $year)
                ->count();

            $data['cost']['unapproved'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 0)->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['shipping'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 1)->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['delivered'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['cancelled'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 3)->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
        }

        return $data;
    }

    public function getQuarter($year) {
        $data = [];
        for($i=1; $i<=4; $i++) {
            $month = $i + ($i-1) * 2;
            $data['labels'][] = $i;
            $data['amount']['unapproved'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 0)->whereMonth('order_created_at', '>=', $month)
                ->whereMonth('order_created_at', '<=', $month+2)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['shipping'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 1)->whereMonth('order_created_at', '>=', $month)
                ->whereMonth('order_created_at', '<=', $month+2)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['delivered'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 2)->whereMonth('order_created_at', '>=', $month)
                ->whereMonth('order_created_at', '<=', $month+2)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['cancelled'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 3)->whereMonth('order_created_at', '>=', $month)
                ->whereMonth('order_created_at', '<=', $month+2)
                ->whereYear('order_created_at', $year)
                ->count();

            $data['cost']['unapproved'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 0)->whereMonth('order_created_at', '>=', $month)
                    ->whereMonth('order_created_at', '<=', $month+2)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['shipping'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 1)->whereMonth('order_created_at', '>=', $month)
                    ->whereMonth('order_created_at', '<=', $month+2)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['delivered'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)->whereMonth('order_created_at', '>=', $month)
                    ->whereMonth('order_created_at', '<=', $month+2)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['cancelled'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 3)->whereMonth('order_created_at', '>=', $month)
                    ->whereMonth('order_created_at', '<=', $month+2)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
        }

        return $data;
    }

    public function getMonth($request) {
        $data = [];
        $year = $request->year;
        for($i=$request->month_start; $i<=$request->month_end; $i++) {
            $data['labels'][] = $i;
            $data['amount']['unapproved'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 0)->whereMonth('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['shipping'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 1)->whereMonth('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['delivered'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 2)->whereMonth('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['cancelled'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 3)->whereMonth('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();

            $data['cost']['unapproved'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 0)->whereMonth('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['shipping'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 1)->whereMonth('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['delivered'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)->whereMonth('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['cancelled'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 3)->whereMonth('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
        }

        return $data;
    }

    public function getDate($request) {
        $data = [];
        $year = $request->year;
        $month = $request->month;
        for($i=$request->date_start; $i<=$request->date_end; $i++) {
            $data['labels'][] = $i;
            $data['amount']['unapproved'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 0)->whereMonth('order_created_at', $i)
                ->whereDay('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['shipping'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 1)->whereMonth('order_created_at', $i)
                ->whereDay('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['delivered'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 2)->whereMonth('order_created_at', $i)
                ->whereDay('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();
            $data['amount']['cancelled'][] = DB::table('orders')
                ->join('order_statuses', 'orders.id', 'order_id')
                ->where('status', 3)->whereMonth('order_created_at', $i)
                ->whereDay('order_created_at', $i)
                ->whereYear('order_created_at', $year)
                ->count();

            $data['cost']['unapproved'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 0)->whereMonth('order_created_at', $i)
                    ->whereDay('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['shipping'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 1)->whereMonth('order_created_at', $i)
                    ->whereDay('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['delivered'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)->whereMonth('order_created_at', $i)
                    ->whereDay('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
            $data['cost']['cancelled'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 3)->whereMonth('order_created_at', $i)
                    ->whereDay('order_created_at', $i)
                    ->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
        }

        return $data;
    }

    public function getYearable() {
        $data = [];
        foreach(Order::all() as $order) {
            $year = date_format(date_create($order->order_created_at), 'Y');
            if (array_search($year, $data) === false) {
                $data[] = $year;
            }
        }

        sort($data);
        return $data;
    }
}
