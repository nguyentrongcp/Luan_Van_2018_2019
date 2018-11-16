<div class="ui mini modal" id="create-good-receipt-note-modal">
    <div class="blue header">Thêm mới phiếu nhập</div>
    <div class="content">
        <form action="{{ route('goods_receipt_note.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="dia-chi">Ngày nhập</label>
                <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}"
                       max="{{ date('Y-m-d') }}" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($goodsReceipts as $goodsReceipt)
    <div class="ui mini vertical flip modal" id="{{ "update-modal-" . $goodsReceipt->id }}">
        <div class="blue header">Sửa phiếu nhập</div>
        <div class="content">
            <form action="{{ route('goods_receipt_note.update', [$goodsReceipt->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="field">
                    <label for="dia-chi">Ngày nhập</label>
                    <input type="date" id="date" name="date"
                           value="{{ $goodsReceipt->date }}" max="{{ date('Y-m-d') }}" required>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach