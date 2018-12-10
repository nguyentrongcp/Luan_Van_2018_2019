@extends('admin.layouts.master')

@section('title', 'Quản lý phân quyền')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ PHÂN QUYỀN</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        <form action="{{route('role.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                <a class="ui small blue button" onclick="$('#create-role-modal').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </a>
            </div>

            @include('admin.employees.role.table')

        </form>

        @include('admin.employees.role.modal')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('role-id[]');
    </script>
@endpush
