<?php

namespace App\Http\Controllers\admin;

use App\GoodsReceiptNoteCost;
use App\GoodsReceiptNoteDetail;
use App\Material;
use http\Exception\BadConversionException;
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
        if (!$request->get('unit')){
            return back()->with('error','Bạn chưa chọn đơn vị tính');
        }
        if ($request->get('material') != '') {
            $goodsReceiptDetail = new GoodsReceiptNoteDetail();
            $goodsReceiptDetail->material = $request->get('material');

        }
        else {
            $nameMaterial = Material::find($request->get('available-material'))->name;
            $material = Material::findOrFail($request->get('available-material'));
            $material->value += $request->get('quantity');
            $material->update();

            $goodsReceiptDetail = new GoodsReceiptNoteDetail();
            $goodsReceiptDetail->material = $nameMaterial;
        }
        $goodsReceiptDetail->quantity = $request->get('quantity');
        $goodsReceiptDetail->unit_id = $request->get('unit');
        $goodsReceiptDetail->cost = $request->get('cost');
        $goodsReceiptDetail->total_cost = $request->get('quantity') * $request->get('cost');
        $goodsReceiptDetail->goods_receipt_note_id = $idGoods;
        $goodsReceiptDetail->save();

        $goodsReceiptCost = GoodsReceiptNoteCost::where('goods_receipt_note_id', $idGoods)->get();
        $totalCosts = GoodsReceiptNoteDetail::where('goods_receipt_note_id', $idGoods)->sum('total_cost');

        if (!empty($goodsReceiptCost)) {
            foreach ($goodsReceiptCost as $goodsCost) {
                $goodsCost->cost = $totalCosts;
                $goodsCost->update();
                return back()->with('success', ' thành công!');
            }
        }
        $goodsReceiptCosts = new GoodsReceiptNoteCost();

        $goodsReceiptCosts->cost = $request->get('cost') * $request->get('quantity');
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

        if ($request->get('material') != ''){
            $goodsReceiptDetails->material = $request->get('material');
        }
        else{
            $goodsReceiptDetails->material = $request->get('available-material');
        }
        $goodsReceiptDetails->quantity = $request->get('quantity');
        $goodsReceiptDetails->unit_id = $request->get('unit');
        $goodsReceiptDetails->cost = $request->get('cost');
        $goodsReceiptDetails->total_cost = $request->get('quantity') * $request->get('cost');
        $goodsReceiptDetails->goods_receipt_note_id = $idGoods;
        $goodsReceiptDetails->update();

        $goodsReceiptCost = GoodsReceiptNoteCost::where('goods_receipt_note_id', $idGoods)->get();
        $totalCosts = GoodsReceiptNoteDetail::where('goods_receipt_note_id', $idGoods)->sum('cost');

        if (!empty($goodsReceiptCost)) {
            foreach ($goodsReceiptCost as $goodsCost) {
                $goodsCost->cost = $totalCosts;
                $goodsCost->update();
                return back()->with('success', 'Cập nhật thành công!');
            }
        }
        return back()->with('success', 'Cập nhật thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $idGoods = $request->get('goods-receipt-note-detail-id');
        if (!$request->has('goods-receipt-note-detail-id')) {
            return back()->with('error', 'Không tìm thấy dữ liệu cần xóa!');
        } else {
            $ids = $request->get('goods-receipt-note-detail-id');
            foreach ($ids as $id) {
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


        return back()->with('success', 'Xóa thành công!');
    }
}
