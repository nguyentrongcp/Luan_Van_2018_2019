@extends('admin.layouts.master')

@section('title', 'Phí vận chuyển')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui dividing header center aligned">Quản lý chi phí vận chuyển</h3>

        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.error_msg')

        <div id="dropzone-message" class="normal-td-margin"></div>

        <form action="{{ route('sliders.destroy', [0]) }}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button type="submit" class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()"
                >
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>

                <a href="#" class="ui small blue button" onclick="$('#add-district-modal').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </a>
            </div>
            @include('admin.transport_fees.table')
        </form>
        @include('admin.transport_fees.modal')
    </div>
@endsection

@push('script')
    <script>
        // bindSelectAll('slider-id[]');
    </script>
@endpush
