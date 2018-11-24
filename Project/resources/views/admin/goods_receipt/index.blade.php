@extends('admin.layouts.master')

@section('title', 'Quản lý loại thực đơn')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <div class="fields">
                <a href="{{ route('goods_receipt_note.index') }}" class="need-popup a-decoration" data-content="Danh sách phiếu nhập">
                    <i class="blue small angle double left circular fitted icon"></i></a>
                Nguyên liệu cần nhập hàng
            </div>
        </h3>
        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')
        <form action="{{route('goods_receipt_note_detail.destroy',[0])}}" method="post" class="ui form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <div class="field">
                <button class="ui small red delete button need-popup"
                        data-content="Xóa các mục vừa chọn"
                        onclick="return confirmDelete()">
                    <i class="delete fitted icon"></i>
                    <strong>Xóa </strong>
                </button>
            </div>
            <table class="ui table very compact striped celled selectable" id="form-goods-receipt-notes">
                <thead>
                <tr>
                    <th class="collapsing">
                        <div class="ui checkbox" id="select-all">
                            <input type="checkbox" class="hidden">
                        </div>
                    </th>
                    <th class="collapsing">STT</th>
                    <th>Tên nguyên liệu</th>
                    <th class="text-center">Số lượng</th>
                </tr>
                </thead>
                <tbody>

                @foreach($materials as $stt => $material)
                    <tr>
                        <td class="collapsing">
                            <div class="ui child checkbox">
                                <input type="checkbox" class="hidden" name="goods-receipt-note-detail-id[]"
                                       value="{{ $material->id }}">
                            </div>
                        </td>
                        <td>{{ $stt + 1 }}</td>
                        <td>{{ $material->name }}</td>
                        @php
                            $name_unit = \App\CalculationUnit::find($material->calculation_unit_id)->unit;
                        @endphp
                        <td class="text-center">{{ $material->value .' '.$name_unit}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if (method_exists($materials, 'render'))
                <div class="ui basic segment center aligned no-padding">
                    {{ $materials->render('admin.layouts.components.pagination.smui')}}
                </div>
            @endif
        </form>
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('check-all');
    </script>
@endpush
