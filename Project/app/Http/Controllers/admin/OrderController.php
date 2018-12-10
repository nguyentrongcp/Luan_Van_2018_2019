<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Material;
use App\MaterialFoody;
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
            if ($order->waitingPay() || $order->unapproved()){
                foreach (OrderFoody::where('order_id',$id)->get() as $orderFoody){
                    foreach (MaterialFoody::where('foody_id',$orderFoody->foody_id)->get() as $materialFoody){
                        foreach (Material::where('id',$materialFoody->material_id)->get() as $material){
                            $material->value += $orderFoody->amount * $materialFoody->value;
                            $material->update();
                        }
                    }
                }
                $order->delete();
            }
            if ($order->approved()) {
                $orderStatuses = OrderStatus::where('order_id', $id)->get();
                foreach ($orderStatuses as $orderStatus) {
                    $orderStatus->status = 0;
                    $orderStatus->update();
                }
            }
            if ($order->getStatus() == 2){
                $order->is_deleted = true;
                $order->update();
            }
            return redirect(route('orders.index'))->with('success','Hủy đơn hàng thành công!');
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

    public function search(Request $request) {
        $key_search = $request->key;
        $orders = Order::where('is_deleted',false)->where('order_code','like', "%$key_search%")->get();
        $data = '';
        foreach($orders as $key => $order) {
            $date = date_format(date_create($order->order_created_at),'d/m/Y');
//            dd($date);
            $data .= "<div class=\"divider\"></div>
    <div class=\"result-content\">
        <div class=\"col twelve medium row\">
            <div class=\"col five medium\">
                <i class=\"clipboard icon icon-left\"></i><a href=\"orders/$order->id\"><strong>ĐH:</strong>$order->order_code</a>
                   <label>$date</label>
            </div>
        </div>
        <div class=\"divider\"></div>
    </div>";
        }
        return Response($data);
    }
}
