<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        .wrapper {
            padding: 20px;
            font-family: 'DejaVu Sans';
            font-size: 12px;
        }

        p {
            margin: 5px;
        }

        .date {
            font-size: 12px;
        }

        .header-wrapper {
            width: 100%;
            text-align: center;
        }

        table {
            width: 100%;
            border-radius: 5px;
            text-align: center;
        }

        th {
            background-color: #F9FAFB;
        }

        th, td {
            padding: 5px;
            border-color: lightgray;
            border-style: solid;
            border-width: 1px 1px 0 0;
        }

        th:first-child, td:first-child {
            border-left: 1px solid lightgray;
        }

        tr:last-child td:last-child {
            border-bottom: 1px solid lightgray;
        }

        .right-aligned {
            text-align: right;
        }

        .left-aligned {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="date">{{ date('Y-m-d') }}</div>
    <div class="header-wrapper">
        <p><strong>HÓA ĐƠN BÁN HÀNG</strong></p>
        <p>Ngày: <strong>{{ date('Y-m-d H:i:s') }}</strong></p>
        <p>Mã đơn hàng: <strong>{{ $order->order_code }}</strong></p>
    </div>

    <div class="info">
        <p>Đơn vị bán hàng: <strong>Fast Foody Shop</strong></p>
        <p>Tên khách hàng: <strong>{{ $order->receiver }}</strong></p>
        <p>Địa chỉ: {{ $order->address }}</p>
        <p>Điện thoại: {{ $order->phone }}</p>
        @if($order->payment_type == 1)
            <p>Hình thức thanh toán: Tiền mặt</p>
        @else
            <p>Hình thức thanh toán: Thanh toán qua cổng ngân lượng</p>
        @endif
    </div>

    <div class="product-table">
        <table cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên ẩm thực</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Khuyến mãi</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orderDetails as $stt => $orderDetail)
                <tr>
                    <td>{{ $stt + 1 }}</td>
                    <td>{{ \App\Foody::find($orderDetail->foody_id)->name }}</td>
                    <td>{{ $orderDetail->amount }}</td>
                    <td>{{ number_format($orderDetail->cost) }} đ</td>
                    <td>{{ $orderDetail->sales_off_percent }}%</td>
                    <td>{{ number_format($orderDetail->total_of_cost) }} đ</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6" class="right-aligned">
                    <p>Thuế GTGT (10%): <strong>{{ number_format($order->total_of_cost * 0.1) }} đ</strong></p>
                    <p>Tổng tiền hàng (đã có thuế): <strong>{{ number_format($order->total_of_cost) }} đ</strong>
                    </p>
                    <p>Phí vận chuyển: <strong>{{ number_format($order->transport_fee) }} đ</strong></p>
                    <p>Tổng cộng: <strong>{{ number_format($order->tong_tien + $order->transport_fee) }}
                            đ</strong></p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>