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
        $date = $request->date;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        if ($request->type == 'day') {
            $data = $this->getDate($date);
        }
        if ($request->type == 'days') {
            $data = $this->getDate($date_start, $date_end);
        }

        return Response(['status' => 'success', 'data' => $data]);
    }

    public function getDate($date)
    {
        $data = DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->selectRaw('foodies.name as foodyname, count(orders.id) as total')
            ->where('order_created_at', '<=', $date)
            ->where(function ($query) {
                $query->where('status', 2)
                    ->orWhere('status', 3);})
            ->groupBy('foodies.id')
            ->orderBy('total','DESC')
            ->limit(10);

        return $data->get();
    }

    public function getDates($start, $end)
    {
        $data = DB::table('foodies')->join('order_foodies', 'foodies.id', 'foody_id')
            ->join('orders', 'order_foodies.order_id', 'orders.id')
            ->join('order_statuses', 'orders.id', 'order_statuses.order_id')
            ->selectRaw('foodies.name as foodyname, count(orders.id) as total')
            ->where('order_created_at', '>=', $start)
            ->where('order_created_at', '<=', $end)
            ->where(function ($query) {
                $query->where('status', 2)
                    ->orWhere('status', 3);})
            ->groupBy('foodies.id')
            ->orderBy('total','DESC')
            ->limit(10);

        return $data->get();
    }

}
