<?php

namespace App\Http\Controllers\admin;

use App\GoodsReceiptNoteCost;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function revenue(Request $request){
//dd($request->revenue_date);
        $data = DB::table('goods_receipt_notes')
            ->join('goods_receipt_note_costs','goods_receipt_note_costs.goods_receipt_note_id','=','goods_receipt_notes.id')
            ->where('goods_receipt_notes.date','2018-03-18')
            ->where('is_deleted',false)
            ->sum('goods_receipt_note_costs.cost');
//        dd($data/);
        return view('admin.statistic.revenue.index',compact('data'));
    }
    public function order(){
        return view('admin.statistic.order.index');
    }
    public function foody(){
        return view('admin.statistic.foody.index');
    }

    public function getDate(Request $request){
        return Response('fewfw');
        $data= '';
        if (!empty($request->revenue_date)){
            $data = DB::table('goods_receipt_notes')
                ->join('goods_receipt_note_costs','goods_receipt_note_costs.goods_receipt_note_id','=','goods_receipt_notes.id')
                ->where('goods_receipt_notes.date',$request->revenue_date)
                ->where('is_deleted',true)
                ->sum('goods_receipt_note_costs.cost');
        }
        return Response($data);
    }
}
