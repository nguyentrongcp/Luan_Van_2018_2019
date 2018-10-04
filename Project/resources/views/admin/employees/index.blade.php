@extends('admin.layouts.master')
@section('title','ADMIN | Nhân viên')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title text-center">DANH SÁCH NHÂN VIÊN CỦA CỬA HÀNG</h5>
                        <hr>
                        <div class="add-product">
                            <button class="btn btn-info btn-round" onclick="$('#modal-create-employee').modal('show')">
                                <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                            </button>
                            <button class="btn btn-danger btn-round">
                                <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                            </button>
                        </div>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="wrapper-prot">

                            @include('admin.employees.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.employees.modals')
@endsection