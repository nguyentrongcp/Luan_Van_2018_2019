<table class="ui table very compact striped celled selectable" id="form-goods-receipt-note-detail">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="select-all">
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing center aligned">STT</th>
        <th>Tên nguyên liệu</th>
        <th class="text-center">Số lượng</th>
        <th class="right aligned">Đơn giá</th>
        <th class="right aligned">Tổng tiền</th>
        <th class="collapsing">Sửa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($goodsReceiptDetails as $stt => $goodsReceiptDetail)
        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="goods-receipt-note-detail-id[]"
                           value="{{ $goodsReceiptDetail->id }}">
                </div>
            </td>
            <td class="center aligned">{{ $stt + 1 }}</td>
            <td>{{$goodsReceiptDetail->material}}</td>
            @php
                $unit = \App\CalculationUnit::find($goodsReceiptDetail->unit_id)->unit;
            @endphp
            <td class="center aligned">{{$goodsReceiptDetail->quantity . ' '. $unit}}</td>
            <td class="right aligned">{{number_format($goodsReceiptDetail->cost).' đ'}}</td>
            <td class="right aligned">
                {{number_format($goodsReceiptDetail->total_cost).' đ'}}
            </td>
            <td>
                <a href="#" onclick="$( '{{ '#update-goods-receipt-note-detail-modal-'.$goodsReceiptDetail->id }}' ).modal('show')"
                   class="ui small green label a-decoration">
                    <i class="edit fitted icon"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($goodsReceiptDetails, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $goodsReceiptDetails->render('admin.layouts.components.pagination.smui')}}
    </div>
@endif

@push('script')
    <script>
        bindSelectAll('goods-receipt-note-detail-id[]');
    </script>
@endpush