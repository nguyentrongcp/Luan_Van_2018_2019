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
                                    <div class="col-md-6">
                                        <form action="" method="post" enctype="multipart/form-data">
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
                                                <label class="bmd-label-floating">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address-shop" id="address-shop"
                                                       value="Ninh Kiều - Cần Thơ" minlength="5" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Logo</label>
                                                <div class="">
                                                    <button class="btn btn-info btn-fab btn-icon btn-round" style="cursor: pointer">
                                                        <i class="now-ui-icons ui-1_simple-add"></i>
                                                        <input type="file" id="gallery-avatar-image" name="avatar-image-upload"
                                                               accept=".jpg, .png, .jpeg">
                                                    </button>
                                                </div>
                                                <div class="gallery-avatar-image"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection