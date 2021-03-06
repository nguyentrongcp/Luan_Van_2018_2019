<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\GoodsReceiptNote;
use App\GoodsReceiptNoteCost;
use App\GoodsReceiptNoteDetail;
use App\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GoodsReceiptNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goodsReceipts = GoodsReceiptNote::where('is_deleted',false)
                        ->orderBy('date','DESC')->paginate(10);

        return view('admin.goods_receipt.indexGoods.index',compact('goodsReceipts'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $goodsReceipt = new GoodsReceiptNote();

        $goodsReceipt->name = Admin::adminName();
        $goodsReceipt->date = $request->get('date');
        $goodsReceipt->admin_id = Admin::adminId();
        $goodsReceipt->save();

        return redirect(route('goods_receipt_note.index'))->with('success','Thêm phiếu nhập thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $goodsReceipt = GoodsReceiptNote::findOrFail($id);

        $goodsReceipt->name = Admin::adminName();
        $goodsReceipt->date = $request->get('date');
        $goodsReceipt->admin_id = Admin::adminId();
        $goodsReceipt->update();

        return back()->with('success','Cập nhật phiếu nhập thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!$request->has('goods-receipt-id')){
            return back()->with('error','Dữ liệu chưa được chọn!');
        }
        else{
            $ids = $request->get('goods-receipt-id');
            foreach ($ids as $id){
                $goodsReceipt = GoodsReceiptNote::findOrFail($id);
                $goodsReceipt->is_deleted = true;
                $goodsReceipt->update();
            }
        }
        return back()->with('success','Xóa thành công!');
    }

    public function moveDetail($id){

        $goodsReceipt = GoodsReceiptNote::findOrFail($id);
        $date = $goodsReceipt->date;

        $admin= Admin::findOrFail($goodsReceipt->admin_id);
        $name = $admin->name;

        $goodsCosts = GoodsReceiptNoteCost::where('goods_receipt_note_id',$id)->get();
        $totalCost = 0;
        if (!empty($goodsCosts)){
                $totalCost = GoodsReceiptNoteDetail::where('goods_receipt_note_id',$id)->sum('total_cost');
        }
        else{
            return $totalCost;
        }

        $goodsReceiptDetails = GoodsReceiptNoteDetail::where('goods_receipt_note_id',$id)->paginate(10);


        return view('admin.goods_receipt.indexDetails.index',
            compact('goodsReceiptDetails','id','date','name','totalCost'));
    }

    public function showMaterialNeededGoods(){
        $materials = Material::where('is_deleted',false)->where('value','<=',15)->get();

        return view('admin.goods_receipt.index',compact('materials'));
    }
}
