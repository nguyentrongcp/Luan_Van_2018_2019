@extends('admin.layouts.master')

@section('title', 'Phục hồi - đơn hàng')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Đơn hàng</span>
    </h2>

    <form  method="post" id="form-order-restore">
        {{ csrf_field() }}
        <button class="ui blue button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận phục hồi?')">
            <i class="undo fitted icon" id="btn-restore"></i>
        </button>
        <button class="ui red button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')">
            <i class="remove fitted icon" id="btn-delete"></i>
        </button>

        @include('admin.restore.order.table')
    </form>
@endsection

@push('script')
    <script>
        bindSelectAll('order-ids[]');
        $('#btn-restore').on('click',function () {
            $('#form-order-restore').attr("action","{{ route('order_restore.store', [0]) }}");
        })
        $('#btn-delete').on('click',function () {
            $('#form-order-restore').attr("action","{{ route('order_delete', [0]) }}");

        })
    </script>

@endpush