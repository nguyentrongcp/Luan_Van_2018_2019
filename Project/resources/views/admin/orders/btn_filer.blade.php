<div class="ui floating green labeled icon dropdown button">
    <i class="filter icon"></i>
    <span class="text">Bộ lọc</span>
    <div class="menu">
        <form action="{{route('foody_filter')}}" method="post">
            {{csrf_field()}}
            <div class="header">
                Chọn tình trạng đơn hàng
            </div>
            <a class="item a-decoration" href="{{route('orders.index')}}">
                <div class="ui default empty circular"></div>
                Tất cả
            </a>
            <a class="item a-decoration" href="{{route('orders_filter',[0])}}">
                <div class="ui default empty circular "></div>
                <i class="warning open fitted orange icon"></i>
                <span style="color: orange">
                                <b>Chưa duyệt</b>
                            </span>
            </a>
            <a class="item a-decoration" href="{{route('orders_filter',[1])}}">
                <div class="ui default empty circular radio"></div>
                <i class="wait teal open fitted icon"></i>
                <span style="color: teal">
                                <b>Đang vận chuyển</b>
                            </span>
            </a>
            <a class="item a-decoration" href="{{route('orders_filter',[2])}}">
                <div class="ui default empty circular radio"></div>
                <i class="check green open fitted icon"></i>
                <span style="color: green">
                                <b>Đã giao hàng</b>
                            </span>
            </a>
            <a class="item a-decoration" href="{{route('orders_filter',[3])}}">
                <div class="ui default empty circular radio"></div>
                <i class="delete red open fitted icon"></i>
                <span style="color: red">
                                <b>Đã hủy</b>
                            </span>
            </a>
        </form>

    </div>
</div>