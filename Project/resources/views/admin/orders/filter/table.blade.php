    <table class="ui table very compact striped celled selectable unstackable" id="form-orders">
        <thead>
        <tr>
            <th class="collapsing">STT</th>
            <th class="text-center">Mã đơn hàng</th>
            <th>Người đặt hàng</th>
            <th class="center aligned">SĐT</th>
            <th class="text-center">Ngày đặt hàng</th>
            <th class="text-center">Số SP</th>
            <th class="text-center">Tổng tiền</th>
            <th class="">Tình trạng</th>
            <th class="collapsing">Duyệt</th>
            <th class="collapsing">Hủy</th>
        </tr>
        </thead>
        <tbody>

        @foreach($orderFilters as $stt => $orderFilter)

            <tr>
                <td>{{$stt + 1}}</td>
                <td>
                    <a class="a-decoration" rel="tootip" data-placement="bottom"
                       title="Đến trang chi tiết đơn hàng {{$orderFilter->order_code}}"
                       href="{{route('orders.show',[$orderFilter->id])}}">{{$orderFilter->order_code}}</a>
                </td>
                <td>
                    {{$orderFilter->receiver}}
                </td>
                <td class="text-center">{{$orderFilter->phone}}</td>
                <td class="text-center">{{$orderFilter->order_created_at}}</td>
                @php
                    $amountFoody = \App\OrderFoody::where('order_id',$orderFilter->id)->count('foody_id');
                @endphp
                <td class="text-center">{{$amountFoody}}
                </td>
                <td class="text-center">{{number_format($orderFilter->total_of_cost).' đ'}}
                </td>
                <td>
                    @if($orderFilter->status == 0)
                        <i class="warning open fitted orange icon"></i>
                        <span style="color: orange" ><strong> Chưa duyệt</strong></span>

                    @elseif($orderFilter->status == 1)
                        <i class="wait teal open fitted red icon"></i>
                        <span style="color: teal"><strong>Đang vận chuyển</strong></span>
                    @elseif($orderFilter->status == 2)
                        <i class="check green open fitted red icon"></i>
                        <span style="color: green"><strong>Đã giao hàng</strong></span>
                    @else
                        <i class="delete red open fitted icon"></i>
                        <span style="color: red" ><strong> Đã hủy</strong></span>
                    @endif
                </td>
                <td class="center aligned">
                    @if($orderFilter->status == 0)
                        <a class="ui small teal label a-decoration" href="{{ route('order_approved', [$orderFilter->order_id]) }}"
                           onclick="return confirm('Bạn chắc chắn muốn duyệt đơn hàng này?')">
                            <i class="check open fitted icon"></i>
                        </a>
                    @endif
                </td>
                <td>
                    @if($orderFilter->status == 0)
                        <a class="ui small orange label a-decoration" href="{{ route('order_cancelled', [$orderFilter->order_id]) }}"
                           onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')">
                            <i class="trash open fitted icon"></i>
                        </a>
                    @elseif($orderFilter->status == 3)
                        <a class="ui small red label a-decoration" href="{{ route('order_cancelled', [$orderFilter->order_id]) }}"
                           onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này?')">
                            <i class="remove open fitted icon"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($orderFilters, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $orderFilters->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
