@extends('admin.layouts.master')
@section('title','ADMIN | Khuyến mãi')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title text-center">QUẢN LÝ KHUYẾN MÃI</h5>
                            <hr>
                            <div class="add-productType">
                                <button type="button" class="btn btn-info btn-round" onclick="$('#modal-create-sales').modal('show')">
                                    <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                                </button>
                                <button type="submit" class="btn btn-danger btn-round"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.sales_offs.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @include('admin.sales_offs.modals')
@endsection