@extends('admin.layouts.master')
@section('title','ADMIN | Sản phẩm')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('products.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title">Danh sách các thực đơn của cửa hàng</h5>
                            <div class="add-product">
                                <a href="{{route('products.create')}}" class="btn btn-info btn-round" >
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
                                    @include('admin.products.table')

                                </div>
                            </div>
                        </div>
                    </form>
                    @include('admin.products.show.modal-show')
                </div>
            </div>
        </div>
    </div>
@endsection