<?php

namespace App\Http\Controllers\Admin;

use App\SalesOffsDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        foreach ($ids as $id){
            $salesOffsDetails = new SalesOffsDetails();
            $salesOffsDetails->sales_offs_id = $request->get('sales-offs-id');
            $salesOffsDetails->foody_id = $id;
            $salesOffsDetails->save();
//            }
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
            $salesOffs = SalesOffsDetails::findOrFail($id);
            $salesOffs->delete();
        }
        return back()->with('success','Xóa thành công!');
    }
}
