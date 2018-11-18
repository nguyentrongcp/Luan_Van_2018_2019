<?php

namespace App\Http\Controllers\admin;

use App\District;
use App\TransportFee;
use App\Ward;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransportFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::paginate(10);

        return view('admin.transport_fees.index', compact('districts'));
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
        $districtId = $request->get('district-id');

        $transportFees = new TransportFee();
        $transportFees->district_id = $districtId;
        $transportFees->ward = $request->get('ward-name');
        $transportFees->cost = $request->get('fee');
        $transportFees->save();

        return back()->with('success','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $districts = District::findOrFail($id);
        $nameDistrict = $districts->district;
        $transportFees = TransportFee::where('district_id', $id)->paginate(10);

        return view('admin.transport_fees.show.index', compact('districts', 'transportFees', 'nameDistrict','id'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeDistrict(Request $request)
    {

        $dis = $request->get('district-name');
        if (District::ExistedDistrict($dis)) {
            return back()->with('error', 'Tên quận/huyện đã tồn tại!');
        }
        $district = new District();

        $district->district = $request->get('district-name');
        $district->save();
        return redirect(route('transport_fees.index'))->with('success', 'Thêm thành công!');
    }

    public function updateDistrict(Request $request, $id)
    {
        $dis = $request->get('district-name');
        $district = District::findOrFail($id);

        $district->district = $dis;
        $district->update();
        return redirect(route('transport_fees.index'))->with('success', 'Thêm thành công!');
    }
}
