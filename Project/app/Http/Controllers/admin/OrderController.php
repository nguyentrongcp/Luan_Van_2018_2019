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
use Barryvdh\DomPDF\Facade as PDF;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::join('order_statuses as os','os.order_id','=','orders.id')
            ->where('is_deleted',false)
            ->orderBy('os.status','ASC')
            ->orderBy('orders.order_created_at','DESC')
            ->paginate(10);
        if ($request->has('filter')) {
            $id = [
                'chua-duyet' => 0,
                'dang-van-chuyen' => 1,
                'da-giao-hang' => 2,
                'da-huy' => 3
            ];
            $orders = Order::join('order_statuses as os','os.order_id','=','orders.id')
                ->where('is_deleted',false)->where('status', $id[$request->filter])
                ->orderBy('os.status','ASC')
                ->orderBy('orders.order_created_at','DESC')
                ->paginate(10);
        }


        return view('admin.orders.index',compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.orders.create.index');
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

    public function filter(Request $request){
        $orderFilters = DB::table('orders as o')
                    ->join('order_statuses as os','os.order_id','=','o.id')
                    ->join('order_foodies as of','o.id','=','of.order_id')
                    ->where('os.status','=',$request->id)
                    ->orderBy('o.order_created_at','DESC')
                    ->groupBy('o.id')
                    ->paginate(10);

        return Response($orderFilters);
//        return view('admin.orders.filter.index',compact('orderFilters'));
    }

    public function orderApproved($id){
        $orders = OrderStatus::where('order_id',$id)->get();
        foreach ($orders as $order){
            $order->status = 1;
            $order->admin_id = Admin::adminId();
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
                $orderStatus->admin_id = Admin::adminId();
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

    public function printOrder($id){
        $order = Order::find($id);
        $orderDetails = DB::table('orders as o')
            ->join('order_foodies as of','o.id','of.order_id')
            ->where('o.id',$id)
            ->get();
        $pdf = PDF::loadView('admin.orders.show.order_preview',compact('order','orderDetails'));

        return $pdf->stream();
    }
}
