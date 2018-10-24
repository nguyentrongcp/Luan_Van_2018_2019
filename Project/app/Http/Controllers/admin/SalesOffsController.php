<?php

namespace App\Http\Controllers\admin;

use App\Foody;
use App\SalesOff;
use App\SalesOffDetail;
use App\SalesOffDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalesOffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salesOffs = SalesOff::where('parent_id',null)->paginate(10);

        return view('admin.sales_offs.index', compact('salesOffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salesOff = new SalesOff();
        $salesOff->name = $request->get('sales-offs-name');
        $salesOff->percent = $request->get('percent');
        $salesOff->start_date = $request->get('start-date');
        $salesOff->end_date = $request->get('end-date');
        $salesOff->save();

        return back()->with('success', 'Thêm mới khuyến mãi thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodies = Foody::all();
        $salesOffsDetails = SalesOffDetail::where('sales_off_id',$id)->paginate(10);

        return view('admin.sales_offs.show.index',compact('foodies','salesOffsDetails','id'));
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
        $salesOff = SalesOff::findOrFail($id);

        $salesOff->name = $request->get('name-sales');
        $salesOff->percent = $request->get('percent');
        $salesOff->start_date = $request->get('start-date');
        $salesOff->end_date = $request->get('end-date');
        $salesOff->update();

        return back()->with('success', 'Khuyến mãi đã cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $ids = $request->get('sales-offs-id');
        if (!$request->has('sales-offs-id')) {
            return back()->with('error', 'Dữ liệu chưa được chọn');
        }
        foreach ($ids as $id) {
            $salesOffs = SalesOff::findOrFail($id);
            $salesOffs->delete();
        }
        return back()->with('success','Xóa thành công!');
    }

    public function movePageCreateSales($id){

        $sales_id = SalesOff::find($id);
        $sales_name = $sales_id->name;

        $salesOffs = SalesOff::where('parent_id',$id)->paginate(10);

        return view('admin.sales_offs.create.index',
            compact('sales_name','salesOffs','id'));
    }
}
