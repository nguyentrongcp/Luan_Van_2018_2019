<?php

namespace App\Http\Controllers\Customer;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        if (Auth::guard('customer')->check()) {
            $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();

            return view('customer.order.index', compact('orders'));
        }
        else {
            $error = 'Xin lỗi, bạn không đủ quyền truy cập vào trang này.';
            return view('errors.404', compact('error'));
        }
    }

    public function getOrder(Request $request) {
        $orders = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
        $page = (count($orders) % 10 == 0) ? count($orders) / 10 : (int)(count($orders) / 10 + 1);
        if ($request->page > $page || $request->page < 0) {
            return Response(['status' => 'error']);
        }
        $data = '';
        foreach($orders as $stt => $order) {
            if ($stt == $request->page * 10) {
                break;
            }
            if ($stt < $request->page * 10 - 10) {
                continue;
            }
            $order_code = strtoupper($order->order_code);
            $count = $stt + 1;
            $phone = substr($order->phone, 0, strlen($order->phone) - 6).' ';
            $phone .= substr($order->phone, strlen($order->phone) - 6, 3).' ';
            $phone .= substr($order->phone, strlen($order->phone) - 3, 3);
            $date = date_format(date_create($order->order_created_at), 'd-m-Y H:i:s');
            $cost = number_format($order->total_of_cost);
            $href = route('payment.order.show', $order_code);
            $data .= "
                <tr>
                    <td class=\"center-align\">$count</td>
                    <td><a href='$href'>$order_code</a></td>
                    <td>$order->receiver</td>
                    <td class=\"center-align\"><span class=\"phone-format\">$phone</span></td>
                    <td class=\"center-align\">$date</td>
                    <td class=\"right-align\">$cost<sup>đ</sup></td>
                </tr>
            ";
        }

        return Response(['text' => $data, 'total' => $page, 'status' => 'success']);
    }

    public function showOrder(Request $request) {
        $order = Order::where('order_code', $request->order_code)->first();
        $order_details = $order->orderDetails;

        return view('customer.order.show', compact(['order', 'order_details']));
    }

    public function removeOrder(Request $request) {
        if ($request->otp == session('otp')) {
            if (Order::find($request->order_id) == null) {
                $data = [
                    'status' => 'error_null',
                    'text' => "<i class='exclamation icon'></i> Đơn hàng này đã bị xóa.",
                    'button' => "Về trang chủ"
                ];
            }
            else {
                $order = Order::find($request->order_id);
                if ($order->getStatus() != 0) {
                    $data = [
                        'status' => 'error',
                        'text' => "<i class='exclamation icon'></i> 
                               Đơn hàng đã được duyệt và đang thực hiện, bạn không thể hủy đơn hàng này.",
                        'button' => "Xác nhận"
                    ];
                }
                else {
                    $order->delete();
                    $data = [
                        'status' => 'success',
                        'text' => "<i class='check icon'></i> Bạn đã hủy đơn hàng thành công.",
                        'button' => 'Xác nhận'
                    ];
                }
            }
            $request->session()->forget('otp');
        }
        else {
            $data = [
                'status' => 'error_otp',
                'error_text' => 'Mã OTP không chính xác!'
            ];
        }

        return Response($data);
    }

    public function create($request) {
        $otp = rand(100000, 999999);
        session(['time' => time(), 'otp' => $otp]);
    }

    public function getOTP(Request $request) {
        if (!$request->session()->has('time')) {
            $time = 10;
            $this->create($request);
        }
        else {
            $time = time() - session('time');
            if ($time < 10) {
                $time = 10 - $time;
            }

            else {
                $time = 10;
                $this->create($request);
            }

        }

        return Response(['time' => $time, 'otp' => session('otp')]);
    }
}
