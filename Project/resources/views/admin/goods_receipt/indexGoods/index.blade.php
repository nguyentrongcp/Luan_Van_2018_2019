@extends('admin.layouts.master')
@section('title','ADMIN | Nhập hàng')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center">QUẢN LÝ NHẬP HÀNG</h5>
                        <hr>
                        <div class="add-goods">
                            <button onclick="$('#modal-create-goods').modal('show')" class="btn btn-info btn-round" >
                                <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                            </button>
                            <button type="submit" class="btn btn-danger btn-round"
                                    onclick="return confirm('Bạn có chắc muốn xóa nó chứ?')">
                                <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                            </button>
                        </div>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="wrapper-prot">
                                @include('admin.goods_receipt.indexGoods.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.goods_receipt.indexGoods.modals')
@endsection