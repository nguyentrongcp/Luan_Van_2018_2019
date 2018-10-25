<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Order;
use App\OrderFoody;
use App\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $orders = DB::table('orders')->join('order_statuses','orders.id','=','order_statuses.order_id')
//                    ->orderBy('order_statuses.status','ASC')->paginate(10);
        $orders = Order::where('is_deleted',false)->paginate(10);
        return view('admin.orders.index',compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::findOrFail($id);
        $orderFoodys = OrderFoody::where('order_id',$id)->get();
        $orderCode = $orders->order_code;


        return view('admin.orders.show.index',compact('orders','orderFoodys','orderCode','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderStatuses = OrderStatus::where('order_id',$id)->get();
        foreach($orderStatuses as $orderStatus){
            ($orderStatus->status == 1)?($orderStatus->status = 2):($orderStatus->status = 1);
            $orderStatus->update();
        }
        return back()->with('success', 'Cập nhật trạng thái giao hàng thành công');
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

    public function filter($id){
        $orderFilters = DB::table('orders')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->join('order_foodies','orders.id','=','order_foodies.order_id')
            ->where('order_statuses.status','=',$id)->paginate(10);
        $amountFoody = DB::table('orders')
            ->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->join('order_foodies','orders.id','=','order_foodies.order_id')
            ->where('order_statuses.status','=',$id)
            ->count('order_foodies.foody_id');
        return view('admin.orders.filter.index',compact('orderFilters'));
    }

    public function orderApproved($id){
        $orders = OrderStatus::where('order_id',$id)->get();
        foreach ($orders as $order){
            $order->status = 1;
            $order->admin_id = Auth::guard('admin')->id();
            $order->approved_date = date('Y-m-d H:i:s');
            $order->update();
        }
        return back()->with('success','Đơn hàng đã được duyệt!');
    }
    public function orderCancelled($id){
        $order = Order::findOrFail($id);
            if ($order->cancelled()){
                $order->is_deleted = true;
                $order->update();
            }
            $orderStatuses = OrderStatus::where('order_id',$id)->get();
            foreach ($orderStatuses as $orderStatus){
                $orderStatus->status = 3;
                $orderStatus->admin_id = Auth::guard('admin')->id();
                $orderStatus->approved_date = date('Y-m-d H:i:s');
                $orderStatus->update();
            }
            $orderFoodies = OrderFoody::where('order_id',$id)->get();
            foreach ($orderFoodies as $orderFoody){
                $orderFoody->is_deleted = true;
                $orderFoody->update();
            }
            return back()->with('success','Hủy đơn hàng thành công!');
    }
}
