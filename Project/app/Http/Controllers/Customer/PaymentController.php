<?php

namespace App\Http\Controllers\Customer;

use App\District;
use App\Foody;
use App\Order;
use App\OrderFoody;
use App\OrderStatus;
use App\TransportFee;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index() {
        $districts = District::all();

        return view('customer.payment.index', compact('districts'));
    }

    public function getWard(Request $request) {
        $transport_fees = TransportFee::where('district_id', $request->district_id)->get();

        return Response($transport_fees);
    }

    public function getTransportFee(Request $request) {
        $transport_fee = TransportFee::find($request->transport_id);

        if (Cart::getCost() >= 300000) {
            $fee_text = 'Miễn phí';
            $fee_number = 0;
        }
        else {
            $fee_text = number_format($transport_fee->cost)."<sup>đ</sup>";
            $fee_number = $transport_fee->cost;
        }
        $cost = number_format(Cart::getCost() + $fee_number);
        session(['transport_fee' => $fee_number]);


        return Response(['fee_text' => $fee_text, 'fee_number' => $fee_number, 'toltal_cost' => $cost]);
    }

    public function sendOTP($phone) {
        $smsAPI = new SpeedSMSAPI("23CwwNwz_M7cbNUAuB1cWoSnSdahEpnO");
        $otp = session('otp');
        $content = "Ma OTP cua ban la $otp";
        $smsAPI->sendSMS($phone, $content, 4, '');
    }

    public function create($request) {
        $otp = rand(100000, 999999);
        session(['time' => time(), 'otp' => $otp]);
        $this->store($request);
//            $this->sendOTP([$request->phone]);
    }

    public function store($request) {
        session([
            'address' => $request->address,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'note' => $request->note,
            'type' => $request->type,
            'to' => $request->to,
        ]);
    }

    public function forget($request) {
        $request->session()->forget('address');
        $request->session()->forget('name');
        $request->session()->forget('phone');
        $request->session()->forget('email');
        $request->session()->forget('note');
        $request->session()->forget('type');
        $request->session()->forget('to');
        $request->session()->forget('time');
        $request->session()->forget('otp');
        $request->session()->forget('transport_fee');
        $request->session()->forget('total_of_cost');
    }

    public function getOTP(Request $request) {

        $validate = Validator::make(
            $request->all(),
            [
                'address' => array('required', 'max:100', 'regex:/^[0-9A-z][0-ỹ \/,\.\+-]*$/'),
                'name' => array('required', 'max:50', 'regex:/^[[:alpha:]][A-ỹ ]*$/'),
                'phone' => array('required', 'regex:/^[0][0-9]{9}$/'),
                'email' => array('required', 'email', 'max:100'),
//                $request->note => array('max:255', 'regex:/^[A-ỹ][A-ỹ \/,\.\+-]*$/')
                'note' => array('max:255')
            ],
            [
                'email' => ':attribute không hợp lệ!',
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!'
            ],
            [
                'address' => 'Địa chỉ',
                'name' => 'Họ tên',
                'phone' => 'Số điện thoại',
                'email' => 'Email',
                'note' => 'Ghi chú'
            ]
        );


        if ($validate->fails()) {
            return Response(['errors' => $validate->getMessageBag()->toArray()], 404);
        }


        if (!$request->session()->has('time')) {
            $time = 10;
            $this->create($request);
        }
        else {
            $time = time() - session('time');
            if ($time < 10) {
                $this->store($request);
                $time = 10 - $time;
            }

            else {
                $time = 10;
                $this->create($request);
            }

        }

        session($request->cost);

        return Response(['time' => $time, 'otp' => session('otp')]);

    }

    public function storeOrder() {
        do {
            $order_code = str_random(12);
        }
        while (Order::where('order_code', $order_code)->count() > 0);

        $order = new Order();
        $order->order_code = $order_code;
        $order->receiver = session('name');
        if (Auth::guard('customer')->check()) {
            $order->customer_id = Auth::guard('customer')->user()->id;
        }
        $order->email = session('email');
        $order->phone = session('phone');
        $order->address = session('address');
        $order->order_created_at = date('Y-m-d H:i:s');
        $order->payment_type = session('type');
        $order->to = session('to');
        $order->total_of_cost = Cart::getCost() + (double)session('transport_fee');
        $order->transport_fee = session('transport_fee');
        $order->save();

        $order_status = new OrderStatus();
        $order_status->order_id = $order->id;
        $order_status->status = 0;
        $order_status->save();

        foreach(Cart::content() as $cart) {
            $foody = Foody::find($cart->id);
            $cost = $foody->getSaleCost();
            $order_foody = new OrderFoody();
            $order_foody->order_id = $order->id;
            $order_foody->foody_id = $cart->id;
            $order_foody->amount = $cart->qty;
            $order_foody->cost = $cost;
            $order_foody->total_of_cost = $cart->qty * $cost;
            $order_foody->sales_off_percent = $foody->getSalePercent();
            $order_foody->save();
        }

    }

    public function checkOTP(Request $request) {
        foreach(Cart::content() as $cart) {
            if (Foody::find($cart->id)->getSaleCost() != session("$cart->id")) {
                return Response('Giá sản phẩm có thay đổi. Hãy cập nhật lại trước khi gửi đơn hàng.', 500);
            }
        }
        if ($request->otp == session('otp')) {
            $this->storeOrder();
            $this->forget($request);
        }
        else {
            return Response('Mã OTP không chính xác!', 404);
        }
    }
}
