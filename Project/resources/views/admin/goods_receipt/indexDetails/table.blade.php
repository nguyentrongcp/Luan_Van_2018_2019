<table class="ui table very compact striped celled selectable" id="form-goods-receipt-note-detail">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="check-all">
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên nguyên liệu</th>
        <th class="text-center">Số lượng</th>
        <th class="text-center">Đơn giá</th>
        <th class="text-center">Tổng tiền</th>
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
            <td>{{ $stt + 1 }}</td>
            <td>{{$goodsReceiptDetail->material}}</td>
            <td class="text-center">{{$goodsReceiptDetail->value}}</td>
            <td class="text-center">{{number_format($goodsReceiptDetail->cost).' đ'}}</td>
            <td class="text-center">
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
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush