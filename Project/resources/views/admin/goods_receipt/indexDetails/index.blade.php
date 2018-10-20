
@extends('admin.layouts.master')

@section('title','Chi tiết phiếu nhập')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <div class="fields">
                <a href="{{ route('goods_receipt_note.index') }}" class="need-popup" data-content="Danh sách phiếu nhập">
                    <i class="blue small angle double left circular fitted icon"></i></a>
                Phiếu nhập ngày {{$date}} - {{$name}}
                <label class="ui text-success float-right" for="total">Tổng tiền: {{number_format($totalCost).' đ'}} </label>
            </div>
        </h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('goods_receipt_note_detail.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>
            <button type="button" class="ui small blue button" onclick="$('#create-goods-receipt-note-detail-modal').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </button>

            @include('admin.goods_receipt.indexDetails.table')
        </form>

        @include('admin.goods_receipt.indexDetails.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-phieu-nhap');

        // bindDataTable('bang-nha-cung-cap');
    </script>
@endpush