@extends('admin.layouts.master')

@section('title', 'Quản lý khuyến mãi')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
        <a href="{{ route('sales_offs.index') }}" class="need-popup a-decoration" data-content="Danh sách khuyến mãi">
            <i class="blue small angle double left circular fitted icon"></i></a>
        {{ \App\SalesOff::find($id)->name .'>>'}}
        </h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.error_msg')
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

            @include('admin.sales_offs.create.table')

        </form>

        @include('admin.sales_offs.create.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('check-all');
    </script>
@endpush
