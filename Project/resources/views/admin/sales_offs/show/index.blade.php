@extends('admin.layouts.master')
@section('title','Chi tiết khuyến mãi | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('sales_offs_details.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title"><a href="{{route('sales_offs.index')}} " rel="tooltip" title="Quay lại" data-placement="bottom">
                                    {{App\SalesOff::find($id)->name}}</a>
                                <i class="fa fa-angle-double-right"></i> Thực đơn ưu đãi </h5>
                            <hr>
                            <div class="add-productType">
                                <button type="button" class="btn btn-info btn-round" onclick="$('#modal-add-foody-sales').modal('show')">
                                    <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                                </button>
                                <button type="submit" class="btn btn-danger btn-round"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                            <span class="show-message">
                                @include('admin.layouts.components.success')
                                @include('admin.layouts.components.error')
                            </span>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.sales_offs.show.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @include('admin.sales_offs.show.modals')
@endsection