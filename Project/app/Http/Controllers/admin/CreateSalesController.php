<?php

namespace App\Http\Controllers\admin;

use App\SalesOff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $salesOff = new SalesOff();
        $salesOff->name = $request->get('sales-offs-name');
        $salesOff->percent = $request->get('percent');
        $salesOff->sales_off_id = $request->get('id-sales');
        $salesOff->start_date = $request->get('start-date');
        $salesOff->end_date = $request->get('end-date');
        $salesOff->save();
        return back()->with('success','Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salesOffsDetails = SalesOffsDetails::where('sales_offs_id',$id)->paginate(10);

        return view('admin.sales_offs.show.index',compact('salesOffsDetails','id'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
