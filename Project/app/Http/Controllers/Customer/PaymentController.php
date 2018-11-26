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
use App\Http\Controllers\nganluong;

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

        if (CartFunction::getCost() >= 300000) {
            $fee_text = 'Miễn phí';
            $fee_number = 0;
        }
        else {
            $fee_text = number_format($transport_fee->cost)."<sup>đ</sup>";
            $fee_number = $transport_fee->cost;
        }
        $cost = number_format(CartFunction::getCost() + $fee_number);
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
            'src' => $request->src
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
        $request->session()->forget('secure_code');
        $request->session()->forget('src');
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

    public function storeOrder($order_code, $payment_type = 0) {

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
        $order->payment_type = $payment_type;
        $order->to = session('to');
        $order->total_of_cost = CartFunction::getCost() + (double)session('transport_fee');
        $order->transport_fee = session('transport_fee');
        if (session('src') != '') {
            $order->location = session('src');
        }
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
        session(['order_code' => $order_code]);

    }

    public function checkOTP(Request $request) {
        $data = [];
        foreach(Cart::content() as $cart) {
            if (Foody::find($cart->id)->getSaleCost() != session("$cart->id")) {
                $data = [
                    'status' => 'error_cost',
                    'error_text' => 'Giá sản phẩm có thay đổi. Hãy cập nhật lại trước khi gửi đơn hàng.'
                ];
            }
            if (!Foody::find($cart->id)->checkQuantity($cart->qty)) {
                $data = [
                    'status' => 'error_cost',
                    'error_text' => 'Rất tiếc, nguyên liệu không đủ. Hãy cập nhật lại trang để
                    xem lại số lượng mới trong giỏ hàng của bạn.'
                ];
            }
        }
        if ($request->otp == session('otp')) {
            do {
                $order_code = 'DH-'.strtoupper(str_random(12));
            }
            while (Order::where('order_code', $order_code)->count() > 0);
            if (session('type') == 0) {
                $this->storeOrder($order_code);
                $this->forget($request);
            }
            else {
                $total_cost = CartFunction::getCost() + (double)session('transport_fee');
                $url = $this->buildCheckoutUrl(route('payment.process'),
                    'nguyentrongcp@gmail.com','',$order_code,$total_cost);
                $data = [
                    'status' => 'success',
                    'type' => 'payment',
                    'url' => $url
                ];
            }
        }
        else {
            $data = [
                'status' => 'error_otp',
                'error_text' => 'Mã OTP không chính xác!'
            ];
        }

        return Response($data);
    }

    public function processPayment(Request $request) {

        if ($this->verifyPaymentUrl($request->transaction_info,$request->order_code,$request->price,
            $request->payment_id,$request->payment_type,$request->error_text,$request->secure_code)) {
            $this->storeOrder($request->order_code, $request->payment_type);
            $this->forget($request);

            return redirect('/home');
        }
    }

    public function buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price)
    {

        $merchant_site_code = 46875;
        $secure_pass = '20101e04dca1d1570c7cb608aa3084e1';
        $nganluong_url = 'https://sandbox.nganluong.vn:8088/nl35/checkout.php';

        $arr_param = array(
            'merchant_site_code'=>	strval($merchant_site_code),
            'return_url'		=>	strtolower(urlencode($return_url)),
            'receiver'			=>	strval($receiver),
            'transaction_info'	=>	strval($transaction_info),
            'order_code'		=>	strval($order_code),
            'price'				=>	strval($price)
        );
        $secure_code = implode(' ', $arr_param) . ' ' . $secure_pass;
        $arr_param['secure_code'] = md5($secure_code);

        $redirect_url = $nganluong_url;
        if (strpos($redirect_url, '?') === false)
        {
            $redirect_url .= '?';
        }
        else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
        {
            $redirect_url .= '&';
        }

        $url = '';
        foreach ($arr_param as $key => $value)
        {
            if ($key != 'return_url') $value = urlencode($value);

            if ($url == '')
                $url .= $key . '=' . $value;
            else
                $url .= '&' . $key . '=' . $value;
        }
        session(['secure_code' => $arr_param['secure_code']]);
        return $redirect_url.$url;
    }

    public function verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code)
    {
        $merchant_site_code = 46875;
        $secure_pass = '20101e04dca1d1570c7cb608aa3084e1';

        $str = '';
        $str .= ' ' . strval($transaction_info);
        $str .= ' ' . strval($order_code);
        $str .= ' ' . strval($price);
        $str .= ' ' . strval($payment_id);
        $str .= ' ' . strval($payment_type);
        $str .= ' ' . strval($error_text);
        $str .= ' ' . strval($merchant_site_code);
        $str .= ' ' . strval($secure_pass);

        $verify_secure_code = '';
        $verify_secure_code = md5($str);

        if ($verify_secure_code === $secure_code) return true;
        else return false;
    }

    public function successPayment(Request $request) {
        $order_code = session('order_code');
        $request->session()->forget('order_code');

        return view('customer.payment.success', compact('order_code'));
    }
}
