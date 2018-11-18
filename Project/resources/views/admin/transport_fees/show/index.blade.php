@extends('admin.layouts.master')

@section('title', 'Slide quảng cáo')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui dividing header">
            <a href="{{ route('transport_fees.index') }}" class="need-popup a-decoration" data-content="Danh sách nhân viên">
                <i class="blue small angle double left circular fitted icon"></i></a>
            Chi tiết phí vận chuyển trong nội ô quận "{{ $nameDistrict }}"
        </h3>
        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.errors_msg')

        <div id="dropzone-message" class="normal-td-margin"></div>

        <form action="{{ route('transport_fees.destroy', [0]) }}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button type="submit" class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                <a href="#" class="ui small blue button" onclick="$('#add-transport-fees-modal').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm mới </strong>
                </a>
            </div>
            @include('admin.transport_fees.show.table')

        </form>
        @include('admin.transport_fees.show.modal')
    </div>
@endsection

@push('script')
    <script>
        // bindSelectAll('slider-id[]');
    </script>
@endpush
