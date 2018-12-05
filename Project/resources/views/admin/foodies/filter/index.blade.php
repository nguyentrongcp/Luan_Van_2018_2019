@extends('admin.layouts.master')

@section('title', 'Quản lý thực đơn')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ ẨM THỰC</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        <form action="{{route('foodies.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="ui padded grid">
                <div class="ten wide column">
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
                    @if(!empty($foodyType_filter))
                        <div class="ui blue label need-popup" style="padding: 12px;">
                            <span>{{ $nameType_filter }} </span> - Tất cả &nbsp;&nbsp;
                            <a class="a-decoration" href="{{ route('foodies.index') }}"><i
                                        class="delete fitted icon"></i></a>
                        </div>
                    @endif
                </div>
                <div class="six wide column">
                    @include('admin.foodies.name_searching')
                </div>
            </div>
            @include('admin.foodies.filter.table')

        </form>
    </div>
@endsection

