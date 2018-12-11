<?php

namespace App\Http\Controllers\admin;

use App\Functions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FoodyStatisticController extends Controller
{
    public function getValue(Request $request)
    {
        $data = [];
        if ($request->type == 'all') {
            $data = $this->getAll($request);
        }
        if ($request->type == 'day') {
            $data = $this->getDate($request);
        }
        if ($request->type == 'days') {
            $data = $this->getDates($request);
        }
        if ($request->type == 'today') {
            $data = $this->getToday($request);
        }

        return Response(['status' => 'success', 'data' => $data]);
    }

    public function getAll(Request $request) {
        $date = $request->date;
        $qty = $request->qty;
        $data = DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->selectRaw('foodies.name as foodyname, count(orders.id) as total')
            ->where('status', 2)
            ->groupBy('foodies.id')
            ->orderBy('total','DESC')
            ->limit($qty);

        return $data->get();
    }

    public function getDate(Request $request)
    {
        $date = $request->date;
        $qty = $request->qty;
        $data = DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->selectRaw('foodies.name as foodyname, count(orders.id) as total')
            ->whereDate('order_created_at', '<=', $date)
            ->where('status', 2)
            ->groupBy('foodies.id')
            ->orderBy('total','DESC')
            ->limit($qty);

        return $data->get();
    }

    public function getDates(Request $request)
    {
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $qty = $request->qty;
        $data = DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->selectRaw('foodies.name as foodyname, count(orders.id) as total')
            ->whereDate('order_created_at', '>=', $date_start)
            ->whereDate('order_created_at', '<=', $date_end)
            ->where('status', 2)
            ->groupBy('foodies.id')
            ->orderBy('total','DESC')
            ->limit($qty);

        return $data->get();
    }

    public function getToday(Request $request)
    {
        $date = $request->date;
        $qty = $request->qty;
        $data = DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->selectRaw('foodies.name as foodyname, count(orders.id) as total')
            ->whereDate('order_created_at', $date)
            ->where('status', 2)
            ->groupBy('foodies.id')
            ->orderBy('total','DESC')
            ->limit($qty);

        return $data->get();
    }

}
