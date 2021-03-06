
<table class="ui table very compact striped celled selectable unstackable" id="form-orders">
        <thead>
        <tr>
            <th class="collapsing">STT</th>
            <th>Mã đơn hàng</th>
            <th>Người đặt hàng</th>
            <th class="right aligned">Số điện thoại</th>
            <th class="text-center">Ngày đặt hàng</th>
            <th class="right aligned">Tổng tiền</th>
            <th class="">Tình trạng</th>
            <th class="collapsing">Duyệt / Hủy</th>
            <th class="collapsing">Xóa</th>
        </tr>
        </thead>
        <tbody id="order-table">
        @foreach($orders as $stt => $order)
            @php
                $phone = substr($order->phone, 0, strlen($order->phone) - 6).' ';
                $phone .= substr($order->phone, strlen($order->phone) - 6, 3).' ';
                $phone .= substr($order->phone, strlen($order->phone) - 3, 3);
            @endphp
            <tr>
                <td>{{$stt + 1}}</td>
                <td>
                    <a class="a-decoration" rel="tootip" data-placement="bottom"
                       title="Đến trang chi tiết đơn hàng {{$order->order_code}}"
                       href="{{route('orders.show',[$order->id])}}">{{$order->order_code}}</a>
                </td>
                <td>
                    {{$order->receiver}}
                </td>
                <td class="right aligned">{{$phone}}</td>
                <td class="text-center">
                    {{ \App\Functions::getTimeCount(date_create($order->order_created_at)->getTimestamp(), false) }}
                </td>
                <td class="right aligned" id="">{{number_format($order->total_of_cost).' đ'}}
                </td>
                <td>
                    @if($order->unapproved())
                        <i class="warning open fitted orange icon"></i>
                        <span style="color: orange" ><strong> Chưa duyệt</strong></span>
                    @elseif($order->waitingPay())
                        @if(date_create(date('Y-m-d H:i:s'))->getTimestamp() -
                                date_create($order->order_created_at)->getTimestamp() > 600)
                            <i class="wait open fitted red icon"></i>
                            <span style="color: red" ><strong> Đang thanh toán online</strong></span>
                        @else
                            <i class="wait open fitted orange icon"></i>
                            <span style="color: orange" ><strong> Đang thanh toán online</strong></span>
                        @endif
                    @elseif($order->getStatus() == 2)
                        <i class="check green open fitted red icon"></i>
                        <span style="color: green"><strong>Đã giao hàng</strong></span>
                    @else
                        <i class="shipping fast teal open fitted red icon"></i>
                        <span style="color: teal"><strong>Đang vận chuyển</strong></span>
                    @endif
                </td>
                <td class="center aligned">
                    @if($order->unapproved())
                        <a class="ui small teal label a-decoration" href="{{ route('order_approved', [$order->id]) }}"
                           onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                            <i class="check open fitted icon"></i>
                        </a>
                        /
                        <a class="ui small orange label a-decoration" href="{{ route('order_cancelled', [$order->id]) }}"
                           onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')">
                            <i class="trash open fitted icon"></i>
                        </a>
                    @endif
                    @if($order->waitingPay() || $order->approved())
                            <a class="ui small orange label a-decoration" href="{{ route('order_cancelled', [$order->id]) }}"
                               onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')">
                                <i class="trash open fitted icon"></i>
                            </a>
                    @endif
                </td>
                <td>
                    @if($order->getStatus() == 2)
                        <a class="ui small red label a-decoration" href="{{ route('order_cancelled', [$order->id]) }}"
                           onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')">
                            <i class="remove fitted icon"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($orders, 'render'))
        <div id="order-pagination" class="ui basic segment center aligned no-padding">
            {{ $orders->appends($_GET)->render('admin.layouts.components.pagination.smui')}}
            {{--{{ $orders->links() }}--}}
        </div>
    @endif
