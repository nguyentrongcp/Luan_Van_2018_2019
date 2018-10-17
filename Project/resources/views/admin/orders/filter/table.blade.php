<div class="tables">
    <table class="table table-bordered">
        <thead>
        <tr>
            {{--<th class="text-left th-prot th-stt">--}}
                {{--<div class="form-check">--}}
                    {{--<label class="form-check-label">--}}
                        {{--<input class="form-check-input" id="check-all" type="checkbox"--}}
                               {{--onclick="eventCheckBox()">--}}
                        {{--<span class="form-check-sign"></span>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</th>--}}
            <th class="text-center th-prot th-stt">STT</th>
            <th class="th-prot text-center">Mã đơn hàng</th>
            <th class="th-prot text-center">Người đặt hàng</th>
            <th class="th-prot text-center">SĐT</th>
            <th class="th-prot text-center">Ngày đặt hàng</th>
            <th class="text-center th-prot">Số SP</th>
            <th class="text-center th-prot">Tổng tiền</th>
            <th class="text-center th-prot">Tình trạng</th>
            <th class="text-center th-prot">Duyệt</th>
            <th class="text-center th-prot">Hủy</th>


        </tr>
        </thead>
        <tbody>
        @foreach($orderFilters as $stt => $orderFilter)
            <tr>
                {{--<td class="text-left td-prot th-stt">--}}
                    {{--<div class="form-check">--}}
                        {{--<label class="form-check-label">--}}
                            {{--<input class="form-check-input" name="orders-id[]" value="{{$order->id}}" type="checkbox">--}}
                            {{--<span class="form-check-sign"></span>--}}
                        {{--</label>--}}
                    {{--</div>--}}
                {{--</td>--}}
                <td class="text-center td-prot th-stt">{{$stt + 1}}</td>
                <td class="td-prot" id="">
                    <a class="a-prot" rel="tootip" data-placement="bottom"
                       title="Đến trang chi tiết đơn hàng {{$orderFilter->order_code}}"
                       href="{{route('orders.show',[$orderFilter->id])}}">{{$orderFilter->order_code}}</a>
                </td>
                <td class="td-prot" id="">{{$orderFilter->receiver}}
                </td>
                <td class="td-prot" id="">{{$orderFilter->phone}}
                </td>
                <td class="td-prot" id="">{{$orderFilter->order_created_at}}
                </td>
                @php
                    $amountFoody = App\OrderFoody::where('order_id',$orderFilter->id)->count();
                @endphp
                <td class="td-prot" id="">{{$amountFoody}}
                </td>
                <td class="td-prot" id="">{{number_format($orderFilter->total_of_cost).' đ'}}
                </td>
                @foreach(App\OrderStatus::where('order_id',$orderFilter->id)->get() as $orderStatus)
                    @if($orderStatus->status == 0)
                        <td class="td-prot text-warning title" id="">
                            Chưa duyệt
                        </td>
                    @else
                        <td class="td-prot text-success title" id="">
                            Đang giao hàng
                        </td>
                    @endif
                @endforeach
                <td class="text-center td-prot">
                    <button type="button" rel="tooltip"
                            class="btn btn-success btn-sm btn-round btn-icon {{$orderStatus->status == 1 ? 'disabled':''}}"
                            onclick="$('#modal-approved-orders').modal('show')">
                        <i class="fa fa-check-circle"></i>
                    </button>
                </td>
                <td class="text-right td-prot">
                    <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon"
                            onclick="$('#modal-cancel-orders').modal('show')">
                        <i class="fa fa-close"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="div-pagination">
        {{$orderFilters->links()}}
    </div>

</div>

{{--<script>--}}
    {{--function eventCheckBox() {--}}
        {{--let checkboxs = document.getElementsByName('employees-id[]');--}}
        {{--let checkAll = document.getElementById('check-all');--}}
        {{--for (let i = 0; i < checkboxs.length; i++) {--}}
            {{--checkboxs[i].checked = checkAll.checked;--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}