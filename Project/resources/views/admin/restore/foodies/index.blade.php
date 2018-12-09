@extends('admin.layouts.master')

@section('title', 'Phục hồi - ẩm thực')

@section('content')
    <h2 class="ui dividing header">Phục hồi >>
        <span class="header-2">Ẩm thực</span>
    </h2>

    <form method="post" id="form-foody-restore">
        {{ csrf_field() }}

        <button class="ui blue button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận phục hồi?')" id="btn-restore">
            <i class="undo fitted icon" ></i>
        </button>
        <button class="ui red button" type="submit" data-position="right center"
                onclick="return confirm('Xác nhận xóa?')" id="btn-delete">
            <i class="remove fitted icon" ></i>
        </button>

        @include('admin.restore.foodies.table')
    </form>
@endsection

@push('script')
    <script>
        bindSelectAll('foody-ids[]');
        $('#btn-restore').on('click',function () {
            $('#form-foody-restore').attr("action","{{ route('foody_restore.store', [0]) }}");
        });
        $('#btn-delete').on('click',function () {
            $('#form-foody-restore').attr("action","{{ route('foody_delete', [0]) }}");
        })
    </script>

@endpush