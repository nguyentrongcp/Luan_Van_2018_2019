@extends('admin.layouts.master')

@section('title', 'Phục hồi - nhân viên')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Nhân viên</span>
    </h2>

    <form action="{{ route('employee_restore.store', [0]) }}" method="post" id="form-employee-restore">
        {{ csrf_field() }}

        <button class="ui blue button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận phục hồi?')" id="btn-restore">
            <i class="undo fitted icon" ></i>
        </button>
        <button class="ui red button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')" id="btn-delete">
            <i class="remove fitted icon" ></i>
        </button>
        @include('admin.restore.employee.table')
    </form>
@endsection

@push('script')
    <script>
        bindSelectAll('employee-ids[]');
        $('#btn-restore').on('click',function () {
            $('#form-employee-restore').attr("action","{{ route('employee_restore.store', [0]) }}");
        });
        $('#btn-delete').on('click',function () {
            $('#form-employee-restore').attr("action","{{ route('employee_delete', [0]) }}");
        })
    </script>

@endpush