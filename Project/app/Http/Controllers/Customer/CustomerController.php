<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Foody;
use App\FoodyType;
use App\Functions;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Validator;

class CustomerController extends Controller
{

    public function index()
    {
        $foodies = Foody::all();
        $foody_types = FoodyType::all();
        $newses = News::all();
        foreach($foodies as $foody) {
            $foody_sorts[] = ['id' => $foody->id, 'buy' => $foody->orderFoodies()->count()];
        }
        $foody_buys = array_sort($foody_sorts, function($foody_sorts) {
            return $foody_sorts['buy'];
        });
        $foody_sales = DB::table('sales_off_details')
            ->join('foodies', 'foody_id', 'foodies.id')
            ->join('sales_offs as s2', 'sales_off_details.sales_off_id', 's2.id')
            ->join('sales_offs as s1', 's2.sales_off_id', 's1.id')
            ->where('s1.start_date', '<=', date('Y-m-d'))
            ->where('s1.end_date', '>=', date('Y-m-d'))
            ->orderBy('s2.percent', 'desc')
            ->select('foodies.id')->get();

        return view('customer.index.index', compact([
            'foodies',
            'foody_types',
            'newses',
            'foody_buys',
            'foody_sales'
        ]));
    }

    public function showRegister() {


        return view('customer.layouts.components.register');
    }

    public function register(Request $request) {
        $validate = Validator::make(
            $request->all(),
            [
                'address' => array('required', 'max:100', 'regex:/^[0-9A-z][0-ỹ \/,\.\+-]*$/'),
                'name' => array('required', 'max:50', 'regex:/^[[:alpha:]][A-ỹ ]*$/'),
                'phone' => array('required', 'regex:/^[0][0-9]{9}$/'),
                'email' => array('required', 'email', 'max:100'),
                'pass' => array('required', 'min:6', 'max:30', 'regex:/^[0-9A-z \/\.\+-,\?\*&\^%\$#@\{\}\[\]<>:]*$/')
            ],
            [
                'email' => ':attribute không đúng định dạng!',
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!',
                'min' => ':attribute phải có ít nhất :min ký tự!'
            ],
            [
                'address' => 'Địa chỉ',
                'name' => 'Họ tên',
                'phone' => 'Số điện thoại',
                'email' => 'Email',
                'pass' => 'Mật khẩu'
            ]
        );


        if ($validate->fails()) {
            return Response(['status' => 'error', 'errors' => $validate->getMessageBag()->toArray()]);
        }

        if (Customer::where('email', $request->email)->count() > 0 || Customer::where('phone', $request->phone)->count() > 0) {
            if (Customer::where('email', $request->email)->count() > 0) {
                $data[] = [
                    'name' => 'email',
                    'content' => 'Email đã tồn tại!'
                ];
            }
            if (Customer::where('phone', $request->phone)->count() > 0) {
                $data[] = [
                    'name' => 'phone',
                    'content' => 'Số điện thoại đã tồn tại!'
                ];
            }
            return Response(['status' => 'error_exist', 'errors' => $data]);
        }

        session([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'pass' => $request->pass,
            'gender' => $request->gender,
        ]);

        return Response(['status' => 'success']);
    }

    public function forget($request) {
        $request->session()->forget('name');
        $request->session()->forget('email');
        $request->session()->forget('pass');
        $request->session()->forget('gender');
        $request->session()->forget('phone');
        $request->session()->forget('address');
        $request->session()->forget('otp');
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

    public function checkOTP(Request $request) {
        if ($request->otp == session('otp')) {
            $customer = new Customer();
            $customer->name = session('name');
            $customer->email = session('email');
            $customer->phone = session('phone');
            $customer->address = session('address');
            $customer->password = bcrypt(session('pass'));
            $customer->gender = session('gender');
            $customer->save();


//            if (Auth::guard('customer')->attempt(['email' => session('email'), 'password' => session('pass')])) {
//                // if successful, then redirect to their intended location
//                CartFunction::syncToDB();
//            }
            $this->forget($request);
            $data = [
                'status' => 'success',
                'content' => "<i class='material-icons left green-text'>check</i> Đăng ký thành công"
            ];
        }
        else {
            $data = [
                'status' => 'error_otp',
                'error_text' => 'Mã OTP không chính xác!'
            ];
        }

        return Response($data);
    }

    public function changeProfile(Request $request) {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => array('required', 'max:50', 'regex:/^[[:alpha:]][A-ỹ ]*$/'),
                'pass' => array('required', 'min:6', 'max:30', 'regex:/^[0-9A-z \/\.\+-,\?\*&\^%\$#@\{\}\[\]<>:]*$/')
            ],
            [
                'required' => ':attribute không được bỏ trống!',
                'max' => ':attribute không được vượt quá :max ký tự!',
                'regex' => ':attribute không hợp lệ!',
                'min' => ':attribute phải có ít nhất :min ký tự!'
            ],
            [
                'name' => 'Họ tên',
                'pass' => 'Mật khẩu'
            ]
        );

        $data = '';
        if ($request->pass != '' || $request->pass_confirm != '' || $request->old_pass != '') {
            if ($validate->fails()) {
                $data = ['status' => 'error', 'errors' => $validate->getMessageBag()->toArray()];
            }
            elseif (!password_verify($request->old_pass, Auth::guard('customer')->user()->getAuthPassword())) {
                $data = ['status' => 'error',
                    'errors' => [
                        'pass-old' => 'Mật khẩu cũ không đúng!'
                    ]];
            }
            elseif ($request->pass != $request->pass_confirm) {
                $data = ['status' => 'error',
                    'errors' => [
                        'pass-confirm' => 'Mật khẩu nhập lại không khớp!'
                    ]];
            }
            if ($data != '') {
                return Response($data);
            }
        }
        if ($request->gender != 'male' && $request->gender != 'female') {
            $data = ['status' => 'error',
                'errors' => [
                    'gender' => 'Giới tính không hợp lệ!'
                ]];
            return Response($data);
        }
        $customer = Customer::find(Auth::guard('customer')->user()->id);
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->password = bcrypt($request->pass);
        if (asset($request->avatar) != asset($customer->avatar)) {
            $img = explode(";base64,", $request->avatar);
            $img_type_aux = explode("image/", $img[0]);
            $img_type = $img_type_aux[1];
            $img_base64 = base64_decode($img[1]);
            $name = "avatar-$customer->id".time().".$img_type";
            file_put_contents("customer/image/avatar/$name", $img_base64);

            if ($customer->avatar != asset('customer/image/default.png')) {
                File::delete($customer->avatar);
            }
            $customer->avatar = "/customer/image/avatar/$name";
        }
        $customer->update();
        $data = ['status' => 'success', 'avatar' => asset($customer->avatar),
            'name' => $customer->name, 'gender' => $customer->gender];

        return Response($data);
    }

}
