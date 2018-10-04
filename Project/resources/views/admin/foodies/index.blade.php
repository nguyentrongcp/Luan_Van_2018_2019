@extends('admin.layouts.master')
@section('title','Thực đơn | Fast Foody Shop')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('foodies.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title text-center">DANH SÁCH CÁC THỰC ĐƠN CỦA CỬA HÀNG</h5>
                            <hr>
                            <div class="">
                                <a class="btn btn-info btn-round dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Bộ lọc <i class="fa fa-filter"></i>
                                </a>
                                <select class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                    <label for="">Loại thực đơn</label>
                                    {{--<select class="dropdown-item" name="foody-type" id="foody-type">--}}
                                        @foreach($foodyTypes as $fdt)
                                        <option class="dropdown-item" value="{{$fdt->id}}">{{$fdt->name}}</option>
                                        @endforeach
                                    {{--</select>--}}
                                </select>
                                <a href="{{route('foodies.create')}}" class="btn btn-info btn-round" >
                                    <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                                </a>
                                <button type="submit" class="btn btn-danger btn-round"
                                        onclick="return confirm('Bạn có chắc muốn xóa nó chứ?')">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.foodies.table')

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection