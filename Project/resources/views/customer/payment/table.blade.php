<table class="striped">
    <thead>
    <tr>
        <th class="center-align">STT</th>
        <th class="center-align">Hình ảnh</th>
        <th>Tên sản phẩm</th>
        <th class="center-align">Số lượng</th>
        <th class="right-align">Đơn giá</th>
        <th class="center-align">Khuyến mãi</th>
        <th class="right-align">Thành tiền</th>
    </tr>
    </thead>

    <tbody>
    @php $stt = 1 @endphp
    @foreach(Cart::content() as $cart)
        @php $foody = \App\Foody::find($cart->id) @endphp
        <tr id="payment-table-row-{{ $cart->id }}">
            <td class="center-align">{{ $stt }}</td>
            <td class="center-align"><img class="responsive-img payment-image" src="{{ $foody->avatar }}"></td>
            <td>{{ $cart->name }}</td>
            <td class="center-align" id="payment-table-amount">{{ $cart->qty }}</td>
            <td class="right-align payment-table-cost" data-id="{{ $foody->id }}"
                data-cost="{{ $foody->getSaleCost() }}">
                {{ number_format($foody->getSaleCost()) }}<sup>đ</sup></td>
            <td class="center-align">
                <span class="ui red small label">{{ $foody->getSalePercent() }}%</span>
            </td>
            <td class="right-align" id="payment-table-total">{{ number_format($foody->getSaleCost() * $cart->qty) }}<sup>đ</sup></td>
        </tr>
        @php $stt++ @endphp
    @endforeach
    </tbody>

    <tfoot>
    <th colspan="5" class="right-align">Tổng cộng</th>
    <th colspan="2" class="right-align" id="payment-table-total-cost">
        {{ number_format(\App\Http\Controllers\Customer\CartFunction::getCost()) }}<sup>đ</sup>
    </th>
    </tfoot>

</table>