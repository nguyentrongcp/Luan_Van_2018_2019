<?php

namespace App\Http\Controllers\admin;

use App\GoodsReceiptNoteCost;
use App\Order;
use Faker\Provider\DateTime;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function revenue(Request $request)
    {
//dd($request->revenue_date);
        $data = DB::table('goods_receipt_notes')
            ->join('goods_receipt_note_costs', 'goods_receipt_note_costs.goods_receipt_note_id', '=', 'goods_receipt_notes.id')
            ->where('goods_receipt_notes.date', '2018-03-18')
            ->where('is_deleted', false)
            ->sum('goods_receipt_note_costs.cost');
//        dd($data/);
        return view('admin.statistic.revenue.index', compact('data'));
    }

    public function order()
    {
        return view('admin.statistic.order.index');
    }

    public function foody()
    {
        return view('admin.statistic.foody.index');
    }

    public function today(Request $request)
    {
        $data = '';
        if ($request->revenue_date != '') {
            $total_revenue = DB::table('goods_receipt_notes')
                ->join('goods_receipt_note_costs', 'goods_receipt_note_costs.goods_receipt_note_id', '=', 'goods_receipt_notes.id')
                ->where('goods_receipt_notes.date', '=', $request->revenue_date)
                ->where('is_deleted', '=', false)
                ->sum('goods_receipt_note_costs.cost');

            $revenue = number_format($total_revenue);

            $orders = Order::where('is_deleted', false)->get();
            foreach ($orders as $order) {
                $day = $order->order_created_at;
                $formatDay = date('Y-m-d', strtotime($day));

                if ($formatDay == $request->revenue_date) {
                    $total_expenditure = $order->total_of_cost++;
                    $expenditure = number_format($total_expenditure);

                    $Performance = number_format($total_expenditure - $total_revenue);
                    break;
                } else {
                    $total_expenditure = 0;
                    $expenditure = number_format($total_expenditure);

                    $Performance = number_format($total_expenditure - $total_revenue);
                }
            }

            $data .= "
                <div class=\"ui tiny three statistics\">
        <div class=\"statistic\">
            <div class=\"value\">
                <i class=\"dolly yellow circular icon\"></i>
                <span id=\"total-buying\">$revenue</span>đ
            </div>
            <div class=\"label\">
                Tổng chi
            </div>
        </div>
        <div class=\"statistic\">
            <div class=\"value\">
                <i class=\"shipping fast green circular icon\"></i>
                <span id=\"total-revenue\">$expenditure</span>đ
            </div>
            <div class=\"label\">
                Tổng thu
            </div>
        </div>
        <div class=\"statistic\">
            <div class=\"value\">
                <i class=\"bottom right corner blue chart line circular icon\"></i>
                <span id=\"redundant\">$Performance </span>đ
            </div>
            <div class=\"label\">
                Hiệu số
            </div>
        </div>
    </div>
            ";
        }

        return Response($data);
    }
}
