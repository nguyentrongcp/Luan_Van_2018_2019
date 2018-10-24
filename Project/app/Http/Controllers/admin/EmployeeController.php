<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Decentralization;
use App\DecentralizeEmployees;
use App\EmployeeRole;
use App\Employees;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Admin::paginate(10);
        $roles = Role::all();
        return view('admin.employees.index',compact('employees','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.employees.create.index',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->get('employee-email');
        if (Employees::Existed($email))
        {
            return back()->with('errors', ["Email $email đã tồn tại"]);
        }
        $admins = new Employees();
        $admins->name = $request->get('employee-name');
        $admins->phone = $request->get('employee-phone');
        $admins->email = $email;

        $arr = explode("@",$email);
        $admins->username = $arr[0];
        $admins->address = $request->get('employee-address');
        $admins->password = bcrypt($request->get('employee-pwd'));
        $admins->role_id = $request->get('employee-role-id');
        $admins->save();
        return back()->with('success', 'Thêm nhân viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Admin::find($id);

        return view('admin.employees.show.index',compact('employee'));
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
        $email = Employees::find($id)->email;
        $emailRq = $request->get('employee-email');


        $employee = Employees::findOrFail($id);
        $employee->name = $request->get('employee-name');
        $employee->phone = $request->get('employee-phone');
        $employee->address = $request->get('employee-address');
        if ($request->has('employee-email')){
            if(($email != $emailRq) && Employees::Existed($emailRq)){
                return back()->with('errors', ["Email $email đã tồn tại"]);
            }
            $employee->email = $emailRq;
        }
        $employee->role_id = $request->get('employee-role-id');
        $employee->update();

        return back()->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('employee-id');
        foreach ($ids as $id){
            $employee = Employees::find($id);
            $employee->delete();
        }
        return back()->with('success','Xóa thành công!');
    }

    public function resetPass(Request $request, $id)
    {
        $employee = Employees::findOrFail($id);
        $oldPassword = $request->get('old-pwd');
        if (!password_verify($oldPassword, $employee->password))
        {
            return back()->with('error', "Mật khẩu cũ không chính xác");
        }
        $password = $request->get('new-pwd');
        $passwordConf = $request->get('confirm-pwd');
        if ($password != $passwordConf)
        {
            return back()->with('error', "Mật khẩu nhập lại không khớp");
        }
        $employee->password = bcrypt($password);
        $employee->update();

        return back()->with('success', 'Thay đổi mật khẩu thành công');
    }
}
