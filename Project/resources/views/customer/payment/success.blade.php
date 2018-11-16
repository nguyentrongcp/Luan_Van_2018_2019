@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    <div class="row white payment-success">
        <div class="col s12 payment-success-header center-align">
            Thanh toán thành công
        </div>
        <div class="col s12 center-align">
            <span id="payment-success-title">
                Mã đơn hàng của bạn:
            </span>
            <label id="order-code">{{ $order_code }}</label>
            <i id="order-code-copy" class="material-icons center tooltipped" data-position="top" data-tooltip="copy">content_copy</i>
        </div>
        <div class="col s12 center-align payment-success-note">
            Hãy <b>lưu lại</b> mã đơn hàng của bạn để có thể <b>kiểm tra</b> tình trạng giao hàng, cũng như <b>hủy đơn hàng</b> (nếu chưa duyệt).
        </div>

        <div class="center">
            @if(!Auth::guard('customer')->check())
                <a href="{{ route('customer.home') }}" class="waves-effect waves-light btn">
                    <i class="material-icons left">home</i>Về trang chủ</a>
            @else
                <a href="{{ route('customer.home') }}" class="waves-effect waves-light btn red lighten-2">
                    <i class="material-icons left">home</i>Về trang chủ</a>
                <a href="{{ route('payment.order.index') }}" class="waves-effect waves-light btn">
                    <i class="material-icons left">assignment</i>Quản lý đơn hàng</a>
            @endif
        </div>
    </div>

    <style>
        .payment-success {
            min-height: calc(100vh - 56px);
        }
        /*.payment-success-header, #payment-success-title {*/
            /*cursor: default !important;*/
        /*}*/
        .payment-success i {
            font-size: 20px;
            vertical-align: middle;
            margin-left: 10px;
            cursor: pointer;
        }
        .payment-success .btn i {
            margin-left: 0;
        }
        .payment-success-header {
            font-size: 35px !important;
            font-weight: 600 !important;
            margin: 40px 0;
        }
        .payment-success-note {
            font-size: 13px;
            margin: 20px 0 50px 0;
        }
        #order-code {
            margin-left: 10px;
            font-weight: 500;
            border-bottom: rgba(0,0,0,0.3) solid 1px;
            font-size: 20px;
            cursor: inherit;
        }
        #payment-success-title {
            font-weight: 500;
            position: relative;
        }
        .order-code input {
            /*border: #26a69a solid 1px !important;*/
        }

        @media only screen and (min-width: 601px) {
            .payment-success {
                min-height: calc(100vh - 64px);
            }

        }
    </style>

    @push('script')
        <script>
            $(document).ready(function () {
                $('#order-code-copy').on('click', function () {
                    let $temp = $("<input>");
                    $("body").append($temp);
                    $temp.val($('#order-code').text()).select();
                    document.execCommand("copy");
                    $temp.remove();
                    M.Toast.dismissAll();
                    M.toast({
                        html: 'Đã copy'
                    });
                });
            });
        </script>
    @endpush

@endsection