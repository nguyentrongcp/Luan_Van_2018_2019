@extends('admin.layouts.master')
@section('title','Chi tiết đơn hàng | Fast Foody Shop')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{--<div class="col-md-12 row">--}}
                            <a class="btn btn-round btn-info" rel="tootip" title="QUAY LẠI"
                               data-placement="bottom" href="{{route('orders.index')}}">
                                <i class="fa fa-arrow-circle-left" style="font-size: 18px"></i> Trở về</a>
                            <h5 class="title">ĐƠN HÀNG "{{$orderCode}}"</h5>
                        {{--</div>--}}
                        <hr>
                        <div class="dropdown">
                            <a class="btn btn-info btn-round dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Bộ lọc <i class="fa fa-filter"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item text-warning" href="#">Chưa duyệt</a>
                                <a class="dropdown-item text-success" href="#">Đang giao hàng</a>
                                <a class="dropdown-item text-danger" href="#">Đã hủy</a>
                            </div>
                                <a class="btn btn-success btn-round" href=""><i class="fa fa-check-circle"></i>Duyệt</a>
                                <a class="btn btn-danger btn-round" href=""><i class="fa fa-close"></i>Hủy</a>
                        </div>

                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="wrapper-prot">
                                @include('admin.orders.show.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection