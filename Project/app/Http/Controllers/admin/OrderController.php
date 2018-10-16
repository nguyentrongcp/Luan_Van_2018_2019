<?php

namespace App\Http\Controllers\admin;

use App\Order;
use App\OrderFoody;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $orders = DB::table('orders')->join('order_statuses','orders.id','=','order_statuses.order_id')
                    ->orderBy('order_statuses.status','ASC')->paginate(10);

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


        return view('admin.orders.show.index',compact('orders','orderFoodys','orderCode'));
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

    public function filter($id){
        $orderFilters = DB::table('orders')->join('order_statuses','orders.id','=','order_statuses.order_id')
            ->where('order_statuses.status','=',$id)->paginate(10);

        return view('admin.orders.filter.index',compact('orderFilters'));
    }
}
