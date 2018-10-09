@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    <div class="row white payment">
        <span class="col s12 payment-header">
            Bạn đã sẵn sàng để thanh toán?
        </span>
        <span class="col s12 payment-title">
            Thông tin giao hàng
        </span>
        <div class="col s12 divider"></div>
        <div class="col s12 payment-form">
            <form class="col s12">
                <div class="row">
                    <div class="col s6 payment-col-left">
                        <div class="input-field col s12">
                            <input id="address" type="text">
                            <label for="address">
                                Số nhà, tên hẻm (nếu có) và tên đường
                            </label>
                        </div>
                    </div>
                    <div class="col s6 payment-col-right">
                        <div class="input-field col s12">
                            <select>
                                <option value="1">Căn hộ</option>
                                <option value="2">Nhà trọ</option>
                                <option value="3">Quán</option>
                                <option value="3">Khách sạn</option>
                            </select>
                            <label>Nơi đến</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 payment-col-left">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Quận</option>
                                <option value="1">Ô Môn</option>
                                <option value="2">Thốt Nốt</option>
                                <option value="3">Ninh Kiều</option>
                            </select>
                            <label>Chọn quận</label>
                        </div>
                    </div>
                    <div class="col s6 payment-col-right">
                        <div class="input-field col s12">
                            <select>
                                <option value="" disabled selected>Quận</option>
                                <option value="1">Ô Môn</option>
                                <option value="2">Thốt Nốt</option>
                                <option value="3">Ninh Kiều</option>
                            </select>
                            <label>Chọn phường</label>
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                    {{----}}
                {{--</div>--}}
            </form>
        </div>

        <span class="col s12 payment-title">
            Thông tin cá nhân
        </span>
        <div class="col s12 divider"></div>
        <div class="col s12 payment-form">
            <form class="col s12">
                <div class="row">
                    <div class="col s6 payment-col-left">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" type="text">
                            <label for="name">
                                Họ và tên
                            </label>
                        </div>
                    </div>
                    <div class="col s6 payment-col-right">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">local_phone</i>
                            <input id="phone" type="text">
                            <label for="phone">
                                Số điện thoại
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 payment-col-left">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="text">
                            <label for="email">
                                Email <span class="red-text">*</span>
                            </label>
                        </div>
                    </div>
                    <div class="col s6 payment-col-right">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">note</i>
                            <textarea id="note" class="materialize-textarea"></textarea>
                            <label for="note">Ghi chú</label>
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                {{----}}
                {{--</div>--}}
            </form>
        </div>

        <span class="col s12 payment-title">
            Hình thức thanh toán
        </span>
        <div class="col s12 divider"></div>
        <div class="col s12 payment-type">
            <div class="row" style="margin-bottom: 1rem">
                <div class="col s6 payment-col-left">
                    <label>
                        <input name="payment-type" type="radio" checked>
                        <span>Tiền mặt khi nhận hàng</span>
                    </label>
                </div>
                <div class="col s6 payment-col-right">
                    <label>
                        <input name="payment-type" type="radio">
                        <span>Thanh toán qua cổng ngân lượng</span>
                    </label>
                </div>
            </div>
        </div>

        <span class="col s12 payment-title">
            Giỏ hàng và chi phí
        </span>
        <div class="col s12 divider"></div>

        <div class="col s12 payment-cost">
            <div class="row">
                <div class="col s6 payment-col-left">
                    <div class="col s12">
                        <span class="col s8 right-align">Giá sản phẩm</span>
                        <span class="col s4 right-align">
                            2,999,999<sup>đ</sup></span>
                    </div>
                    <div class="col s12">
                        <span class="col s8 right-align">Phí vận chuyển</span>
                        <span class="col s4 right-align">
                            2,999,999<sup>đ</sup></span>
                    </div>
                    <div class="col s12">
                        <span class="col s8 right-align"><b>Tổng tiền</b></span>
                        <span class="col s4 right-align">
                            <b>2,999,999<sup>đ</sup></b></span>
                    </div>
                </div>
                <div class="col s6 payment-col-right">
                    <table class="striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Khuyến mãi</th>
                            <th>Tổng tiền</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $stt => $cart)
                                @php $foody = \App\Foody::find($cart->id) @endphp
                                <tr>
                                    <td>{{ $stt }}</td>
                                    <td>{{ $cart->name }}</td>
                                    <td>{{ number_format($foody->currentCost()) }}<sup>đ</sup></td>
                                    <td>{{ $cart->qty }}</td>
                                    <td>{{ "" }}</td>
                                    <td>{{ number_format($foody->currentCost() * $cart->qty) }}
                                        <sup>đ</sup></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col s12 payment-action">
            <div class="col s6 payment-col-left">
                <a class="waves-effect waves-light btn-fluid btn">
                    Đặt hàng
                </a>
            </div>
            <div class="col s6 payment-col-right">

            </div>
        </div>
    </div>

    @include('customer.payment.style')

    @include('customer.payment.js')

@endsection