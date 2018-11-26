@extends('admin.layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('orders.index') }}" class="need-popup a-decoration" data-content="Danh sách đơn hàng">
                <i class="blue small angle double left circular fitted icon"></i></a>
            Đơn hàng "{{ $orderCode }}"

            @if($orders->unapproved())
                <a href="{{ route('order_approved', [$orders->id]) }}" class="ui teal label a-decoration"
                   onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                    <i class="check open fitted icon"></i>
                    Duyệt
                </a>
                <a href="{{ route('order_cancelled', [$orders->id]) }}" class="ui orange label a-decoration"
                   onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')">
                    <i class="remove open fitted icon"></i>
                    Hủy
                </a>
            @endif

            {{--<a href="{{ route('print_order', [$donHang->id]) }}" class="ui label" style="float: right" target="_blank">--}}
                {{--<i class="print open fitted icon"></i>--}}
                {{--Xuất hóa đơn--}}
            {{--</a>--}}

        </h3>


        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.errors_msg')

        <div id="maps">
            <iframe id="google_map" src="https://maps.google.co.uk/?q=14.058324, 108.277199&z=60&output=embed"
                    width="500" height="300" frameborder="0" scrolling="no" marginheight="0"
                    marginwidth="0"></iframe>
        </div>

        @include('admin.orders.show.table')

        @if($orders->unapproved())
            <a href="{{ route('order_approved', [$orders->id]) }}" class="ui teal label a-decoration"
               onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                <i class="check open fitted icon"></i>
                Duyệt
            </a>
            <a href="{{ route('order_cancelled', [$orders->id]) }}" class="ui orange label a-decoration"
               onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng?')">
                <i class="remove open fitted icon"></i>
                Hủy
            </a>
        @endif
    </div>
@endsection