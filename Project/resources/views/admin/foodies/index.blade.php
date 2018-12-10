@extends('admin.layouts.master')

@section('title', 'Quản lý ẩm thực')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ MÓN ĂN</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        <form action="{{route('foodies.destroy',[0])}}" method="post" class="ui form">

            <div class="ui padded grid">
                <div class="eleven wide column">
                    <button class="ui small red delete button need-popup"
                            data-content="Xóa các mục vừa chọn"
                            onclick="return confirmDelete()">
                        <i class="delete fitted icon"></i>
                        <strong>Xóa </strong>
                    </button>

                    <a class="ui small blue button" href="{{route('foodies.create')}}">
                        <i class="add fitted icon"></i>
                        <strong>Thêm mới </strong>
                    </a>
{{--                    @include('admin.foodies.btn_filer')--}}
                </div>
                <div class="five wide column">
                    @include('admin.foodies.name_searching')
                </div>
            </div>
            @include('admin.foodies.table')

        </form>
    </div>
@endsection


