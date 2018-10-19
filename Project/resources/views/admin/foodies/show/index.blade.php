@extends('admin.layouts.master')

@section('title', 'Quản lý thực đơn')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header center aligned">QUẢN LÝ THỰC ĐƠN</h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.error_msg')
        <form action="{{route('foodies.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
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
            </div>

            @include('admin.foodies.show.table')

        </form>

        {{--        @include('admin.foodyTypes.modals')--}}
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('check-all');

        // bindDataTable('bang-loai-sp');
    </script>
@endpush
