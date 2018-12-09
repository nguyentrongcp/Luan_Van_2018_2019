@extends('admin.layouts.master')

@section('title', 'Phục hồi - nguyên liệu')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Nguyên liệu</span>
    </h2>

    <form  method="post" id="form-material-restore">
        {{ csrf_field() }}
        <button class="ui blue button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận phục hồi?')" id="btn-restore">
            <i class="undo fitted icon" ></i>
        </button>
        <button class="ui red button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')" id="btn-delete">
            <i class="remove fitted icon" ></i>
        </button>
        @include('admin.restore.material.table')
    </form>
@endsection

@push('script')
    <script>
        bindSelectAll('material-ids[]');
        $('#btn-restore').on('click',function () {
            $('#form-material-restore').attr("action","{{ route('material_restore.store', [0]) }}");
        });
        $('#btn-delete').on('click',function () {
            $('#form-material-restore').attr("action","{{ route('material_delete', [0]) }}");
        })
    </script>

@endpush