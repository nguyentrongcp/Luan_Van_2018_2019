@extends('admin.layouts.master')
@section('title','Thêm mới loại ẩm thực')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('foody_type.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title"><a href="{{route('foody_type.index')}} " rel="tooltip" title="Quay lại" data-placement="bottom">LOẠI THỰC ĐƠN</a>
                                <i class="	fa fa-angle-double-right"></i>{{$title_name}}</h5>
                            <hr>
                            <div class="add-productType">
                                <button type="button" class="btn btn-info btn-round" onclick="$('#modal-create-fdt').modal('show')">
                                    <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                                </button>
                                <button type="submit" class="btn btn-danger btn-round"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.foodyTypes.create.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @include('admin.foodyTypes.create.modals')
@endsection