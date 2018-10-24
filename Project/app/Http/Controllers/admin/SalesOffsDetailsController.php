<?php

namespace App\Http\Controllers\Admin;

use App\SalesOffDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class SalesOffsDetailsController extends Controller
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
        $ids = $request->get('foody-id');
        if (!$request->get('foody-id')){
            return back()->with('error','Bạn chưa chọn dữ liệu thêm vào!');
        }
        if (is_array($ids) || is_object($ids)){
            foreach ($ids as $id) {
                $salesOffId = $request->get('sales-offs-id');
                if (SalesOffDetail::where('sales_off_id', $salesOffId)->where('foody_id', $id)->count() <= 0) {
                    $salesOffsDetails = new SalesOffDetail();
                    $salesOffsDetails->sales_off_id = $salesOffId;
                    $salesOffsDetails->foody_id = $id;
                    $salesOffsDetails->save();
                }
            }
        }
        return back()->with('success','Thêm thành công!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $ids = $request->get('sales-offs-details-id');
        if (!$request->has('sales-offs-details-id')) {
            return back()->with('error', 'Dữ liệu chưa được chọn');
        }
        foreach ($ids as $id) {
            $salesOffs = SalesOffDetail::findOrFail($id);
            $salesOffs->delete();
        }
        return back()->with('success','Xóa thành công!');
    }
}
