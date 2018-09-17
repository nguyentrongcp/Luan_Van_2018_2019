@extends('admin.layouts.master')
@section('title','ADMIN | Loại sản phẩm')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title title">
                            <a rel="tootip" title="Quay lại" data-placement="bottom" href="{{route('products.index')}}">THỰC ĐƠN >></a>THÊM THỰC ĐƠN MỚI</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name">Tên thực đơn</label>
                                            <input type="text" name="name-pro" placeholder="Nhập tên thực đơn..." class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Thuộc loại</label>
                                            <select name="name-type" id="name-type" class="form-control" style="border-radius: 30px">
                                                @foreach($productTypes as $prot)
                                                <option name="product-type-id" value="{{$prot->id}}">{{$prot->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6 row">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <label for="costs">Giá </label>
                                                <input type="number" name="cost-pro" placeholder="Nhập giá..." class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            </br></br><label for="">VNĐ</label>

                                        </div>
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
                                    <div class="form-group">
                                        <label for="full_des">Mô tả chi tiết</label>
                                        <textarea rows="5" class="form-control" placeholder="Khoảng 50 từ..." value="" id="des" name="des"></textarea>
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