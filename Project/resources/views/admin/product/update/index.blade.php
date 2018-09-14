@extends('admin.layouts.master')
@section('title','ADMIN | Loại sản phẩm')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title title">THÊM MÓN ĂN MỚI</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Tên món ăn</label>
                                            <input type="text" name="name-pro" placeholder="Nhập tên món ăn..." class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Thuộc loại</label>
                                            <select name="name-type" id="name-type" class="form-control" style="border-radius: 30px">
                                                @foreach($productTypes as $prot)
                                                    <option value="{{$prot->id}}">{{$prot->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="full_des">Mô tả đầy đủ</label>
                                        <textarea rows="5" class="form-control" placeholder="Khoảng 50 từ..." value="" id="des" name="des"></textarea>
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
                                <button style="font-size: 15px" type="submit" class="btn btn-info btn-round">Thêm món ăn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection