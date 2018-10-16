@extends('admin.layouts.master')
@section('title','Đơn hàng | Fast Foody Shop')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center">QUẢN LÝ ĐƠN HÀNG</h5>
                        <hr>
                        <div class="dropdown">
                            <a class="btn btn-info btn-round dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Bộ lọc <i class="fa fa-filter"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{route('orders.index')}}">Tất cả</a>
                                <a class="dropdown-item text-warning" href="{{route('admin_orders_filter',[0])}}">Chưa duyệt</a>
                                <a class="dropdown-item text-success" href="{{route('admin_orders_filter',[1])}}">Đang giao hàng</a>
                                <a class="dropdown-item text-danger" href="#">Đã hủy</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="wrapper-prot">
                                @include('admin.orders.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection