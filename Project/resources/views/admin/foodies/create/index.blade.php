@extends('admin.layouts.master')

@section('title', 'Thêm thực đơn ')

@section('content')
    @include('admin.layouts.components.errors_msg')
    @include('admin.layouts.components.success_msg')

    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('foodies.index') }}" class="need-popup a-decoration" data-content="Danh sách thực đơn">
                <i class="small angle double left circular fitted icon"></i></a>
            Thêm mới
        </h3>

        <form action="{{ route('foodies.store') }}" method="post" enctype="multipart/form-data"
              class="ui form static" id="create-foody-form">

            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Thông tin</a>
                <a class="item" data-tab="second">Mô tả ẩm thực</a>
            </div>
            @include('admin.foodies.create.tab_information')
            @include('admin.foodies.create.tab_describe')


        </form>
    </div>
@endsection