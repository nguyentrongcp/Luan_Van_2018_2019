<?php

namespace App\Http\Controllers\admin;

use App\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials  = Material::where('is_deleted',false)->paginate(10);

        return view('admin.material.index',compact('materials'));
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
        $name = $request->get('material-name');
        $material = new Material();
        if ($material->checkName($name)){
            return back()->with('error','Tên nguyên liệu đã tồn tại!');
        }
        if ($request->get('unit') == ''){
            return back()->with('error','Bạn chưa chọn đơn vị tính');
        }
        if ($request->get('value') == ''){
            return back()->with('error','Bạn chưa chọn đơn vị tính');
        }
        $material->name = $name;
        $material->value = $request->get('value');
        $material->calculation_unit_id = $request->get('unit');

        $material->save();

        return back()->with('success','Thêm nguyên liệu thành công!');
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
        $name = $request->get('material-name');
        $material = Material::findOrFail($id);
        if ($material->checkName($name) && $material->name != $name){
            return back()->with('error','Tên nguyên liệu đã tồn tại!');
        }
        if (!$request->has('unit')){
            return back()->with('error','Bạn chưa chọn đơn vị tính');
        }
        if ($request->get('value') == ''){
            return back()->with('error','Bạn chưa nhập số lượng');
        }
        $material->name = $name;
        $material->value = $request->get('value');
        $material->calculation_unit_id = $request->get('unit');

        $material->update();
        return back()->with('success','Cập nhật nguyên liệu thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!$request->has('material-ids')) {
            return back();
        }

        $ids = $request->get('material-ids');
        if (is_array($ids)){
            foreach($ids as $id) {
                $foody = Material::findOrFail($id);
                $foody->is_deleted = true;
                $foody->update();
            }
            return back()->with('success', 'Xóa thành công.');
        }
        $foody = Material::findOrFail($ids);
        $foody->is_deleted = true;
        $foody->update();
        return back()->with('success', 'Xóa thành công.');
    }
}
