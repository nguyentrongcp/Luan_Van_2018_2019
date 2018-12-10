<!-- Modal create goods receipt note detail-->
<div class="ui mini-40 modal" id="create-goods-receipt-note-detail-modal">
    <div class="blue header">Thêm nguyên liệu vào phiếu nhập</div>
    <div class="scrolling content">
        <form action="{{ route('goods_receipt_note_detail.store')}}" class="ui form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="goods-id" value="{{$id}}">
            <div class="field">
                <label for="material-name">Tên nguyên liệu</label>
                <select class="ui search dropdown material-name" id="dropdown-material" name="material">
                    @foreach(\App\Material::all() as $material)
                        @if($material->goodsNoteReceiptMaterials()->where('goods_receipt_note_id', $id)->count() > 0)
                            @continue
                        @endif
                        <option class="item" value="{{$material->id}}">
                            {{$material->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="amount">Số lượng</label>
                <input type="number" step="any" name="quantity" placeholder="Số lượng" min="0">
            </div>
            <div class="field">
                <label>Đơn vị tính</label>
                <select class="ui dropdown" readonly="" name="unit" id="dropdown-unit">
                    @foreach(\App\CalculationUnit::all() as $unit)
                        <option class="item" value="{{$unit->id}}">
                            {{$unit->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="cost">Đơn giá</label>
                <input type="number" name="cost" value="100000">
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@push('script')
    <script>
        getUnit($('#dropdown-material').val());

        $('#dropdown-material').change(function () {
            let id = $(this).val();
            getUnit(id);
        });

        function getUnit(id) {
            $.ajax({
                type: 'get',
                url: '{{ route('goods.get.unit') }}',
                data: {
                    id: id
                },
                success: function (data) {
                    if (data.status === 'exist') {
                        $('#dropdown-unit').val(data.value).change();
                        $($('#dropdown-unit').parent().get(0)).addClass('disabled');
                    }
                    else {
                        $($('#dropdown-unit').parent().get(0)).removeClass('disabled');
                    }
                }
            });
        }
    </script>
@endpush

<!-- Modal edit products type-->
{{--@foreach($goodsReceiptDetails as $goodsReceiptDetail)--}}
    {{--<div class="ui mini-40 modal" id="update-goods-receipt-note-detail-modal-{{$goodsReceiptDetail->id}}">--}}
        {{--<div class="blue header">Thêm mới phiếu nhập</div>--}}
        {{--<div class="scrolling content">--}}
            {{--<form action="{{ route('goods_receipt_note_detail.update',[$goodsReceiptDetail->id])}}" class="ui form"--}}
                  {{--method="post">--}}
                {{--{{ csrf_field() }}--}}
                {{--{{ method_field('PUT') }}--}}
                {{--<input type="hidden" name="goods-id" value="{{$id}}">--}}
                {{--<div class="field">--}}
                    {{--<label for="material-name">Tên nguyên liệu</label>--}}
                    {{--<select class="ui search dropdown material-name" name="material">--}}
                        {{--<option value="{{$goodsReceiptDetail->material}}">{{$goodsReceiptDetail->material}}</option>--}}
                        {{--@foreach(\App\Material::all() as $material)--}}
                            {{--@if($goodsReceiptDetail->material == $material->name)--}}
                                {{--@continue--}}
                            {{--@endif--}}
                            {{--<option class="item" value="{{$material->name}}">--}}
                                {{--{{$material->name}}--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="field">--}}
                    {{--<label for="amount">Số lượng</label>--}}
                    {{--<input type="number" name="quantity" placeholder="Số lượng" min="0" autofocus--}}
                           {{--value="{{$goodsReceiptDetail->quantity}}">--}}
                {{--</div>--}}
                {{--<div class="field">--}}
                    {{--<label>Đơn vị tính</label>--}}
                    {{--<select class="ui dropdown material-name" name="unit">--}}
                        {{--<option value="">Chọn đơn vị tính</option>--}}
                        {{--@php--}}
                            {{--$name_unit = \App\CalculationUnit::find($goodsReceiptDetail->unit_id)->name;--}}
                        {{--@endphp--}}
                        {{--@foreach(\App\CalculationUnit::all() as $unit)--}}
                            {{--<option class="item" value="{{$unit->id}}" {{$name_unit==$unit->name ? 'selected':''}}>--}}
                                {{--{{$unit->name}}--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="field">--}}
                    {{--<label for="cost">Đơn giá</label>--}}
                    {{--<input type="number" name="cost" value="{{$goodsReceiptDetail->cost}}">--}}
                {{--</div>--}}
                {{--<div class="field">--}}
                    {{--<button class="ui blue fluid button"><strong>Lưu</strong></button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endforeach--}}
<!--End modal-->
