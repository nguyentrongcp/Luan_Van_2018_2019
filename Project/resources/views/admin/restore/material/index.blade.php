@extends('admin.layouts.master')

@section('title', 'Phục hồi - nguyên liệu')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Nguyên liệu</span>
    </h2>

    <form action="{{ route('material_restore.store', [0]) }}" method="post">
        {{ csrf_field() }}

        <button class="ui blue button" data-tooltip="Phục hồi đã chọn" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')">
            <i class="undo fitted icon"></i>
        </button>

        @include('admin.restore.material.table')
    </form>
@endsection