@push('script')
    <script>
        M.textareaAutoResize($('#note'));

        $(document).ready(function(){
            $('#payment-otp-modal').modal({
                dismissible: false
            });
            $('#error-modal').modal({
                dismissible: false
            });
            getFee();
        });

        $('#district').change(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/customer/get_ward",
                data: {
                    district_id: $(this).val()
                },
                success: function (data) {
                    $('#ward').empty();
                    $.each(data, function (key, value) {
                        $('#ward').append(new Option(value.ward, value.id));
                        $('#ward').formSelect();
                    });
                    getFee();
                }
            })
        });

        $('#ward').change(function () {
            getFee();
        });
        
        function setTotalCost(cost) {
            $('#payment-cost').html('<b>' + cost + '<sup>đ</sup></b>');
        }

        function getFee() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/customer/get_transport_fee",
                data: {
                    transport_id: $("#ward").val()
                },
                success: function (data) {
                    $('#transport-fee').html(data.fee_text);
                    $('#transport-fee').attr('data-cost', data.fee_number);
                    setTotalCost(data.toltal_cost);
                }
            })
        }

        function checkEmpty() {
            var empty = false;
            if ($('#address').val() === '') {
                $('#error-address').html("<span class='red-text'>Địa chỉ không được bỏ trống!</span>");
                empty = true;
            }
            if (($('#name').val()) === '') {
                $('#error-name').html("<span class='red-text'>Họ tên không được bỏ trống!</span>");
                empty = true;
            }
            if (($('#phone').val()) === '') {
                $('#error-phone').html("<span class='red-text'>Số điện thoại không được bỏ trống!</span>");
                empty = true;
            }
            if (($('#email').val()) === '') {
                $('#error-email').html("<span class='red-text'>Email không được bỏ trống!</span>");
                empty = true;
            }

            return empty;
        }

        function empty() {
            $('#error-name').empty();
            $('#error-address').empty();
            $('#error-phone').empty();
            $('#error-email').empty();
            $('#error-note').empty();
        }

        function getOTP() {
            var type = $('input[name=payment-type]:checked', '#form-payment').val();
            if ($('#foody-cost').attr('data-cost') === '0') {
                $('#error-modal-text').text('Giỏ hàng trống. Vui lòng thêm thức ăn vào giỏ hàng của bạn.');
                $('#error-modal-button').text('Chuyển hướng');
                $('#error-modal-button').attr('href', "/home");
                $('#error-payment-modal').modal('open');
            }
            else {
                if (!checkEmpty()) {
                    let cost = [];
                    $('.payment-table-cost').each(function (key, value) {
                        cost[$(value).attr('data-id')] = $(value).attr('data-cost');
                    });
                    $.ajax({
                        type: "post",
                        url: "/customer/get_payment_otp",
                        data: {
                            address: $('#address').val(),
                            to: $('#to').val(),
                            district: $('#district').val(),
                            ward: $('#ward').val(),
                            name: $('#name').val(),
                            phone: $('#phone').val(),
                            email: $('#email').val(),
                            note: $('#note').val(),
                            type: type,
                            cost: cost
                        },
                        error: function(data) {
                            empty();
                            var response = JSON.parse(data.responseText);
                            $.each(response.errors, function (key, value) {
                                $('#error-' + key).html('<span class="red-text">' + value + '</span>');
                            });
                            $("html, body").animate({ scrollTop: 0 }, "slow");
                        },
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
                else {
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                }
            }
        }

        function checkOTP() {

            if ($('#payment-otp').val() === '') {
                $('#error-payment-otp').text('Bạn chưa nhập mã OTP!');
                $('#error-payment-otp').removeClass('hide');
            }
            else {
                $.ajax({
                    type: "post",
                    url: "/customer/check_payment_otp",
                    data: {
                        otp: $('#payment-otp').val()
                    },
                    error: function(data) {
                        if (data.status === 404) {
                            $('#error-payment-otp').text(data.responseText);
                            $('#error-payment-otp').removeClass('hide');
                        }
                        else {
                            $('#payment-otp-modal').modal('close');
                            $('#error-modal-text').text(data.responseText);
                            $('#error-payment-modal').modal('open');

                        }
                    },
                    success: function (data) {
                        if (data.type === 'payment') {
                            // SetExpressCheckout(data.order_code,data.total_code,data.name,data.email,data.phone,data.address);
                            window.location.href = '/home';
                        }
                        else {
                            window.location.href = '/home';
                        }
                    }
                })
            }

        }

        function SetExpressCheckout(order_code, total_cost, name, email, phone, address) {
            $.ajax({
                type: 'post',
                url: 'https://sandbox.nganluong.vn:8088/nl30/checkout.api.nganluong.post.php',
                data: {
                    merchant_id: 46875,
                    merchant_password: '20101e04dca1d1570c7cb608aa3084e1',
                    version: '3.1',
                    receiver_email: 'nguyentrongcp@gmail.com',
                    order_code: order_code,
                    total_amount: total_cost,
                    payment_method: 'ATM_ONLINE',
                    bank_code: '101001339544',
                    order_description: 'Thanh toán',
                    tax_amount: 0,
                    discount_amount: 0,
                    fee_shipping: 0,
                    return_url: '/home',
                    cancel_url: '/payment',
                    buyer_fullname: name,
                    buyer_email: email,
                    buyer_mobile: phone,
                    buyer_address: address,
                    cur_code: 'vnd',
                    lang_code: 'vi',
                }
            });
        }
    </script>
@endpush