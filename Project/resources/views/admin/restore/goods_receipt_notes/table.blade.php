<table class="ui table very compact striped celled selectable" id="form-goods-receipt-notes">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="select-all">
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Người nhập hàng</th>
        <th class="text-center">Ngày nhập</th>
        <th class="text-center">Số hàng nhập</th>
    </tr>
    </thead>
    <tbody>
    @foreach($goodsReceipts as $stt => $goods)
        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="goods-receipt-ids[]" value="{{ $goods->id }}">
                </div>
            </td>

            <td>{{ $stt + 1 }}</td>
            <td>{{ $goods->name }}</td>
            <td class="text-center">{{ $goods->date }}</td>
            <td class="text-center">
                {{ $goods->soMaterial() }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($goodsReceipts, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $goodsReceipts->render('admin.layouts.components.pagination.smui')}}
    </div>
@endif

@push('script')
    <script>
        bindSelectAll('goods-receipt-id[]');
    </script>
@endpush