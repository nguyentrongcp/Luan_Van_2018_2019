<!-- Modal create goods receipt note detail-->
<div class="ui mini-40 modal" id="create-goods-receipt-note-detail-modal">
    <div class="blue header">Thêm mới nguyên liệu</div>
    <div class="content">
        <form action="{{ route('goods_receipt_note_detail.store')}}" class="ui form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="goods-id" value="{{$id}}">
            <div class="field">
                <label for="material-name">Tên nguyên liệu</label>
                <div class="ui right labeled input">
                    <input type="text" name="material" id="material" placeholder="Nguyên liệu khác">
                    <select class="ui dropdown label" name="available-material" id="available-material">
                        <option value="">Chọn nguyên liệu</option>
                        @foreach(\App\Material::all() as $material)
                            <option class="item" value="{{$material->id}}">
                                {{$material->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
                <label for="amount">Số lượng</label>
                <div class="ui right labeled input">
                    <input type="number" name="quantity" id="quantity" placeholder="Số lượng">
                    <select class="ui dropdown label" name="unit" id="unit">
                        <option value="">Chọn đơn vị tính</option>
                        @foreach(\App\CalculationUnit::all() as $unit)
                            <option class="item" value="{{$unit->id}}">
                                {{$unit->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
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

<!-- Modal edit products type-->
@foreach($goodsReceiptDetails as $goodsReceiptDetail)
    <div class="ui mini-40 modal" id="update-goods-receipt-note-detail-modal-{{$goodsReceiptDetail->id}}">
        <div class="blue header">Thêm mới phiếu nhập</div>
        <div class="content">
            <form action="{{ route('goods_receipt_note_detail.update',[$goodsReceiptDetail->id])}}" class="ui form"
                  method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="hidden" name="goods-id" value="{{$id}}">
                <div class="field">
                    <label for="material-name">Tên nguyên liệu</label>
                    <div class="ui right labeled input">
                        <input type="text" name="material" id="material" placeholder="Nguyên liệu khác"
                        value="{{$goodsReceiptDetail->material}}">
                        <select class="ui dropdown label" name="available-material" id="available-material">
                            <option value="">Chọn nguyên liệu</option>
                            @foreach(\App\Material::all() as $material)
                                <option class="item" value="{{$material->name}}">
                                    {{$material->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="amount">Số lượng</label>
                    <div class="ui right labeled input">
                        <input type="number" name="quantity" id="quantity" placeholder="Số lượng"
                        value="{{$goodsReceiptDetail->quantity}}">
                        <select class="ui dropdown label" name="unit" id="unit">
                            <option value="">Chọn đơn vị tính</option>
                            @php
                                $name_unit = \App\CalculationUnit::find($goodsReceiptDetail->unit_id)->name;
                            @endphp
                            @foreach(\App\CalculationUnit::all() as $unit)
                                <option class="item" value="{{$unit->id}}" {{$name_unit==$unit->name ? 'selected':''}}>
                                    {{$unit->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="field">
                    <label for="cost">Đơn giá</label>
                    <input type="number" name="cost" value="{{$goodsReceiptDetail->cost}}">
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
<!--End modal-->
