<?php

namespace App\Http\Controllers\admin\restore;

use App\Admin;
use App\Employees;
use App\GoodsReceiptNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeRestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Admin::where('is_deleted', true)->paginate(10);

        return view('admin.restore.employee.index', compact('employees'));
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
        if (!$request->has('employee-ids')) {
            return back();
        }

        $ids = $request->get('employee-ids');
        foreach($ids as $id) {
            $employee = Admin::findOrFail($id);
            $employee->is_deleted = false;
            $employee->update();
        }

        return back()->with('success', 'Phục hồi thành công.');
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
    public function destroy($id)
    {
        //
    }
    public function delete(Request $request)
    {
        if (!$request->has('employee-ids')) {
            return back();
        }
        $ids = $request->get('employee-ids');
        foreach ($ids as $id) {
            $goodsIds = GoodsReceiptNote::where('admin_id',$id)->get();
            foreach ($goodsIds as $goodsId){
                $goodsId->delete();
            }
            $employee = Employees::find($id);
            $employee->delete();
        }
        return redirect()->route('employee_restore.index')->with('success', 'Xóa thành công.');
    }
}
