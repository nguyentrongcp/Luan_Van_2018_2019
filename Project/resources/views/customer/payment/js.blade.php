@push('script')
    <script>
        M.textareaAutoResize($('#note'));

        $(document).ready(function(){
            $('#payment-otp-modal').modal({
                dismissible: false,
                opacity: 0.8
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
                url: "/payment/get_ward",
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
            $.ajax({
                type: "post",
                url: "/payment/get_transport_fee",
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
            let type = $('input[name=payment-type]:checked', '#form-payment').val();
            if ($('#cart-qty').text() === '0') {
                $('#notify-modal-text').html("<i class='exclamation icon'></i>Giỏ hàng trống. Vui lòng thêm thức ăn vào giỏ hàng của bạn.");
                $('#notify-modal-button').text('Về trang chủ');
                $('#notify-modal-button').attr('href', '{{ route('customer.home') }}');
                $('#notify-modal').css('max-width', 611);
                $('#notify-modal').modal('open');
            }
            else {
                if (!checkEmpty()) {
                    let cost = [];
                    $('.payment-table-cost').each(function (key, value) {
                        cost[$(value).attr('data-id')] = $(value).attr('data-cost');
                    });
                    $.ajax({
                        type: "post",
                        url: "/payment/get_payment_otp",
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
                    url: "/payment/check_payment_otp",
                    data: {
                        otp: $('#payment-otp').val()
                    },
                    // error: function(data) {
                    //     if (data.status === 404) {
                    //         $('#error-payment-otp').text(data.responseText);
                    //         $('#error-payment-otp').removeClass('hide');
                    //     }
                    //     else {
                    //         $('#payment-otp-modal').modal('close');
                    //         $('#error-modal-text').text(data.responseText);
                    //         $('#error-modal-button').text('Cập nhật ngay');
                    //         $('#error-modal').modal('open');
                    //
                    //     }
                    // },
                    success: function (data) {
                        if(data.status === 'error_cost') {
                            $('#notify-modal-text').html("<i class='exclamation icon'></i>" + data.error_text);
                            $('#notify-modal-button').text('Cập nhật ngay');
                            $('#notify-modal-button').attr('href', '{{ route('payment.index') }}');
                            $('#notify-modal').css('max-width', 665);
                            $('#payment-otp-modal').modal('close');
                            $('#notify-modal').modal('open');

                            // $('#error-modal-text').text(data.responseText);
                            // $('#error-modal-button').text('Cập nhật ngay');
                            // $('#error-modal').modal('open');
                        }
                        else if (data.status === 'error_otp') {
                            $('#error-payment-otp').text(data.error_text);
                            $('#error-payment-otp').removeClass('hide');
                        }
                        else {
                            if (data.type === 'payment') {
                                // SetExpressCheckout(data.order_code,data.total_code,data.name,data.email,data.phone,data.address);
                                window.location.href = data.url;
                            }
                            else {
                                window.location.href = '{{ route('customer.home') }}';
                            }
                        }
                    }
                })
            }

        }
    </script>
@endpush