@extends('admin.layouts.master')
@section('title','ADMIN | Sản phẩm')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="">
                        <div class="card-header">
                            <h5 class="title">Danh sách các món ăn của cửa hàng</h5>
                            <div class="add-product">
                                <a href="{{route('create_type')}}" class="btn btn-info btn-round" >
                                    <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                                </a>
                                <button class="btn btn-danger btn-round">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.product.table')

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection