@extends('admin.layouts.master')
@section('title','ADMIN | Nhập hàng')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="title" rel="tooltip" title="Trang quản lý nhập hàng" data-placement="bottom"
                                href="{{route('goods_receipt.index')}}">
                            <i class="fa fa-chevron-circle-left btn btn-info btn-round"></i>PHIẾU NHẬP NGÀY.....</a>
                        <hr>
                        <div class="add-goods">
                            <a href="" class="btn btn-info btn-round" >
                                <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                            </a>
                            <button type="submit" class="btn btn-danger btn-round"
                                    onclick="return confirm('Bạn có chắc muốn xóa nó chứ?')">
                                <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                            </button>
                        </div>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="wrapper-prot">
                                @include('admin.goods_receipt.indexDetails.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @include('admin.goods_receipt.indexDetails.modals')
@endsection