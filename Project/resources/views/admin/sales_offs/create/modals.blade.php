<!-- Modal add sales offs-->
<div class="ui mini-50 vertical flip modal" id="create-sales-offs-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới khuyến mãi</div>
    <div class="content">
        <form action="{{ route('create_sales.store') }}" class="ui form" method="post" onsubmit="return checkDate(this)">

            {{ csrf_field() }}
            <input type="hidden" value="{{$id}}" name="id-sales">
            <div class="field">
                <label for="percent">Phần trăm giảm</label>
                <select name="percent[]" class="ui search dropdown sale-percent multiple">
                    @for($i=5; $i<=95; $i+=5)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>
<!--End modal-->

<!-- Modal edit sales offs-->
@foreach($salesOffs as $salesOff)
    <div class="ui mini-50 vertical flip modal" id="{{ "update-sales-offs-modal-" . $salesOff->id }}">
        <i class="close icon"></i>
        <div class="blue header">Cập nhật khuyến mãi</div>
        <div class="content">
            <form action="{{ route('sales_offs.update', [$salesOff->id]) }}" class="ui form" method="post" onsubmit="return checkDate(this)">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="sales-offs-name">Tên khuyến mãi</label>
                    <input type="text" id="sales_offs_name" name="sales-offs-name" value="{{$salesOff->name}}" required>
                </div>
                <div class="field">
                    <label for="percent">Phần trăm giảm</label>
                    <input type="number" id="percent" name="percent" value="{{$salesOff->percent}}" required>
                </div>
                <div class="field">
                    <label for="percent">Ngày bắt đầu</label>
                    <input type="date" id="start_date" name="start-date" value="{{$salesOff->start_date}}" required>
                </div>
                <div class="field">
                    <label for="percent">Ngày kết thúc</label>
                    <input type="date" id="end_date" name="end-date" value="{{$salesOff->end_date}}" required>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
<!--  End Modal -->





