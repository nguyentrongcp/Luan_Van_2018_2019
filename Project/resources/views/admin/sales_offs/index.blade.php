@extends('admin.layouts.master')

@section('title', 'Quản lý khuyến mãi')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ KHUYẾN MÃI</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
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
                <button type="button" class="ui small blue button" onclick="$('#create-sales-offs-modal').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </button>
            </div>

            @include('admin.sales_offs.table')

        </form>

        @include('admin.sales_offs.modals')
    </div>
@endsection


