@extends('admin.layouts.master')

@section('title', 'Phục hồi - ẩm thực')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Ẩm thực</span>
    </h2>

    <form action="{{ route('foody_restore.store', [0]) }}" method="post">
        {{ csrf_field() }}

        <button class="ui blue button" data-tooltip="Phục hồi đã chọn" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')">
            <i class="undo fitted icon"></i>
        </button>

        @include('admin.restore.foodies.table')
    </form>
@endsection