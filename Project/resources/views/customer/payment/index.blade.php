@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    @php use \App\Http\Controllers\Customer\CartFunction; @endphp

    <div class="row white payment">
        <form id="form-payment">
            @csrf
            <span class="col s12 payment-header">
                Bạn đã sẵn sàng để thanh toán?
            </span>
            <span class="col s12 payment-title">
                Thông tin giao hàng
            </span>
            <div class="col s12 divider"></div>
            <div class="col s12 payment-form">
                <div class="row">
                    <div class="col s12 m6 l6 payment-col-left">
                        <div class="input-field col s12">
                            <input id="address" type="text" value="221/6">
                            <label for="address">
                                Số nhà, tên hẻm (nếu có) và tên đường
                                <span class="red-text">*</span>
                            </label>
                            <span id="error-address" class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 payment-col-right">
                        <div class="input-field col s12">
                            <select id="to">
                                <option value="Căn hộ">Căn hộ</option>
                                <option value="Nhà trọ">Nhà trọ</option>
                                <option value="Quán">Quán</option>
                                <option value="Khách sạn">Khách sạn</option>
                            </select>
                            <label>Nơi đến</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6 payment-col-left">
                        <div class="input-field col s12">
                            <select id="district">
                                @foreach($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->district }}</option>
                                @endforeach
                                {{--<option value="1">Bình Thủy</option>--}}
                            </select>
                            <label>Chọn quận/huyện</label>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 payment-col-right">
                        <div class="input-field col s12">
                            <select id="ward">
                                @foreach(\App\TransportFee::where('district_id', $districts[0]->id)->get() as $transport_fee)
                                    <option value="{{ $transport_fee->id }}">{{ $transport_fee->ward }}</option>
                                @endforeach
                            </select>
                            <label>Chọn phường</label>
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                {{----}}
                {{--</div>--}}
            </div>

            <span class="col s12 payment-title">
            Thông tin cá nhân
        </span>
            <div class="col s12 divider"></div>
            <div class="col s12 payment-form">
                <div class="row">
                    <div class="col s12 m6 l6 payment-col-left">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" type="text" value="Nguyễn Nguyễn">
                            <label for="name">
                                Họ và tên <span class="red-text">*</span>
                            </label>
                            <span id="error-name" class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 payment-col-right">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">local_phone</i>
                            <input id="phone" class="number-only" type="text" value="0339883047" maxlength="10">
                            <label for="phone">
                                Số điện thoại <span class="red-text">*</span>
                            </label>
                            <span id="error-phone" class="helper-text"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6 payment-col-left">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="text" value="nguyennguyencp@gmail.com">
                            <label for="email">
                                Email <span class="red-text">*</span>
                            </label>
                            <span id="error-email" class="helper-text"></span>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 payment-col-right">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">note</i>
                            <textarea id="note" class="materialize-textarea"></textarea>
                            <label for="note">Ghi chú</label>
                            <span id="error-note" class="helper-text"></span>
                        </div>
                    </div>
                </div>
                {{--<div class="row">--}}
                {{----}}
                {{--</div>--}}
            </div>

            <span class="col s12 payment-title">
            Hình thức thanh toán
        </span>
            <div class="col s12 divider"></div>
            <div class="col s12">
                <div class="row">
                    <div class="col s12 payment-type">
                        <div class="col s12 m6 l6 payment-col-left" style="padding-bottom: 10px">
                            <label>
                                <input name="payment-type" type="radio" value="0" checked>
                                <span>Tiền mặt khi nhận hàng</span>
                            </label>
                        </div>
                        <div class="col s12 m6 l6 payment-col-right">
                            <label>
                                <input name="payment-type" type="radio" value="1">
                                <span>Thanh toán qua cổng ngân lượng</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <span class="col s12 payment-title">
            Giỏ hàng và chi phí
        </span>
            <div class="col s12 divider" style="margin-bottom: 0"></div>

            <div class="col s12">
                <div class="row">
                    <div class="col s12 payment-cost">
                        @include('customer.payment.table')
                    </div>
                    <div class="col s12 payment-total">
                        <span class="col s9 right-align">Giá sản phẩm</span>
                        <span id="foody-cost" class="col s3 right-align" data-cost="{{ CartFunction::getCost() }}">
                            {{ number_format(CartFunction::getCost()) }}<sup>đ</sup></span>
                    </div>
                    <div class="col s12 payment-total">
                        <span class="col s9 right-align">Phí vận chuyển</span>
                        <span id="transport-fee" class="col s3 right-align">
                            <sup>đ</sup></span>
                    </div>
                    <div class="col s12 payment-total">
                        <span class="col s9 right-align"><b>Số tiền thanh toán</b></span>
                        <span id="payment-cost" class="col s3 right-align">
                            <b><sup>đ</sup></b></span>
                    </div>

                </div>
            </div>

            <div class="col s12 m6 offset-m6 l6 offset-l6">
                <div class="col s12 payment-action">
                    <a onclick="getOTP()" id="payment-action" class="waves-effect waves-light btn-fluid btn">
                        Thanh toán
                    </a>
                </div>
            </div>

        </form>
    </div>

    @include('customer.payment.otp-modal')

    @include('customer.layouts.components.modal.notify-modal')

    @include('customer.payment.style')

    @include('customer.payment.js')


@endsection