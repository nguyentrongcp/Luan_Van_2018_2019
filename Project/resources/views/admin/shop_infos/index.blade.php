@extends('admin.layouts.master')
@section('title','ADMIN | Thông tin cửa hàng')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title text-center">THÔNG TIN CỬA HÀNG</h5>
                            <hr>
                            <div class="add-productType">
                                <button type="button" class="btn btn-info btn-round">
                                    <i class="fa fa-save"></i> LƯU THAY ĐỔI
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Tên cửa hàng</label>
                                            <input type="text" class="form-control" name="name-shop" id="name-shop"
                                                   value="Snack shop" minlength="5" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="email" class="form-control" name="email-shop" id="email-shop"
                                                   value="snackshop@gmail.com" minlength="5" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Số điện thoại</label>
                                            <input type="number" class="form-control" name="numphone-shop" id="numphone-shop"
                                                   value="0123456789" minlength="5" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Logo</label>
                                            <input type="file" class="form-control" name="logo-shop" id="logo-shop"
                                                   required>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection