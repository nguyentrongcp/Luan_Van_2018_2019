<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsApiController extends Controller
{
    function getUserInfo() {
        $sms = new SpeedSMSAPIController("Your access token");
        $userInfo = $sms->getUserInfo();
        var_dump($userInfo);
    }

    function sendSMS($phone, $content) {
        $sms = new SpeedSMSAPIController("Your access token");
        $return = $sms->sendSMS([$phone], $content, 4, "");
        var_dump($return);
    }

    function createPIN($phone, $content, $appId) {
        $twoFA = new TwoFactorAPIController("Your access token");
        $result = $twoFA->pinCreate($phone, $content, $appId);
        var_dump($result);

    }

    function verifyPIN($phone, $pinCode, $appId) {
        $twoFA = new TwoFactorAPIController("Your access token");
        $result = $twoFA->pinVerify($phone, $pinCode, $appId);
        var_dump($result);
    }
}
