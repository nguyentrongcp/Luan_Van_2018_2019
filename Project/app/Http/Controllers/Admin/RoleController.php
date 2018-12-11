<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\EmployeeRole;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.employees.role.index', compact('roles'));
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
        if ($request->get('name') == '') {
            return back()->with('error', 'Tên vai trò không được bỏ trống!');
        }
        elseif (Role::where('name', $request->get('name'))->count() > 0) {
            return back()->with('error', 'Tên vai trò đã tồn tại!');
        }
        if ($request->role == '') {
            return back()->with('error', 'Bạn chưa chọn phân quyền!');
        }
        $role = new Role();
        $role->name = $request->get('name');
        $role->save();

        foreach($request->role as $function) {
            $role_detail = new EmployeeRole();
            $role_detail->role_id = $role->id;
            $role_detail->function_id = $function;
            $role_detail->save();
        }

        return back()->with('success', 'Thêm thành công!');
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
        $name = $request->get('name');
        if ($name == '') {
            return back()->with('error', 'Tên vai trò không được bỏ trống!');
        }
        elseif (Role::find($id)->name != $name && Role::where('name', $name)->count() > 0) {
            return back()->with('error', 'Tên vai trò đã tồn tại!');
        }
        if ($request->role == '') {
            return back()->with('error', 'Bạn chưa chọn phân quyền!');
        }
        $roles = explode(',', $request->role);
        foreach(EmployeeRole::where('role_id', $id)->get() as $role_detail) {
            $role_detail->delete();
        }
        foreach($roles as $role) {
            $role_detail = new EmployeeRole();
            $role_detail->role_id = $id;
            $role_detail->function_id = $role;
            $role_detail->save();
        }

        return back()->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        foreach($request->get('role-id') as $id) {
            if (Admin::where('role_id', $id)->count() > 0) {
                return back()->with('error', 'Vai trò "'.Role::find($id)->name.'" không thể xóa!');
            }
            else {
                Role::find($id)->delete();
            }
        }

        return back()->with('success', 'Xóa thành công!');
    }
}
