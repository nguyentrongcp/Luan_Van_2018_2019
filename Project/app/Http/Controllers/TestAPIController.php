<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use nusoap_server;

class TestAPIController extends Controller
{

    private $secure_pass = '20101e04dca1d1570c7cb608aa3084e1';

    public function index() {
        $server = new nusoap_server();
        $server->configureWSDL('WS_WITH_SMS','NS');
        $server->wsdl->schemaTargetNamespace='NS';
        // Khai bao cac Function
        $server->register('UpdateOrder',array('transaction_info'=>'xsd:string','order_code'=>'xsd:string','payment_id'=>'xsd:int','payment_type'=>'xsd:int','secure_code'=>'xsd:string'),array('result'=>'xsd:int'),'NS');
        $server->register('RefundOrder',array('transaction_info'=>'xsd:string','order_code'=>'xsd:string','payment_id'=>'xsd:int','refund_payment_id'=>'xsd:int','payment_type'=>'xsd:int','secure_code'=>'xsd:string'),array('result'=>'xsd:int'),'NS');
        // Khoi tao Webservice
        $HTTP_RAW_POST_DATA = (isset($HTTP_RAW_POST_DATA)) ? $HTTP_RAW_POST_DATA :'';
        $server->service($HTTP_RAW_POST_DATA);
    }

    public function UpdateOrder($transaction_info,$order_code,$payment_id,$payment_type,$secure_code) {
        global $secure_pass;


        // Kiểm tra chuỗi bảo mật
        $secure_code_new = md5($transaction_info.' '.$order_code.' '.$payment_id.' '.$payment_type.' '.$secure_pass);
        if($secure_code_new != $secure_code)
        {
            return -1; // Sai mã bảo mật
        }
        else // Thanh toán thành công
        {
            // Trường hợp là thanh toán tạm giữ. Hãy đưa thông báo thành công và cập nhật hóa đơn phù hợp
            if($payment_type == 2)
            {
                $order = new Order();
                $order->code = '111111111111111';
                $order->receiver = 'nguyennguyen';
                $order->to = 'nguyennguyen';
                $order->email = 'nguyennguyen@gmail.com';
                $order->phone = '0333333333';
                $order->payment_type = 2;
                $order->total_of_cost = 10000;
                $order->transport_fee = 10;
                $order->save();
                // Lập trình thông báo thành công và cập nhật hóa đơn
            }
            // Trường hợp thanh toán ngay. Hãy đưa thông báo thành công và cập nhật hóa đơn phù hợp
            elseif($payment_type == 1)
            {
                // Lập trình thông báo thành công và cập nhật hóa đơn
            }
        }
    }
    public function RefundOrder($transaction_info, $order_code, $payment_id, $refund_payment_id, $refund_amount, $refund_type, $refund_description, $secure_code)
    {
        $error = 'Chưa xác minh';

        $md5 = $transaction_info." ".$order_code." ".$payment_id." ".$refund_payment_id." ".$refund_amount." ".$refund_type." ".$refund_description." ".$secure_pass;
        if (md5($md5) == strtolower($secure_code)) {
            $error = 'payment success';
        } else {
            $error = 'Tham số truyền bị thay đổi';
        }
        //log
        $params = array(
            'time'     => date('H:i(worry), d/m/Y', time()),
            'transaction_info'  => $transaction_info,
            'order_code'   => $order_code,
            'payment_id'   => $payment_id,
            'refund_payment_id'  => $refund_payment_id,
            'refund_amount'   => $refund_amount,
            'refund_type'   => $refund_type,
            'refund_description' => $refund_description,
            'secure_code'   => $secure_code,
            'error'     => $error
        );
        $content = json_encode($params);
        if (writeLog('refund_order.txt',$content)) {
            $error = 'khongcooilidf';
        } else {
            $error = 'File log không tồn tại';
        }
        //
        return array('error'=>$error);
    }
}
