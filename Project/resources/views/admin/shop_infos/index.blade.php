@extends('admin.layouts.master')
@section('title','Thông tin cửa hàng | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('shop_infos.update',[1])}}" method="post" >
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-header">
                            <h5 class="title text-center">THÔNG TIN CỬA HÀNG</h5>
                            <hr>
                            <div class="add-productType">
                                <button type="submit" class="btn btn-info btn-round">
                                    <i class="fa fa-save"></i> LƯU THAY ĐỔI
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="wrapper-prot">
                                    <div class="col-md-12 row">
                                        @foreach($shopInfos as $shopInfo)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Tên cửa hàng</label>
                                                    <input type="text" class="form-control" name="name-shop"
                                                           id="shop-name"
                                                           value="{{$shopInfo->name}}" minlength="5" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Email</label>
                                                    <input type="email" class="form-control" name="shop-email"
                                                           id="email-shop"
                                                           value="{{$shopInfo->email}}" minlength="5" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Số điện thoại</label>
                                                    <input type="number" class="form-control" name="shop-phone"
                                                           id="numphone-shop"
                                                           value="{{$shopInfo->phone}}" minlength="5" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="shop-address"
                                                           id="address-shop"
                                                           value="{{$shopInfo->address}}" minlength="5" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Logo</label>
                                                    <div class="img-wrapper">
                                                        <img src="{{asset($shopInfo->logo)}}" alt="{{$shopInfo->name}}">
                                                    </div>
                                                    <button type="button" onclick="$('#modal-change-logo').modal('show')" class="btn btn-info btn-round">Thay đổi</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @include('admin.shop_infos.modal')
            </div>
        </div>
    </div>
@endsection