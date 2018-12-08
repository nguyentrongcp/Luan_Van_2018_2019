@extends('admin.layouts.master')

@section('title', 'Phục hồi - loại ẩm thực')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Loại ẩm thực</span>
    </h2>

    <form action="{{ route('foody_type_restore.store', [0]) }}" method="post">
        {{ csrf_field() }}

        <button class="ui blue button" data-tooltip="Phục hồi đã chọn" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')">
            <i class="undo fitted icon"></i>
        </button>

        @include('admin.restore.foodyType.table')
    </form>
@endsection