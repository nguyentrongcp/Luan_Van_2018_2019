@extends('admin.layouts.master')

@section('title', 'Phục hồi - phiếu nhập hàng')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Phiếu nhập hàng</span>
    </h2>

    <form  method="post" id="form-goods-restore">
        {{ csrf_field() }}

        <button class="ui blue button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận phục hồi?')" id="btn-restore">
            <i class="undo fitted icon" ></i>
        </button>
        <button class="ui red button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')" id="btn-delete">
            <i class="remove fitted icon" ></i>
        </button>

        @include('admin.restore.goods_receipt_notes.table')
    </form>
@endsection

@push('script')
    <script>
        bindSelectAll('goods-receipt-ids[]');
        $('#btn-restore').on('click',function () {
            $('#form-goods-restore').attr("action","{{ route('goods_receipt_note.store', [0]) }}");
        });
        $('#btn-delete').on('click',function () {
            $('#form-goods-restore').attr("action","{{ route('goods_receipt_note_delete', [0]) }}");
        })
    </script>

@endpush