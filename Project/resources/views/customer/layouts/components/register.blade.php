@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    @php use \App\Http\Controllers\Customer\CartFunction; @endphp

    <div class="row white payment">
        <form id="form-payment">
            @csrf
            <span class="center-align col s12 payment-header" style="margin-bottom: 30px">
                Đăng ký tài khoản
            </span>
            <div class="col s12 payment-form">
                <div class="row">
                    <div class="col s12 m6 l6 payment-col-left">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name-reg" type="text" value="Nguyễn Trọng">
                            <label for="name-reg">
                                Họ và tên <span class="red-text">*</span>
                            </label>
                            <span id="error-name-reg" class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 payment-col-right">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">face</i>
                            <select id="gender-reg">
                                <option value='male'>Nam</option>
                                <option value="female">Nữ</option>
                            </select>
                            <label>Giới tính</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6 payment-col-left">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email-reg" type="text" value="nguyentrongcp@gmail.com">
                            <label for="email-reg">
                                Email <span class="red-text">*</span>
                            </label>
                            <span id="error-email-reg" class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 payment-col-right">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">local_phone</i>
                            <input id="phone-reg" class="number-only" type="text" value="0329883047" maxlength="10">
                            <label for="phone-reg">
                                Số điện thoại <span class="red-text">*</span>
                            </label>
                            <span id="error-phone-reg" class="helper-text"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6 payment-col-left">
                        <div class="input-field col s12">
                            <input id="pass-reg" type="password" maxlength="30">
                            <label for="pass-reg">
                                Mật khẩu <span class="red-text">*</span>
                            </label>
                            <span id="error-pass-reg" class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 payment-col-right">
                        <div class="input-field col s12">
                            <input id="pass-confirm-reg" type="password" maxlength="30">
                            <label for="pass-confirm-reg">
                                Nhập lại mật khẩu <span class="red-text">*</span>
                            </label>
                            <span id="error-pass-confirm-reg" class="helper-text"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="input-field col s12">
                            <textarea id="address-reg" class="materialize-textarea"></textarea>
                            <label for="address-reg">
                                Địa chỉ <span class="red-text">*</span>
                            </label>
                            <span id="error-address-reg" class="helper-text"></span>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 offset-m6 l6 offset-l6">
                    <div class="col s12 payment-action">
                        <a id="reg-submit" class="waves-effect waves-light btn-fluid btn">
                            ĐĂNG KÝ
                        </a>
                    </div>
                </div>
            </div>

        </form>
    </div>

    <style>
        .helper-text {
            color: red !important;
        }
    </style>

    @include('customer.payment.otp-modal')

    @include('customer.payment.style')

    @push('script')
        <script>
            $(document).ready(function () {
                $('#payment-otp-modal').modal({
                    dismissible: false,
                    opacity: 0.8
                });
            });

            function checkEmpty() {
                let check = true;
                if ($('#name-reg').val() === '') {
                    $('#error-name-reg').text('Vui lòng không bỏ trống họ tên!');
                    check = false;
                }
                if ($('#phone-reg').val() === '') {
                    $('#error-phone-reg').text('Vui lòng không bỏ trống số điện thoại!');
                    check = false;
                }
                if ($('#email-reg').val() === '') {
                    $('#error-email-reg').text('Vui lòng không bỏ trống email!');
                    check = false;
                }
                if ($('#pass-reg').val() === '') {
                    $('#error-pass-reg').text('Vui lòng không bỏ trống mật khẩu!');
                    check = false;
                }
                else if ($('#pass-confirm-reg').val() !== $('#pass-reg').val()) {
                    $('#error-pass-confirm-reg').text('Mật khẩu nhập lại không khớp!');
                    check = false;
                }
                if ($('#address-reg').val() === '') {
                    $('#error-address-reg').text('Vui lòng không bỏ trống địa chỉ!');
                    check = false;
                }

                return check;
            }

            $('input, textarea').on('input', function () {
                $('#error-' + this.id).text('');
            });

            $('#reg-submit').on('click', function () {
                if (checkEmpty()) {
                    $.ajax({
                        type: 'post',
                        url: '{{ route('customer.register.submit') }}',
                        data: {
                            name: $('#name-reg').val(),
                            gender: $('#gender-reg').val(),
                            email: $('#email-reg').val(),
                            phone: $('#phone-reg').val(),
                            pass: $('#pass-reg').val(),
                            address: $('#address-reg').val()
                        },
                        success: function (data) {
                            if(data.status === 'error') {
                                empty();
                                $.each(data.errors, function (key, value) {
                                    $('#error-' + key + '-reg').html('<span class="red-text">' + value + '</span>');
                                });
                            }
                            else if (data.status === 'error_exist') {
                                empty();
                                $.each(data.errors, function (key, value) {
                                    $('#error-' + value['name'] + '-reg').html('<span class="red-text">' + value['content'] + '</span>');
                                });
                            }
                            else {
                                getOTP();
                            }
                        }
                    });
                }
            });

            function getOTP() {
                $.ajax({
                    type: 'get',
                    url: '{{ route('payment.order.get_otp') }}',
                    success: function (data) {
                        $('#error-payment-otp').addClass('hide');
                        empty();
                        $('#payment-otp-modal').modal('open');
                        $('#otp-text').html('Đang gửi mã OTP...');
                        var time = data.time - 1;
                        var timer = setInterval(function () {
                            if (time === -1) {
                                $('#otp-timer').text('');
                                clearInterval(timer);
                                $('#otp-text').html("Bạn chưa nhận được mã? <a onclick='getOTP()'>Thử lại</a>");
                            }
                            else {
                                $('#otp-timer').text(time + 's');
                                time--;
                            }
                        }, 1000);
                        console.log(data.otp);
                    }
                })
            }

            function checkOTP() {
                if ($('#payment-otp').val() === '') {
                    $('#error-payment-otp').text('Bạn chưa nhập mã OTP!');
                    $('#error-payment-otp').removeClass('hide');
                }
                else {
                    $.ajax({
                        type: 'post',
                        url:  '{{ route('customer.register.check_otp') }}',
                        data: {
                            otp: $('#payment-otp').val()
                        },
                        success: function (data) {
                            if (data.status === 'error_otp') {
                                $('#error-payment-otp').text(data.error_text);
                                $('#error-payment-otp').removeClass('hide');
                            }
                            else {
                                M.toast({
                                    html: data.content
                                });
                                window.location.href = '{{ route('customer.home') }}';
                            }
                        }
                    });
                }
            }

            function empty() {
                $('#error-name-reg').empty();
                $('#error-address-reg').empty();
                $('#error-phone-reg').empty();
                $('#error-email-reg').empty();
                $('#error-pass-reg').empty();
                $('#error-pass-confirm-reg').empty();
            }
        </script>
    @endpush


@endsection