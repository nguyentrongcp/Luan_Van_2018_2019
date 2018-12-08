@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    @php $logged = Auth::guard('customer')->check() ? 'true' : 'false' @endphp

    <div class="row white order-show">
        @if($logged == 'true')
            <div class="navigation truncate">
                <a>Trang chủ</a>
                <i class="angle double right small icon"></i><a href="{{ route('payment.order.index') }}">Lịch sử đặt hàng</a>
                <i class="angle double right small icon"></i>{{ strtoupper($order->order_code) }}
            </div>
        @endif

        <div class="col s12 order-show-header">
            Đơn hàng: {{ strtoupper($order->order_code) }}
        </div>

        <div class="row order-container">
            <div class="col s12 order-title">
                <span>Thông tin đơn hàng</span>
                @if($order->orderStatus->status == 0)
                    <i id="order-remove" class="material-icons right tooltipped"
                       data-tooltip="Hủy đơn hàng" data-position="left">delete_forever</i>
                @endif
                <div class="divider col s12"></div>
            </div>
            <div class="col s12 m12 l6 order-content-left">
                <div class="col s12 order-row">
                    <span class="col til">Người nhận:</span><span class="col cont">{{ $order->receiver }}</span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Email:</span><span class="col cont truncate">{{ $order->email }}</span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Số điện thoại:</span><span class="col cont phone-format">{{ $order->phone }}</span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Nơi nhận:</span><span class="col cont">{{ $order->to }}</span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Địa chỉ:</span><span class="col cont">{{ $order->address }}</span>
                </div>
            </div>
            <div class="col s12 m12 l6 order-content-right">
                <div class="col s12 order-row">
                    <span class="col til">Ngày đặt hàng:</span><span class="col cont">
                        {{ date_format(date_create($order->order_created_at), 'd/m/Y H:i') }}
                        <span style="color: #666">
                            {{ \App\Functions::getDateCount(date_create($order->order_created_at)->getTimestamp()) }}
                        </span>
                    </span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Hình thức thanh toán:</span><span class="col cont">
                        {{ $order->paymentType() }}
                    </span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Phí giao hàng:</span><span class="col cont">
                        {{ number_format($order->transport_fee) }}<sup>đ</sup>
                    </span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Số tiền thanh toán:</span><span class="col cont">
                        {{ number_format($order->total_of_cost) }}<sup>đ</sup>
                    </span>
                </div>
                <div class="col s12 order-row">
                    <span class="col til">Tình trạng:</span><span class="col cont">
                        @if($order->cancelled())
                            <i class="delete red-text open fitted icon"></i>
                            <span class="red-text"><strong> Đã hủy</strong></span>
                        @elseif($order->unapproved())
                            <i class="warning open fitted orange-text icon"></i>
                            <span class="orange-text"><strong> Chưa duyệt</strong></span>
                        @elseif($order->getStatus() == -1)
                            <i class="wait open fitted orange-text icon"></i>
                            <span class="orange-text"><strong> Đang thanh toán online</strong></span>
                        @elseif($order->getStatus() == 2)
                            <i class="check open fitted green-text icon"></i>
                            <span class="green-text"><strong>Đã giao hàng</strong></span>
                        @else
                            <i class="shipping fast open fitted teal-text icon"></i>
                            <span class="teal-text"><strong>Đang vận chuyển</strong></span>
                        @endif
                    </span>
                </div>
            </div>

            <div class="col s12 order-title">
                Chi tiết đơn hàng
                <div class="divider col s12"></div>
            </div>
            <div class="col s12 order-detail-table">
                <table class="striped">
                    <thead>
                    <tr>
                        <th class="center-align">STT</th>
                        <th>Tên ẩm thực</th>
                        <th class="hide-on-small-only">Hình ảnh</th>
                        <th class="center-align">Số lượng</th>
                        <th class="right-align">Đơn giá</th>
                        <th class="center-align">Giảm giá</th>
                        <th class="right-align">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_details as $stt => $order_detail)
                        <tr>
                            <td class="center-align">{{ $stt + 1 }}</td>
                            <td>{{ \App\Foody::find($order_detail->foody_id)->name }}</td>
                            <td class="hide-on-small-only">
                                <img class="responsive-img" src="{{ asset(\App\Foody::find($order_detail->foody_id)->avatar) }}">
                            </td>
                            <td class="center-align">{{ $order_detail->amount }}</td>
                            <td class="right-align">{{ number_format($order_detail->cost) }}<sup>đ</sup></td>
                            <td class="center-align">
                                <span class="ui red small label">{{ $order_detail->sales_off_percent }}%</span></td>
                            <td class="right-align">{{ number_format($order_detail->total_of_cost) }}<sup>đ</sup></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    @include('customer.layouts.components.modal.confirm-modal')
    @include('customer.layouts.components.modal.notify-modal')
    @include('customer.payment.otp-modal')

    <style>
        .order-show {
            padding: 0 20px 20px 20px;
        }
        .order-show-header {
            font-size: 25px !important;
            font-weight: 600 !important;
            margin: 20px 0;
            cursor: default;
        }
        .order-title {
            color: #666;
            font-size: 20px;
            font-weight: 500;
            margin: 15px 0;
        }
        .order-title i {
            font-size: 27px;
            cursor: pointer;
        }
        .order-container .til {
            font-weight: 500;
            width: 160px;
        }
        .order-container .cont {
            width: calc(100% - 160px);
        }
        .order-row {
            margin-bottom: 10px;
        }
        .order-container table .responsive-img {
            max-height: 100px;
        }
        .order-detail-table {
            max-height: 1000px !important;
            overflow-y: auto;
        }
        i.angle.right {
            float: unset !important;
        }
        .navigation {
            font-size: 12px;
            padding-top: 10px;
        }

        @media only screen and (max-width: 600px) {
            .order-container .til, .order-container .cont {
                width: 100% !important;
            }
            .order-show {
                padding: 0 5px 10px 5px !important;
            }

        }
        @media only screen and (min-width: 993px) {
            .order-content-left {
                padding-right: 10px !important;
            }
            .order-content-right {
                padding-left: 10px !important;
            }

        }
    </style>

    @push('script')
        <script>
            $(document).ready(function () {
                $('#payment-otp-modal').modal({
                    dismissible: false,
                    opacity: 0.8
                });
            });

            $('#order-remove').on('click', function () {
                $('#confirm-modal-button').on('click', function () {
                    getOTP();
                });
                $('#confirm-modal').css('max-width', 450);
                $('#confirm-modal').modal('open');
            });

            function getOTP() {
                $.ajax({
                    type: 'get',
                    url: '{{ route('payment.order.get_otp') }}',
                    data: {
                        order_id: '{{ $order->id }}'
                    },
                    success: function (data) {
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
                });
            }

            function checkOTP() {
                if ($('#payment-otp').val() === '') {
                    $('#error-payment-otp').text('Bạn chưa nhập mã OTP!');
                    $('#error-payment-otp').removeClass('hide');
                }
                else {
                    $.ajax({
                        type: 'post',
                        url:  '/payment/order/remove',
                        data: {
                            otp: $('#payment-otp').val(),
                            order_id: '{{ $order->id }}'
                        },
                        success: function (data) {
                            if (data.status === 'error_otp') {
                                $('#error-payment-otp').text(data.error_text);
                                $('#error-payment-otp').removeClass('hide');
                            }
                            else {
                                $('#payment-otp-modal').modal('close');
                                $('#notify-modal-text').html(data.text);
                                $('#notify-modal-button').html(data.button);
                                if (data.status === 'error_null') {
                                    $('#notify-modal').css('max-width', 303);
                                    $('#notify-modal-button').attr('href', '{{ route('customer.home') }}');
                                }
                                else if (data.status === 'error') {
                                    $('#notify-modal-button').attr('href', '{{ Request::url() }}');
                                    $('#notify-modal').css('max-width', 753);
                                }
                                else {
                                    $('#notify-modal').css('max-width', 390);
                                    if ('{{ $logged }}' === 'true') {
                                        $('#notify-modal-button').attr('href', '{{ route('payment.order.index') }}');
                                    }
                                    else {
                                        $('#notify-modal-button').attr('href', '{{ route('customer.home') }}')
                                    }
                                }
                                $('#notify-modal').modal('open');
                            }
                        }
                    });
                }
            }
        </script>
    @endpush

@endsection