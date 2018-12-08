<h4 class="ui dividing blue header">Thông tin</h4>
<form action="" class="ui form static">
    <div class="ui two column padded divided grid">
        <div class="column">
            <div class="inline required field">
                <label class="label-fixed">Họ và tên:</label>
                <input type="text" name="" id=""
                       value="">
            </div>

            <div class="inline required field">
                <label class="label-fixed">Số điện thoại:</label>
                <input type="text" name="" id=""
                       value="">
            </div>

            <div class="inline field">
                <label class="label-fixed">Email:</label>
                <input type="text" name="" id=""
                       value="">
            </div>

            <div class="inline field">
                <label class="label-fixed">Địa chỉ nhận hàng:</label>
                <input type="text" name="" id=""
                       value="">
            </div>

            <div class="inline required field">
                <label class="label-fixed">Ngày đặt hàng:</label>
                <input type="text" name="" id=""
                       value="">
            </div>
        </div>

        <div class=" column">
            <div class="inline field">
                <label class="label-fixed">Hình thức thanh toán:</label>
                <input type="text" name="" id=""
                       value="">
            </div>

            <div class="inline field">
                <label class="label-fixed">Tổng tiền:</label>
                <input type="text" name="" id=""
                       value="">
            </div>

            <div class="inline field">
                <label class="label-fixed">Phí vận chuyển:</label>
                <input type="text" name="" id=""
                       value="">
            </div>

            {{--@if($orders->approved())--}}
                {{--<div class="inline field">--}}
                    {{--<label class="label-fixed">Tình trạng giao hàng:</label>--}}
                    {{--<div class="static-input">--}}
                        {{--@if($orders->getStatus() == 1)--}}
                            {{--<i class="wait teal open fitted icon"></i>--}}
                            {{--<span style="color: teal">--}}
                                {{--<b>Đang vận chuyển</b>--}}
                            {{--</span>--}}
                        {{--@else--}}
                            {{--<i class="check green open fitted icon"></i>--}}
                            {{--<span style="color: green">--}}
                                {{--<b>Đã giao hàng</b>--}}
                            {{--</span>--}}
                        {{--@endif--}}
                        {{--<a class="ui small blue label need-popup a-decoration" href="{{ route('orders.edit', [$orders->id]) }}"--}}
                           {{--data-content="Thay đổi trạng thái giao hàng"--}}
                           {{--onclick="return confirm('Xác nhận cập nhật trạng thái giao hàng?')">--}}
                            {{--Cập nhật--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--@if($orders->approved())--}}
                {{--<div class="inline field">--}}
                    {{--<label class="label-fixed">Người duyệt đơn:</label>--}}
                    {{--<div class="static-input">{{ \App\Admin::find($orders->getIdAdmin())->name }}</div>--}}
                {{--</div>--}}
            {{--@endif--}}
        </div>
    </div>
</form>
