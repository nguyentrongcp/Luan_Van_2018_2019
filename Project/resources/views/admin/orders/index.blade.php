@extends('admin.layouts.master')

@section('title', 'Quản lý đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ ĐƠN HÀNG</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        <div class="ui padded grid">
        <div class="eleven wide column">
            <a href="{{ route('orders.create') }}" class="ui small blue button">
                <i class="plus icon"></i>Thêm mới
            </a>
            @include('admin.orders.btn_filer')
            @if(\Illuminate\Support\Facades\Request::has('filter'))
                @php
                    $text = [
                        'chua-duyet' => 'Chưa duyệt',
                        'dang-van-chuyen' => 'Đang vận chuyển',
                        'da-giao-hang' => 'Đã giao hàng',
                        'da-huy' => 'Đã hủy'
                    ]
                @endphp
                <div class="ui small label">
                    {{ $text[\Illuminate\Support\Facades\Request::get('filter')] }}
                    <a href="{{ route('orders.index') }}"><i class="delete icon"></i></a>
                </div>
            @endif
        </div>
        <div class="five wide column">
            @include('admin.orders.name_searching')

        </div>
        </div>
        @include('admin.orders.table')
        <form id="form-delete" action="{{route('orders.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
        </form>

        {{--        @include('admin.foodyTypes.modals')--}}
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('check-all');
        $('.item').on('click', function () {
            $('#key-filter').val($(this).attr('data-value'));
            $('#form-filter').submit();
        });
    </script>
@endpush
