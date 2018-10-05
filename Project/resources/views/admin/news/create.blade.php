@extends('admin.layouts.master')
@section('title','ADMIN | Tin tức')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-round btn-info text-white" href="{{route('news.index')}}">
                            <i class="fa fa-arrow-circle-left" style="font-size: 18px"></i>TRỞ VỀ</a>
                        <h5 class="title text-center">THÊM MỚI TIN TỨC</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="wrapper-prot">
                                <form action="{{route('news.store')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="title">Tên tiêu đề</label>
                                                <input type="text" class="form-control" name="name-news" id="name-news"
                                                       placeholder="Nhập tiêu đề..." value="Hủ Tiếu nam vang" minlength="5" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="images" class="title">Hình ảnh </label>
                                                <div class="">
                                                    <button class="btn btn-info btn-fab btn-icon btn-round"
                                                            style="cursor: pointer">
                                                        <i class="now-ui-icons ui-1_simple-add"></i>
                                                        <input type="file" id="gallery-avatar-image"
                                                               name="news-image-upload" accept=".jpg, .png, .jpeg">
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="title" for="">Preview hình ảnh</label>
                                            <div class="gallery-avatar-image"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card-header bg-info">
                                            <label class="title text-white lb-info" for="des">Nội dung</label>
                                        </div>
                                        <textarea rows="5" class="form-control"
                                                  name="des"></textarea>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('news.index')}}" class="btn btn-round">QUAY LẠI</a>
                                        <button type="submit" class="btn btn-info btn-round">THÊM MỚI
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection