<?php

namespace App\Http\Controllers\admin\restore;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderRestoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderRestores = Order::join('order_statuses as os','os.order_id','=','orders.id')
            ->where('is_deleted',true)
            ->orderBy('os.status','ASC')
            ->orderBy('orders.order_created_at','DESC')
            ->paginate(10);

        return view('admin.restore.order.index',compact('orderRestores'));
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
        if (!$request->has('order-ids')) {
            return back();
        }

        $ids = $request->get('order-ids');
        foreach($ids as $id) {
            $order = Order::findOrFail($id);
            $order->is_deleted = false;
            $order->update();
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
    public function destroy(Request $request)
    {

    }
    public function delete(Request $request){
        if (!$request->has('order-ids')) {
            return back();
        }
        $ids = $request->get('order-ids');
        foreach($ids as $id) {
            $order = Order::find($id);
            $order->delete();
        }
        return redirect(route('order_restore.index'))->with('success', 'Xóa thành công.');
    }
}
