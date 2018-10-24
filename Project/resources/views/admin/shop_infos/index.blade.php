@extends('admin.layouts.master')

@section('title', 'Thông tin cửa hàng')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui dividing header">Thông tin cửa hàng</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.error_msg')

        <form action="{{ route('shop_infos.update',[1]) }}" class="ui form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="field">
                <button class="ui blue button">
                    <i class="save icon"></i>Lưu lại
                </button>
            </div>

            <div class="ui two column divided grid small-td-margin">
                <div class="column">
                    <div class="field">
                        <label>Tên cửa hàng</label>
                        <input type="text" name="shop-name" value="{{ $shopInfo->name }}">
                    </div>
                    <div class="field">
                        <label>Email</label>
                        <input type="email" name="shop-email" value="{{ $shopInfo->email }}">
                    </div>
                    <div class="field">
                        <label>Số điện thoại</label>
                        <input type="text" name="shop-phone" value="{{ $shopInfo->phone }}">
                    </div>
                    <div class="field">
                        <label>Địa chỉ</label>
                        <input type="text" name="shop-address" value="{{ $shopInfo->address }}">
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label>Email Cổng thanh toán Ngân Lượng</label>
                        {{--<input type="email" name="nganluong_email" value="{{ $info->nganluong_email }}">--}}
                    </div>
                    <div class="field">
                        <label for="logo">Logo</label>
                        <img src="{{asset('customer/image/logo.png')}}" alt="Logo">

                    </div>
                    <div class="field">
                        <a href="#" class="ui small blue button" onclick="$('#change-logo-modal').modal('show')">
                            <i class="exchange icon"></i>Thay đổi
                        </a>
                    </div>
                </div>
            </div>
            <div class="field">
                <button class="ui blue button">
                    <i class="save icon"></i>Lưu lại
                </button>
            </div>
        </form>
    </div>
    @include('admin.shop_infos.modal')
@endsection
