<?php

namespace App\Http\Controllers\admin;

use App\CalculationUnit;
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
        if ($request->material == '') {
            return back()->with('error', 'Bạn chưa nhập tên nguyên liệu!');
        }
        if ($request->quantity == '') {
            return back()->with('error', 'Bạn chưa nhập số lượng!');
        }
        if ($request->cost == '') {
            return back()->with('error', 'Bạn chưa nhập đơn giá!');
        }
        else {
            if ($request->cost < 1000) {
                return back()->with('error', 'Đơn giá không được nhỏ hơn 1,000đ');
            }
            if ($request->cost > 10000000) {
                return back()->with('error', 'Đơn giá không được vượt quá 10,000,000đ');
            }
        }
        $idGoods = $request->get('goods-id');
        if (!$request->get('unit')) {
            return back()->with('error', 'Bạn chưa chọn đơn vị tính');
        }

        if (Material::where('id', $request->get('material'))->count() == 0) {
            $goodsReceiptDetail = new GoodsReceiptNoteDetail();
            $goodsReceiptDetail->material = $request->get('material');
        } else {
            $nameMaterial = Material::find($request->get('material'))->name;
            $material = Material::findOrFail($request->get('material'));
            $material->value += $request->get('quantity');
            $material->update();

            $goodsReceiptDetail = new GoodsReceiptNoteDetail();
            $goodsReceiptDetail->material = $nameMaterial;
            $goodsReceiptDetail->material_id = $request->get('material');

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

        if (Material::where('id', $request->get('material'))->count() < 0) {

            $goodsReceiptDetails->material = $request->get('material');
        } else {
            $nameMaterial = Material::find($request->get('material'))->name;
            $material = Material::findOrFail($request->get('material'));
            $material->value += $request->get('quantity');
            $material->update();

            $goodsReceiptDetails->material = $nameMaterial;
            $goodsReceiptDetails->material_id = $request->get('material');
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

                $goodsReceiptCost = GoodsReceiptNoteCost::where('goods_receipt_note_id', $idGoods)->get();
                $totalCosts = GoodsReceiptNoteDetail::where('goods_receipt_note_id', $idGoods)->sum('cost');

                $material = Material::find($goodsReceiptDetails->material_id);
                $total = $material->value - $goodsReceiptDetails->quantity;
                if ($total < 0){
                    $material->value = 0;
                }
                $material->value = $total;
                $material->update();
                if (!empty($goodsReceiptCost)) {
                    foreach ($goodsReceiptCost as $goodsCost) {
                        $goodsCost->cost = $totalCosts;
                        $goodsCost->update();
                        return back()->with('success', 'Thêm thành công!');
                    }
                }
                $goodsReceiptDetails->delete();
            }
        }


        return back()->with('success', 'Xóa thành công!');
    }

    public function getUnit(Request $request) {
        if (Material::find($request->get('id')) != null) {
            $value = Material::find($request->get('id'));
            return Response(['status' => 'exist', 'value' => $value->calculationUnit->id]);
        }
    }
}
