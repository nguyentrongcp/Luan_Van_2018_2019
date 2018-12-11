@extends('admin.layouts.master')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('sales_offs.index') }}" class="need-popup a-decoration" data-content="Danh sách khuyến mãi">
                <i class="blue small angle double left circular fitted icon"></i></a>
            {{ \App\SalesOff::find($id)->salesOff->name .' >> '.\App\SalesOff::find($id)->percent.'%'}}
        </h3>
        <form id="sales-foody" action="{{route('sales_offs_details.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
                <button id="sales-edit" type="button" class="ui small blue button" onclick="$('#create-foodies-sales-offs-modal').modal('show')">
                    <i class="add fitted icon"></i>
                    <strong>Thêm </strong>
                </button>
            </div>

            @include('admin.sales_offs.show.table')
        </form>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        @include('admin.sales_offs.show.modals')
    </div>

    {{--@push('script')--}}
        {{--<script>--}}
            {{--$('#sales-edit').on('click', function () {--}}
                {{--$('#sales-table').addClass('hidden');--}}
                {{--$('#sales-body').append("" +--}}
                    {{--"<table class='ui table very compact striped celled selectable unstackable'>" +--}}
                    {{--"<thead>" +--}}
                    {{--"<tr>" +--}}
                    {{--"<th class='center aligned collapsing'>STT</th>" +--}}
                    {{--"<th>Tên món ăn</th>" +--}}
                    {{--"<th>Loại món ăn</th>" +--}}
                    {{--"<th class='center aligned collapsing'>Xóa</th>" +--}}
                    {{--"</tr>" +--}}
                    {{--"</thead>" +--}}
                    {{--"<tbody id='table-body'>" +--}}
                    {{--"<tr>" +--}}
                    {{--"<td class='center aligned'>1</td>" +--}}
                    {{--"<td></td>" +--}}
                    {{--"<td></td>" +--}}
                    {{--"<td class='center aligned'><a class='ui small red label'><i class='remove fitted icon'></i></a></td>" +--}}
                    {{--"</tr>" +--}}
                    {{--"</tbody>" +--}}
                    {{--"</table>")--}}
            {{--});--}}
        {{--</script>--}}
    {{--@endpush--}}

    @push('script')
        <script>
            bindSelectAll('sales-offs-details-id[]');
        </script>
    @endpush
@endsection