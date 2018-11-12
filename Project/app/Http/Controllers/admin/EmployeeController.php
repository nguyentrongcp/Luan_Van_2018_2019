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
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Admin::where('is_deleted',false)
                            ->orderBy('role_id','ASC')->paginate(10);
        $roles = Role::all();
        return view('admin.employees.index', compact('employees', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.employees.create.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validationStore($request);
        if ($validate->fails()) {
            return back()->withErrors($validate)
                ->withInput($request->only('employee-phone', 'employee-pwd'));
        }
        $email = $request->get('employee-email');
        if (Employees::Existed($email)) {
            return back()->withErrors(['employee-email' => "Email $email đã tồn tại"]);
        }

        $pass = $request->get('employee-pwd');
        $pass_confirm = $request->get('employee-confirm-pwd');
        if ($pass != $pass_confirm) {
            return back()->withErrors(['employee-confirm-pwd' => "Mật khẩu không trùng khớp!"]);
        }
        $admins = new Employees();
        $admins->name = $request->get('employee-name');
        $admins->phone = $request->get('employee-phone');
        $admins->email = $email;

        $arr = explode("@", $email);
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Admin::find($id);

        return view('admin.employees.show.index', compact('employee'));
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
        $validate = $this->validationUpdate($request);
        if ($validate->fails()) {
            return back()->withErrors($validate)
                ->withInput($request->only('employee-phone'));
        }
        $emailRq = $request->get('employee-email');

        $employee = Employees::findOrFail($id);
        $employee->name = $request->get('employee-name');
        $employee->phone = $request->get('employee-phone');
        $employee->address = $request->get('employee-address');
        $employee->email = $emailRq;
        $employee->role_id = $request->get('employee-role-id');
        $employee->update();

        return back()->with('success', 'Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('employee-id');
        foreach ($ids as $id) {
            $employee = Employees::find($id);
            $employee->is_deleted = true;
            $employee->update();
        }
        return back()->with('success', 'Xóa thành công!');
    }

    public function resetPass(Request $request, $id)
    {
        $employee = Employees::findOrFail($id);

        $password = $request->get('new-pwd');
        $passwordConf = $request->get('confirm-pwd');
        if ($password != $passwordConf) {
            return back()->with('error', "Mật khẩu nhập lại không khớp");
        }
        $employee->password = bcrypt($password);
        $employee->update();

        return back()->with('success', 'Thay đổi mật khẩu thành công');
    }

    public function validationStore(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'employee-phone' => array('required', 'min:10', 'max:10', 'regex:/^(0[35789])[0-9]{8}$/'),
                'employee-pwd' => array('required', 'min:8', "regex:/^[A-ỹ][0-ỹ \+\(\)\/]*$/")
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'min' => ':attribute không được ít hơn :min ký tự!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                'employee-phone' => 'Số điện thoại',
                'employee-pwd' => 'Mật khẩu'
            ]
        );

        return $validate;
    }

    public function validationUpdate(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'employee-phone' => array('required', 'min:10', 'max:10', 'regex:/^(0[35789])[0-9]{8}$/'),
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'min' => ':attribute không được ít hơn :min ký tự!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                'employee-phone' => 'Số điện thoại',
            ]
        );

        return $validate;
    }

    public function changePass(Request $request, $id)
    {
        $employee = Employees::findOrFail($id);
        $oldPassword = $request->get('oldPassword');
        if (!password_verify($oldPassword, $employee->password))
        {
            return back()->with('error', "Mật khẩu cũ không chính xác");
        }
        $password = $request->get('password');
        $employee->password = bcrypt($password);
        $employee->update();

        return back()->with('success', 'Thay đổi mật khẩu thành công');
    }
    public function changeInfo(Request $request, $id){
        $employee = Employees::findOrFail($id);
        $employee->name = $request->get('employee-name');
        $employee->phone = $request->get('employee-phone');
        $employee->update();

        return back()->with('success','Cập nhật thành công!');
    }
}
