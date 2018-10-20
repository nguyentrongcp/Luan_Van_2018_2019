@extends('admin.layouts.master')

@section('title', 'Chi tiết sản phẩm ')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('foodies.index') }}" class="need-popup a-decoration" data-content="Danh sách thực đơn">
                <i class="blue small angle double left circular fitted icon"></i></a>
            {{ $nameFoody }}
            <a href="{{ route('foodies.edit', [$foodies->id]) }}" class="ui blue label a-decoration">
                <i class="edit fitted icon"></i> Cập nhật
            </a>
        </h3>

        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Thông tin</a>
            <a class="item" data-tab="second">Mô tả sản phẩm</a>
            <a class="item" data-tab="third">Bình luận</a>
        </div>


        @include('admin.foodies.show.tab_information')

        @include('admin.foodies.show.tab_describe')

{{--        @include('admin.san_pham.show.tab_comments')--}}


    </div>
@endsection