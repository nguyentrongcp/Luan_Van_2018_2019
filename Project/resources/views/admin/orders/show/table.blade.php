<h4 class="ui dividing blue header">Thông tin</h4>
<form action="" class="ui form static">
    <div class="ui two column padded divided grid">
        <div class="column">
            <div class="inline field">
                <label class="label-fixed">Mã đơn hàng:</label>
                <div class="static-input">{{$orders->order_code}}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Họ và tên:</label>
                <div class="static-input">{{ $orders->receiver }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Số điện thoại:</label>
                <div class="static-input">{{ $orders->phone }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Email:</label>
                <div class="static-input">{{ $orders->email }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Địa chỉ nhận hàng:</label>
                <div class="static-input">{{ $orders->address }}</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Ngày đặt hàng:</label>
                <div class="static-input">{{ $orders->order_created_at }}</div>
            </div>
        </div>

        <div class=" column">
            <div class="inline field">
                <label class="label-fixed">Hình thức thanh toán:</label>
                <div class="static-input">
                    {{ $orders->paymentType() }}
                </div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Tổng tiền:</label>
                <div class="static-input">{{ number_format($orders->total_of_cost) }} đ</div>
            </div>

            <div class="inline field">
                <label class="label-fixed">Phí vận chuyển:</label>
                <div class="static-input">{{ $orders->transport_fee }}</div>
            </div>

            @if($orders->approved())
                <div class="inline field">
                    <label class="label-fixed">Tình trạng giao hàng:</label>
                    <div class="static-input">
                        @if($orders->getStatus() == 1)
                            <i class="wait teal open fitted icon"></i>
                            <span style="color: teal">
                                <b>Đang vận chuyển</b>
                            </span>
                        @else
                            <i class="check green open fitted icon"></i>
                            <span style="color: green">
                                <b>Đã giao hàng</b>
                            </span>
                        @endif
                        <a class="ui small blue label need-popup a-decoration" href="{{ route('orders.edit', [$orders->id]) }}"
                        data-content="Thay đổi trạng thái giao hàng"
                        onclick="return confirm('Xác nhận cập nhật trạng thái giao hàng?')">
                        Cập nhật
                        </a>
                    </div>
                </div>
            @endif

            @if($orders->approved())
            <div class="inline field">
            <label class="label-fixed">Người duyệt đơn:</label>
            <div class="static-input">{{ \App\Admin::find($orders->getIdAdmin())->name }}</div>
            </div>
            @endif
        </div>
    </div>
</form>
<h4 class="ui dividing blue header">Thực đơn</h4>
<table class="ui table striped celled">
    <thead>
    <tr>
        <th class="collapsing">STT</th>
        <th>Tên thực đơn</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Tổng giá</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orderFoodys as $stt => $orderFoody)

        <tr>
            <td>{{ $stt + 1 }}</td>
            <td><a class="a-decoration" href="{{route('foodies.show',[$orderFoody->foody_id])}}">
                    {{App\Foody::find($orderFoody->foody_id)->name}}</a>
            </td>
            <td>{{$orderFoody->amount}}</td>
            <td>{{ number_format($orderFoody->cost).' đ'}}</td>
            <td>{{ number_format($orderFoody->total_of_cost).' đ' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($orderFoodys, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $orderFoodys->render('vendor.pagination.smui')}}
    </div>
@endif