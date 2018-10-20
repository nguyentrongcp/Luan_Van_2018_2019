<table class="ui table very compact striped celled selectable" id="form-goods-receipt-notes">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="check-all">
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Người nhập hàng</th>
        <th class="text-center">Ngày nhập</th>
        <th class="text-center">Số hàng nhập</th>
        <th class="text-center">Tình trạng</th>
        <th class="collapsing">Xem</th>
        <th class="collapsing">Sửa</th>
    </tr>
    </thead>
    <tbody>
    @foreach($goodsReceipts as $stt => $goods)
        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="goods-receipt-id[]" value="{{ $goods->id }}">
                </div>
            </td>

            <td>{{ $stt + 1 }}</td>
            <td>{{ $goods->name }}</td>
            <td class="text-center">{{ $goods->date }}</td>
            <td class="text-center">
                {{ $goods->soMaterial() }}
            </td>
            <td class="text-center">
                <i class="check fitted green icon"></i>
                <span style="color: green"> Đã cập nhật vào kho</span>
            </td>
            <td>
                <a href="{{ route('admin.move_detail',[$goods->id]) }}"
                   class="ui small blue label">
                    <i class="eye open fitted icon"></i>
                </a>
            </td>
            <td>
                <a href="#" onclick="$( '{{ '#update-modal-'.$goods->id }}' ).modal('show')"
                   class="ui small green label">
                    <i class="edit fitted icon"></i>
                </a>
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
        // bindDataTable('bang-nhap-hang');
    </script>
@endpush