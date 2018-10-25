@extends('admin.layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('sales_offs.index') }}" class="need-popup a-decoration" data-content="Danh sách khuyến mãi">
                <i class="blue small angle double left circular fitted icon"></i></a>
            {{ \App\SalesOff::find($id)->name }}
        </h3>
        <form action="{{route('sales_offs.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                <button type="button" class="ui small blue button" onclick="$('#create-foodies-sales-offs-modal').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </button>
            </div>

            @include('admin.sales_offs.show.table')
        </form>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.error_msg')
        @include('admin.sales_offs.show.modals')
    </div>
@endsection