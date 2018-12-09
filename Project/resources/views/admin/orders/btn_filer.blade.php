
<div class="ui floating green labeled icon dropdown filter button">
    <form id="form-filter" action="{{ route('orders.index') }}" method="get">
        <input id="key-filter" type="hidden" name="filter">
    </form>
    <i class="filter icon"></i>
    <span class="text">Chọn tình trạng đơn hàng</span>
    <div class="menu">
        <div class="header">
            Chọn tình trạng đơn hàng
        </div>
        <div class="item" style="color: orange" data-value="chua-duyet">
            <i class="warning icon"></i>
            Chưa duyệt
        </div>
        <div class="item" style="color: teal" data-value="dang-van-chuyen">
            <i class="shipping fast icon"></i>
            Đang vận chuyển
        </div>
        <div class="item" style="color: green" data-value="da-giao-hang">
            <i class="check icon"></i>
            Đã giao hàng
        </div>
    </div>
</div>