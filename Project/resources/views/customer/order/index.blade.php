@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    @php
        $count = (count($orders) % 10 == 0) ? count($orders) / 10 : (int)(count($orders) / 10 + 1);
    @endphp
    <div class="row white payment-order">
        <div class="col s12 payment-order-header center-align">
            Lịch sử đặt hàng
        </div>
        <div class="right">
            <span>Trang </span>
            <div class="input-field paginate-page">
                <input class="number-only" data-page="1" id="page-number" type="text" value="1">
            </div>
            / <span id="page-total">{{ $count }}</span>
        </div>
        <table class="striped">
            <thead>
                <tr>
                    <th class="center-align">STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Người nhận</th>
                    <th class="center-align">Số điện thoại</th>
                    <th class="center-align">Ngày đặt hàng</th>
                    <th class="right-align">Tổng tiền</th>
                </tr>
            </thead>
            <tbody id="order-container">
                @foreach($orders as $stt => $order)
                    @if($stt == 10)
                        @break
                    @endif
                    <tr>
                        <td class="center-align">{{ $stt + 1 }}</td>
                        <td><a href="{{ route('payment.order.show', $order->order_code) }}">
                                {{ strtoupper($order->order_code) }}</a></td>
                        <td>{{ $order->receiver }}</td>
                        <td class="center-align"><span class="phone-format">{{ $order->phone }}</span></td>
                        <td class="center-align">{{ date_format(date_create($order->order_created_at), 'd-m-Y H:i:s') }}</td>
                        <td class="right-align">{{ number_format($order->total_of_cost) }}<sup>đ</sup></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if($count > 1)
            <div class="paginate center-align">
                <a class="waves-effect waves-light disabled btn" id="page-previous">
                    <i class="angle double left icon"></i>
                    Quay lại
                </a>
                <a class="waves-effect waves-light btn" id="page-next" style="margin-left: 20px">
                    Tiếp theo
                    <i class="angle double right icon"></i>
                </a>
            </div>
        @endif
        {{--<div class="paginate center-align">--}}
            {{--<i class="angle left icon paginate-pre"></i>--}}
            {{--@if($count <= 11)--}}
                {{--@for($i=1; $i<=$count; $i++)--}}
                    {{--<span class="paginate-number" style="{{ $i!=1?"margin-left: 5px;":'' }}">{{ $i }}</span>--}}
                {{--@endfor--}}
            {{--@else--}}

            {{--@endif--}}
            {{--<i class="angle right icon paginate-next"></i>--}}
        {{--</div>--}}
    </div>

    @include('customer.order.style')
    @include('customer.order.js')

@endsection