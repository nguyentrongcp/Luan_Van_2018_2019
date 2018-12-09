<?php

namespace App\Http\Controllers\admin;

use App\CalculationUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = CalculationUnit::all();

        return view('admin.unit.index', compact('units'));
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
        $name = $request->get('unit-name');
        $unit = $request->get('unit-unit');

        if ($name == '') {
            return back()->withErrors(['unit-name' => 'Tên đơn vị tính không được bỏ trống!']);
        }
        if ($unit == '') {
            return back()->withErrors(['unit-unit' => 'Ký hiệu không được bỏ trống!']);
        }
        if (CalculationUnit::where('name', $name)->count() > 0) {
            return back()->withErrors(['unit-name' => 'Tên đơn vị tính đã tồn tại!']);
        }
        if (CalculationUnit::where('unit', $unit)->count() > 0) {
            return back()->withErrors(['unit-unit' => 'Ký hiệu đã tồn tại!']);
        }

        $calculation_unit = new CalculationUnit();
        $calculation_unit->name = $name;
        $calculation_unit->unit = $unit;
        $calculation_unit->save();

        return back()->with('success', 'Thêm đơn vị tính thành công!');
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
        $name = $request->get('unit-name');
        $unit = $request->get('unit-unit');
        $calculation_unit = CalculationUnit::find($id);

        if ($name == $calculation_unit->name && $unit == $calculation_unit->unit) {
            return back();
        }
        elseif ($name == $calculation_unit->name && $unit != $calculation_unit->unit) {
            if (CalculationUnit::where('unit', $unit)->count() > 0) {
                return back()->withErrors(['errors' => 'Ký hiệu đã tồn tại!']);
            }
            else {
                $calculation_unit->unit = $unit;
                $calculation_unit->update();
            }
        }
        elseif ($name != $calculation_unit->name && $unit == $calculation_unit->unit) {
            if (CalculationUnit::where('name', $name)->count() > 0) {
                return back()->withErrors(['errors' => 'Tên đơn vị tính đã tồn tại!']);
            }
            else {
                $calculation_unit->name = $name;
                $calculation_unit->update();
            }
        }
        else {
            if (CalculationUnit::where('unit', $unit)->count() > 0) {
                return back()->withErrors(['errors' => 'Ký hiệu đã tồn tại!']);
            }
            if (CalculationUnit::where('name', $name)->count() > 0) {
                return back()->withErrors(['errors' => 'Tên đơn vị tính đã tồn tại!']);
            }

            $calculation_unit->name = $name;
            $calculation_unit->unit = $unit;
            $calculation_unit->update();
        }

        return back()->with('success', 'Cập nhật đơn vị tính thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach($request->get('unit-ids') as $id) {
            $unit = CalculationUnit::find($id);
            if ($unit->materials()->count() > 0) {
                return back()->with('error', "Đơn hàng \"$unit->name\" không thể xóa!");
            }
        }
        CalculationUnit::destroy($request->get('unit-ids'));

        return back()->with('success', 'Xóa đơn vị tính thành công!');
    }
}
