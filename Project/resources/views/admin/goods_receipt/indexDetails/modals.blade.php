<!-- Modal create products type-->
<div class="ui mini-40 modal" id="create-goods-receipt-note-detail-modal">
    <div class="blue header">Thêm mới phiếu nhập</div>
    <div class="content">
        <form action="{{ route('goods_receipt_note_detail.store')}}" class="ui form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="goods-id" value="{{$id}}">
            <div class="field">
                <label for="material-name">Tên nguyên liệu</label>
                <input type="text" name="material" value="Bột mỳ" placeholder="Tên nguyên liệu">
                {{--<select name="material-name[]" multiple id="material-name" class="ui dropdown" required>--}}
                    {{--@foreach($nhaCungCaps as $nhaCungCap)--}}
                        {{--@if($phieuNhapParent->matchedNCC($nhaCungCap->id))--}}
                            {{--@continue--}}
                        {{--@endif--}}
                        {{--<option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten_ncc }}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}

            </div>
            <div class="fields">
                <div class="field">
                    <label for="amount">Số lượng</label>
                    <input type="text" name="amount" value="10" placeholder="Số lượng">
                </div>
                <div class="field">
                    <label for="unit">Đơn vị tính</label>
                    <select name="unit" id="unit">
                        <option value="kg" selected>Kg</option>
                        <option value="Thùng">Thùng</option>
                        <option value="Gói">Gói</option>
                        <option value="Lít">Lít</option>
                    </select>
                </div>
                <div class="field">
                    <label for="unit">&nbsp;</label>
                    <button class="ui blue tiny fluid button"><i class="sync loading icon"></i></button>
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
        <form action="{{ route('goods_receipt_note_detail.update',[$goodsReceiptDetail->id])}}" class="ui form" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="goods-id" value="{{$id}}">
            <div class="field">
                <label for="material-name">Tên nguyên liệu</label>
                <input type="text" name="material" value="{{$goodsReceiptDetail->material}}" placeholder="Tên nguyên liệu">
                {{--<select name="material-name[]" multiple id="material-name" class="ui dropdown" required>--}}
                {{--@foreach($nhaCungCaps as $nhaCungCap)--}}
                {{--@if($phieuNhapParent->matchedNCC($nhaCungCap->id))--}}
                {{--@continue--}}
                {{--@endif--}}
                {{--<option value="{{ $nhaCungCap->id }}">{{ $nhaCungCap->ten_ncc }}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}

            </div>
            <div class="fields">
                @php
                    $arr = explode(" ",$goodsReceiptDetail->value);
                @endphp
                <div class="field">
                    <label for="amount">Số lượng</label>
                    <input type="text" name="amount" value="{{$arr[0]}}" placeholder="Số lượng">
                </div>
                <div class="field">
                    <label for="unit">Đơn vị tính</label>
                    <select name="unit" id="unit">
                        <option value="kg" selected>Kg</option>
                        <option value="Thùng">Thùng</option>
                        <option value="Gói">Gói</option>
                        <option value="Lít">Lít</option>
                    </select>
                </div>
                <div class="field">
                    <label for="unit">&nbsp;</label>
                    <button class="ui blue tiny fluid button"><i class="sync loading icon"></i></button>
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
