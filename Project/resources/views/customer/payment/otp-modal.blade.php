<div id="payment-otp-modal" class="modal">
    <div class="modal-content">
        <h5 class="modal-header">Xác thực đơn hàng</h5>
        <div class="col s12">
            <div class="col s12 input-field" style="margin-bottom: 20px">
                <input id="payment-otp" type="text" maxlength="6" autofocus>
                <label for="payment-otp">
                    Nhập mã OTP
                </label>
                <span id="error-payment-otp" class="helper-text red-text"></span>
                <span id="otp-text" style="margin: 10px 0 !important;">
                    {{--Bạn chưa nhận được mã?--}}
                    {{--<a href="#">Thử lại</a>--}}
                    {{--Đang gửi mã OTP...--}}
                </span>
                <span id="otp-timer"></span>
            </div>
        </div>
        <div class="modal-action">
            <a class="modal-close red lighten-2 waves-effect waves-light btn">Hủy bỏ</a>
            <a onclick="checkOTP()" class="waves-effect waves-light btn">Xác nhận</a>
        </div>
    </div>
</div>

<style>
    #payment-otp-modal {
        max-width: 360px;
    }
    #payment-otp-modal .modal-header {
        margin-bottom: 25px;
    }
    #otp-text a {
        cursor: pointer;
    }
</style>