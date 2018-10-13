<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Decentralization;
use App\DecentralizeEmployees;
use App\Employees;
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
        return view('admin.employees.index',compact('employees'));
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
        $email = $request->get('email');
        if (Employees::Existed($email))
        {
            return back()->with('errors', ["Email $email đã tồn tại"]);
        }
        $admins = new Employees();
        $admins->name = $request->get('name');
        $admins->phone = $request->get('phone');
        $admins->email = $email;

        $arr = explode("@",$email);
        $admins->username = $arr[0];
        $admins->address = $request->get('address');
        $admins->password = bcrypt($request->get('pass'));
        $admins->save();

        $idDecentralizes = $request->get('decentralization');dd(decentralizes());
        $admins->decentralizes()->sync($idDecentralizes);

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
}
