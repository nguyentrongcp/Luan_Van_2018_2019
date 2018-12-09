@extends('admin.layouts.master')

@section('title', 'Quản lý loại ẩm thực')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ LOẠI ẨM THỰC</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        <form action="{{route('foody_type.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                <button type="button" class="ui small blue button" onclick="$('#create-foody-type-modal').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </button>
            </div>

            @include('admin.foodyTypes.table')

        </form>

        @include('admin.foodyTypes.modals')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('foody-type-id[]');
    </script>
@endpush
