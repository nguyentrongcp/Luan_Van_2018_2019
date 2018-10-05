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
                        <h5 class="title text-center">CẬP NHẬT LẠI BÀI VIẾT</h5>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="wrapper-prot">
                                <form action="{{route('news.update',[$news->id])}}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="col-md-12 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="title">Tên tiêu đề</label>
                                                <input type="text" class="form-control" name="name-news" id="name-news"
                                                       placeholder="Nhập tiêu đề..." value="{{$news->title}}"
                                                       minlength="5" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="title" for="">Preview hình ảnh</label>

                                            <div class="card-header" style="padding-bottom: 30px">
                                                @foreach (App\ImageNews::where('news_id', $news->id)->get() as $idImage)
                                                    @foreach (App\Image::where('id', $idImage->image_id)->get() as $image)
                                                    <img class="img-list" src="{{asset($image->link)}}" alt="{{$news->title}}">
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <button type="button" class="btn btn-info btn-round " onclick="$('#modal-change-image').modal('show')">
                                                Thay đổi
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="card-header bg-info">
                                            <label class="title text-white lb-info" for="des">Nội dung</label>
                                        </div>
                                        <textarea rows="5" class="form-control"
                                                  name="des">{{$news->content}}</textarea>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{route('news.index')}}" class="btn btn-round">QUAY LẠI</a>
                                        <button type="submit" class="btn btn-info btn-round">LƯU THAY ĐỔI
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
    @include('admin.news.modal')
@endsection

