<?php

namespace App\Http\Controllers\admin;

use App\ShopInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ShopInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopInfo = ShopInfo::find(1);
        return view('admin.shop_infos.index',compact('shopInfo'));
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
    public function update(Request $request,$id)
    {
        $shopInfos = ShopInfo::find($id);
        $shopInfos->name = $request->get('shop-name');
        $shopInfos->address = $request->get('shop-address');
        $shopInfos->phone = $request->get('shop-phone');
        $shopInfos->email = $request->get('shop-email');
        $shopInfos->update();

        if (!$request->hasFile('logo')) {
            return back()->with('error', 'Bạn chưa upload hình ảnh!');
        } else {
            $shopInfos = ShopInfo::find($id);

            $oldPath = $shopInfos->logo;
            if (!empty($oldPath)) {
                File::delete($oldPath);
            }
            $time = time();
            $ext = $request->file('logo')->extension();
            $path = $request->file('logo')
                ->move('admin\assets\images', "logo-$id-$time.$ext");
            $shopInfos->logo = str_replace('\\', '/', $path);
            $shopInfos->update();
        }
        return back()->with('success','Cập nhật thông tin thành công');
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

    public function changeLogo(Request $request, $id){

        if (!$request->hasFile('logo')) {
            return back()->with('error', 'Bạn chưa upload hình ảnh!');
        } else {
            $shopInfos = ShopInfo::find($id);

            $oldPath = $shopInfos->logo;
            if (!empty($oldPath)) {
                File::delete($oldPath);
            }
            $time = time();
            $ext = $request->file('logo')->extension();
            $path = $request->file('logo')
                ->move('admin\assets\images', "logo-$id-$time.$ext");
            $shopInfos->logo = str_replace('\\', '/', $path);
            $shopInfos->update();

            return back()->with('success','Cập nhật logo thành công');
        }
    }
}
