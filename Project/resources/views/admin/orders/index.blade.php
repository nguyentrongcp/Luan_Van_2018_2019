@extends('admin.layouts.master')

@section('title', 'Quản lý đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ ĐƠN HÀNG</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        <form action="{{route('orders.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                @include('admin.orders.btn_filer')
            </div>

            @include('admin.orders.table')

        </form>

{{--        @include('admin.foodyTypes.modals')--}}
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('check-all');
    </script>
@endpush
