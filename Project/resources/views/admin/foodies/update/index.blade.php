@extends('admin.layouts.master')
@section('title','Chi tiết thực đơn | Admin')

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
                        <form action="{{route('foodies.update',[$id])}}" method="post">
                            {{csrf_field()}}
                            <div class="col-md-12 row">
                                <div class="col-md-5 card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="title text-black-40 lb-info form-group" for="name">Tên thực
                                                đơn: </label>
                                            <input type="text" class="form-control" name="foody-name"
                                                   value="{{$nameFoody}}">

                                        </div>
                                        <div class="form-group">
                                            <label class="title text-black-40 lb-info" for="type">Thuộc
                                                loại: </label>
                                            <select class="form-control" name="foody-type" id="foody-type">
                                                @foreach($foodyTypes as $foodyType)
                                                    <option value="{{$foodyType->id}}"
                                                            {{$foodies->foody_type_id == $foodyType->id ? 'selected':'' }}>{{$foodyType->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="title text-black-40 lb-info" for="type">Giá: </label>
                                            <label class="lb-info ">{{number_format($cost).'đ'}}</label>
                                            <button type="button" class="btn btn-info btn-round"
                                                    onclick="$('#modal-change-cost').modal('show')">Thay đổi
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label class="title text-black-40 lb-info form-group" for="type">Trạng
                                                thái: </label>
                                            @foreach(App\FoodyStatus::where('foody_id',$id)->get() as $foodyStatus)
                                                <select name="foody-status" id="foody-status" class="form-control">
                                                    <option value="0" {{$foodyStatus->status == 0 ? 'selected':''}}>Tạm
                                                        hết
                                                    </option>
                                                    <option value="1" {{$foodyStatus->status == 1 ? 'selected':''}}>Đang
                                                        bán
                                                    </option>
                                                </select>
                                            @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="title text-black-40 lb-info" for="type">Giá cả:&nbsp;&nbsp;&nbsp;</label>
                                            <label for="star">
                                                @component('admin.layouts.components.star_rating')
                                                    {{number_format((float)\App\VoteDetail::where('foody_id',$id)->avg('cost'),2,'.','')}}
                                                @endcomponent
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="title text-black-40 lb-info" for="type">Chất
                                                lượng:&nbsp;&nbsp;&nbsp;</label>
                                            <label for="star">
                                                @component('admin.layouts.components.star_rating')
                                                    {{number_format((float)\App\VoteDetail::where('foody_id',$id)->avg('quality'),2,'.','')}}
                                                @endcomponent
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label class="title text-black-40 lb-info" for="type">Mức độ hài lòng:&nbsp;&nbsp;&nbsp;</label>
                                            <label for="star">
                                                @component('admin.layouts.components.star_rating')
                                                    {{number_format((float)\App\VoteDetail::where('foody_id',$id)->avg('attitude'),2,'.','')}}
                                                @endcomponent
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="img-avatar">
                                        <div class="card-header bg-info">
                                            <label class="text-center title text-white lb-info" for="img-avatar">Hình
                                                ảnh
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
    {{--    @include('admin.foodies.update.modal-change-multi-image-detail')--}}

@endsection
