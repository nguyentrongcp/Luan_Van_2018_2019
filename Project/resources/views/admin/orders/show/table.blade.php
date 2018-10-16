<div class="card-body">
    <form action="" method="post">
        {{csrf_field()}}
        <div class="card">
            <div class="card-header">
                <label class="title text-info" style="font-size: 18px" for="">Thông tin</label>
            </div>
            <div class="card-body">
                {{--@foreach($orders as $order)--}}
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="title text-black-40 lb-info form-group" for="name">Mã đơn hàng: </label>
                            <label class="lb-info-orders" for="">{{$orders->order_code}}</label>
                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Họ và tên: </label>
                            <label class="lb-info-orders" for="">{{$orders->receiver}}</label>

                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Số điện thoại: </label>
                            <label class="lb-info-orders" for="">{{$orders->phone}}</label>

                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Email: </label>
                            <label class="lb-info-orders" for="">{{$orders->email}}</label>

                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Địa chỉ nhận hàng: </label>
                            <label class="lb-info-orders" for="">{{$orders->address}}</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Ngày đặt hàng: </label>
                            <label class="lb-info-orders" for="">{{$orders->order_created_at}}</label>

                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Hình thức thanh toán: </label>

                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Tổng tiền: </label>
                            <label class="lb-info-orders" for="">{{$orders->total_of_cost}}</label>

                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Tình trạng đơn hàng: </label>

                        </div>
                        <div class="form-group">
                            <label class="title text-black-40 lb-info" for="type">Phí vận chuyển: </label>
                            <label class="lb-info-orders" for="">{{$orders->transport_fee}}</label>

                        </div>
                    </div>
                </div>
                {{--@endforeach--}}
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <label class="title text-info" style="font-size: 18px" for="">Thực đơn</label>
            </div>
            <div class="card-body">
                <div class="tables">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center th-prot th-stt">STT</th>
                            <th class="text-center th-prot">Tên thực đơn</th>
                            <th class="th-prot text-center">Số lượng</th>
                            <th class="th-prot text-center">Đơn giá</th>
                            <th class="th-prot text-center">Tổng tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderFoodys as $stt => $orderFoody)

                            <tr>
                                <td class="text-center td-prot th-stt">{{$stt + 1}}</td>
                                <td class="td-prot">
                                    <a class="text-info" href="{{route('foodies.show',[$orderFoody->foody_id])}}">{{App\Foody::find($orderFoody->foody_id)->name}}</a>
                                </td>
                                <td class="td-prot text-center">{{$orderFoody->amount}}</td>
                                <td class="td-prot text-center">{{number_format($orderFoody->cost).' đ'}}</td>
                                <td class="td-prot text-center">{{number_format($orderFoody->total_of_cost).' đ'}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-success btn-round" href=""><i class="fa fa-check-circle"></i>Duyệt</a>
                <a class="btn btn-danger btn-round" href=""><i class="fa fa-close"></i>Hủy</a>

            </div>
        </div>
    </form>
</div>