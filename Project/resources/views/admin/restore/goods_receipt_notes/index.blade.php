@extends('admin.layouts.master')

@section('title', 'Phục hồi - phiếu nhập hàng')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Phiếu nhập hàng</span>
    </h2>

    <form action="{{ route('foody_type_restore.store', [0]) }}" method="post">
        {{ csrf_field() }}

        <button class="ui blue button" data-tooltip="Phục hồi đã chọn" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')">
            <i class="undo fitted icon"></i>
        </button>

        @include('admin.restore.goods_receipt_notes.table')
    </form>
@endsection