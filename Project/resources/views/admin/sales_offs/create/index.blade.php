@extends('admin.layouts.master')
@section('title','Khuyến mãi | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('sales_offs.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title"><a href="{{route('sales_offs.index')}} " rel="tooltip" title="Quay lại" data-placement="bottom">KHUYẾN MÃI</a>
                                <i class="fa fa-angle-double-right"></i> {{$sales_name}}</h5>
                            <hr>
                            <div class="add-productType">
                                <button type="button" class="btn btn-info btn-round" onclick="$('#modal-create-sales').modal('show')">
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
                                    @include('admin.sales_offs.create.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
    @include('admin.sales_offs.create.modals')
@endsection