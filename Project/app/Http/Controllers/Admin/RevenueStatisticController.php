<?php

namespace App\Http\Controllers\admin;

use App\GoodsReceiptNote;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RevenueStatisticController extends Controller
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

            $data['buy'][] = DB::table('goods_receipt_notes')
                    ->join('goods_receipt_note_costs', 'goods_receipt_notes.id', 'goods_receipt_note_id')
                    ->whereYear('date', $year)
                    ->sum('cost') / 1000000;
            $data['sale'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)->whereYear('order_created_at', $year)
                    ->sum('total_of_cost') / 1000000;
        }

        return $data;
    }

    public function getQuarter($year) {
        $data = [];
        for($i=1; $i<=4; $i++) {
            $month = $i + ($i-1) * 2;
            $data['labels'][] = $i;

            $data['buy'][] = DB::table('goods_receipt_notes')
                    ->join('goods_receipt_note_costs', 'goods_receipt_notes.id', 'goods_receipt_note_id')
                    ->whereMonth('date', '>=', $month)
                    ->whereMonth('date', '<=', $month+2)
                    ->whereYear('date', $year)
                    ->sum('cost') / 1000000;
            $data['sale'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)
                    ->whereMonth('order_created_at', '>=', $month)
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

            $data['buy'][] = DB::table('goods_receipt_notes')
                    ->join('goods_receipt_note_costs', 'goods_receipt_notes.id', 'goods_receipt_note_id')
                    ->whereMonth('date', $i)
                    ->whereYear('date', $year)
                    ->sum('cost') / 1000000;
            $data['sale'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)
                    ->whereMonth('order_created_at', $i)
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

            $data['buy'][] = DB::table('goods_receipt_notes')
                    ->join('goods_receipt_note_costs', 'goods_receipt_notes.id', 'goods_receipt_note_id')
                    ->whereMonth('date', $i)
                    ->whereDay('date', $i)
                    ->whereYear('date', $year)
                    ->sum('cost') / 1000000;
            $data['sale'][] = DB::table('orders')
                    ->join('order_statuses', 'orders.id', 'order_id')
                    ->where('status', 2)
                    ->whereMonth('order_created_at', $i)
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
        foreach(GoodsReceiptNote::all() as $buy) {
            $year = date_format(date_create($buy->date), 'Y');
            if (array_search($year, $data) === false) {
                $data[] = $year;
            }
        }

        sort($data);
        return $data;
    }
}
