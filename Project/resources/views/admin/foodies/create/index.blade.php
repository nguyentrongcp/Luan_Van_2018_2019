@extends('admin.layouts.master')
@section('title','Thực đơn | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-round btn-info" rel="tootip" title="QUAY LẠI"
                       data-placement="bottom" href="{{route('foodies.index')}}">
                        <i class="fa fa-arrow-circle-left" style="font-size: 18px"></i> Trở về</a>
                    <h4 class="card-title title text-center">
                        THÊM THỰC ĐƠN MỚI</h4>
                    <span class="show-message">
                                @include('admin.layouts.components.success')
                        @include('admin.layouts.components.error')
                            </span>
                </div>
                <div class="card-body">
                    <form action="{{route('foodies.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-12 row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12 form-group">
                                            <label class="title text-black-50 lb-info" for="name">Tên thực đơn</label>
                                            <input type="text" name="name-foody" placeholder="Nhập tên thực đơn..."
                                                   value="{{ old('name-foody') }}" class="form-control">
                                            @if($errors->has('name-foody'))
                                                <div style="color: red; margin-top: 5px; padding-left: 20px;font-size: 13px">
                                                    {{ $errors->first('name-foody') }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="title text-black-50 lb-info" for="type">Thuộc loại</label>
                                            <select name="name-type" id="name-type" class="form-control"
                                                    style="border-radius: 30px">
                                                @foreach($foodyTypes as $fdt)
                                                    <option name="foody-type-id"
                                                            value="{{$fdt->id}}">{{$fdt->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group row">
                                            <div class="col-10">
                                                <label class="title text-black-50 lb-info" for="costs">Giá </label>
                                                <input type="number" name="cost-foody" placeholder="Nhập giá..."
                                                       value="{{ old('cost-foody') }}" class="form-control">
                                            </div>
                                            <div class="col-2">
                                                <label></br></br>VNĐ</label>
                                            </div>
                                            @if($errors->has('cost-foody'))
                                                <div style="color: red; margin-top: 5px;padding-left: 20px; font-size: 13px">
                                                    {!! $errors->first('cost-foody')!!}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-footer text-warning text-center">
                                        <strong>Lưu ý:</strong>
                                        Giá tiền <strong>không vượt quá</strong> 100,000,000<sup>đ</sup> hoặc
                                        <strong>nhỏ hơn</strong> 1,000<sup>đ</sup>.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12 form-group">
                                    <div class="card-header bg-info">
                                        <label class="title text-white lb-info" for="images">Hình ảnh đại diện </label>
                                    </div>
                                    <div class="">
                                        <button class="btn btn-info btn-fab btn-icon btn-round" style="cursor: pointer">
                                            <i class="now-ui-icons ui-1_simple-add"></i>
                                            <input type="file" id="gallery-avatar-image" name="avatar-image-upload"
                                                   accept=".jpg, .png, .jpeg">
                                        </button>
                                    </div>
                                    <div class="gallery-avatar-image">
                                        <img id='avatar' src="" alt="">
                                    </div>
                                    @if($errors->has('avatar-image-upload'))
                                        <div style="color: red; margin-top: 5px;padding-left: 20px; font-size: 13px">
                                            {!! $errors->first('avatar-image-upload')!!}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="card-header bg-info">
                                <label class="title text-white lb-info" for="des">Mô tả chi tiết</label>
                            </div>
                            <textarea rows="5" class="form-control" value="" id="des" name="des"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-round">QUAY LẠI</button>
                            <button type="submit" class="btn btn-info btn-round">THÊM MỚI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection