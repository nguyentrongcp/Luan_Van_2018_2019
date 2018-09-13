@extends('admin.layouts.master')
@section('title','ADMIN | Loại sản phẩm')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title title">THÊM MỚI SẢN PHẨM</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-6 ">
                                    <div class="form-group">
                                        <label for="name">Tên</label>
                                        <input type="text" name="name" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Loại</label>
                                        <select name="type" id="type" class="form-control" style="border-radius: 30px">
                                            <option value="1">Du lịch</option>
                                            <option value="2">Ăn uống</option>
                                            <option value="3">Khách sạn</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="city">Thành phố</label>
                                        <select name="city" id="city" class="form-control">
                                            <option value="1">Cần Thơ</option>
                                            <option value="2">Sóc Trăng</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" name="address" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Link Google Map</label>
                                        <input type="link" name="map" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="full_des">Mô tả đầy đủ</label>
                                        <textarea rows="5" class="form-control" placeholder="Khoảng 50 từ" value="" id="full_des" name="full_des"></textarea>
                                    </div>



                                    <div class="form-group">
                                        <label for="images">Hình ảnh: </label>
                                        <div class="">
                                            <button class="btn btn-info btn-fab btn-icon btn-round" style="cursor: pointer">
                                                <i class="now-ui-icons ui-1_simple-add"></i>
                                                <input type="file" multiple id="gallery-photo-add" name="images[]" accept="image/png, image/jpg, image/jpeg">
                                            </button>
                                        </div>
                                        <div class="gallery"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-center">
                                <button style="font-size: 15px" type="button" class="btn btn-round">Quay lại</button>
                                <button style="font-size: 15px" type="submit" class="btn btn-info btn-round">Thêm sản phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection