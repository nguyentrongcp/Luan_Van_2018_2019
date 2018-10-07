<?php

namespace App\Http\Controllers\admin;

use App\GoodsReceiptNoteCost;
use App\GoodsReceiptNoteDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsReceiptNotesDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idGoods = $request->get('goods-id');

        $goodsReceiptDetail = new GoodsReceiptNoteDetail();
        $goodsReceiptDetail->material = $request->get('material');
        $goodsReceiptDetail->value = $request->get('amount') . ' ' . $request->get('unit');
        $goodsReceiptDetail->cost = $request->get('cost');
        $goodsReceiptDetail->goods_receipt_note_id = $idGoods;
        $goodsReceiptDetail->save();

        $goodsReceiptCost = GoodsReceiptNoteCost::where('goods_receipt_note_id', $idGoods)->get();
        $totalCosts = GoodsReceiptNoteDetail::where('goods_receipt_note_id', $idGoods)->sum('cost');

        if (!empty($goodsReceiptCost)) {
            foreach ($goodsReceiptCost as $goodsCost) {
                $goodsCost->cost = $totalCosts;
                $goodsCost->update();
                return back()->with('success', 'Thêm thành công!');
            }
        }
        $goodsReceiptCosts = new GoodsReceiptNoteCost();

        $goodsReceiptCosts->cost = $request->get('cost');
        $goodsReceiptCosts->goods_receipt_note_id = $idGoods;
        $goodsReceiptCosts->save();

        return back()->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idGoods = $request->get('goods-id');

        $goodsReceiptDetails = GoodsReceiptNoteDetail::findOrFail($id);

        $goodsReceiptDetails->material = $request->get('material');
        $goodsReceiptDetails->value = $request->get('amount') . ' ' . $request->get('unit');
        $goodsReceiptDetails->cost = $request->get('cost');
        $goodsReceiptDetails->goods_receipt_note_id = $idGoods;
        $goodsReceiptDetails->update();

        $goodsReceiptCost = GoodsReceiptNoteCost::where('goods_receipt_note_id', $idGoods)->get();
        $totalCosts = GoodsReceiptNoteDetail::where('goods_receipt_note_id', $idGoods)->sum('cost');

        if (!empty($goodsReceiptCost)) {
            foreach ($goodsReceiptCost as $goodsCost) {
                $goodsCost->cost = $totalCosts;
                $goodsCost->update();
                return back()->with('success', 'Thêm thành công!');
            }
        }
        return back()->with('success', 'Thêm thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idGoods = $request->get('goods-id');
        if (!$request->has('detail-goods-id')){
            return back()->with('error','Không tìm thấy dữ liệu cần xóa!');
        }
        else{
            $ids = $request->get('detail-goods-id');
            foreach ($ids as $id){
                $goodsReceiptDetails = GoodsReceiptNoteDetail::findOrFail($id);
                $goodsReceiptDetails->delete();
                $goodsReceiptCost = GoodsReceiptNoteCost::where('goods_receipt_note_id', $idGoods)->get();
                $totalCosts = GoodsReceiptNoteDetail::where('goods_receipt_note_id', $idGoods)->sum('cost');

                if (!empty($goodsReceiptCost)) {
                    foreach ($goodsReceiptCost as $goodsCost) {
                        $goodsCost->cost = $totalCosts;
                        $goodsCost->update();
                        return back()->with('success', 'Thêm thành công!');
                    }
                }
            }
        }


        return back()->with('success','Xóa thành công!');
    }
}
