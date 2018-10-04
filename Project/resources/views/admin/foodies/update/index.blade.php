@extends('admin.layouts.master')
@section('title','ADMIN | Thực đơn')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-round btn-info text-white" href="{{route('foodies.index')}}">
                            <i class="fa fa-arrow-circle-left" style="font-size: 18px"></i>TRỞ VỀ</a>
                        <h4 class="card-title title text-center">THÔNG TIN CHI TIẾT THỰC ĐƠN</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="col-md-12 row">
                                <div class="col-md-5 card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="name">Tên thực
                                                        đơn: </label>
                                                </td>
                                                <td>
                                                    <label class="lb-info">{{$nameFoody}}</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="type">Thuộc
                                                        loại: </label>
                                                </td>
                                                <td>
                                                    <label class="lb-info">{{$nameTypeFoody}}</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="cost">Giá: </label>
                                                </td>
                                                <td>
                                                    <label class="lb-info">{{number_format($cost).'đ'}}</label>
                                                    <button type="button" class="btn btn-info btn-round"
                                                            onclick="$('#modal-change-cost').modal('show')">Thay đổi
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="type">Chất lượng</label>
                                                </td>
                                                <td>
                                                    <label for="star">
                                                        <i class="fa fa-star star-rating"></i>
                                                        <i class="fa fa-star star-rating"></i>
                                                        <i class="fa fa-star star-rating"></i>

                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="type">Giá cả </label>
                                                </td>
                                                <td>
                                                    <label for="star">
                                                        <i class="fa fa-star star-rating"></i>
                                                        <i class="fa fa-star star-rating"></i>
                                                        <i class="fa fa-star star-rating"></i>

                                                    </label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="type">Thái độ phục vụ</label>
                                                </td>
                                                <td>
                                                    <label for="star">
                                                        <i class="fa fa-star star-rating"></i>
                                                        <i class="fa fa-star star-rating"></i>
                                                        <i class="fa fa-star star-rating"></i>

                                                    </label>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                        <div class="img-avatar">
                                            <div class="card-header bg-info">
                                                <label class="text-center title text-white lb-info" for="img-avatar">Hình ảnh
                                                    đại
                                                    diện</label>
                                            </div>
                                            <div class="gallery">
                                                <img src="{{asset($avatarFoody)}}" alt="{{$nameFoody}}">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-info btn-round"
                                                onclick="$('#modal-change-avatar').modal('show')">Thay đổi
                                        </button>

                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="card-header bg-info">
                                        <label class="title text-white lb-info" for="des">Mô tả chi tiết</label>
                                    </div>
                                    <textarea rows="5" class="form-control"
                                              name="des">{!! $describe !!}</textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-round">QUAY LẠI
                                    </button>
                                    <button type="submit" class="btn btn-info btn-round">LƯU
                                        THAY
                                        ĐỔI
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.foodies.update.modal-change-cost')
    @include('admin.foodies.update.modal-change-avatar')
    @include('admin.foodies.update.modal-change-multi-image-detail')

@endsection
