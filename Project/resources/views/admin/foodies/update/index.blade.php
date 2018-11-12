@extends('admin.layouts.master')

@section('title', 'Sửa sản phẩm ')

@section('content')

    @include('admin.layouts.components.errors_msg')
    @include('admin.layouts.components.success_msg')

    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('foodies.index') }}" class="need-popup a-decoration" data-content="Danh sách thực đơn">
                <i class="small angle double left circular fitted icon"></i></a>
            <a href="{{ route('foodies.show', [$foodies->id]) }}"  class="need-popup a-decoration" data-content="Chi tiết">
                <i class="small angle left circular fitted icon"></i></a>
            Cập nhật: {{ $nameFoody }}
        </h3>
        <form action="{{ route('foodies.update', [$foodies->id]) }}" method="post" enctype="multipart/form-data"
              class="ui form static" id="form-thong-tin-san-pham">

            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Thông tin</a>
                <a class="item" data-tab="second">Mô tả sản phẩm</a>
                {{--            <a class="item" data-tab="second">Ảnh chi tiết ({{ $sanPham->hinhAnhs->count() }})</a>--}}
            </div>
            @include('admin.foodies.update.tab_information')

            @include('admin.foodies.update.tab_describe')
        </form>

    </div>
@endsection