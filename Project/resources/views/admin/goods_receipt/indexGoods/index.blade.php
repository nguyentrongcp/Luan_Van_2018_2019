@extends('admin.layouts.master')
@section('title','Nhập hàng | Fast Foody Shop')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('goods_receipt_note.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title text-center">QUẢN LÝ NHẬP HÀNG</h5>
                            <hr>
                            <div class="add-goods">
                                <button type="button" onclick="$('#modal-create-goods').modal('show')" class="btn btn-info btn-round" >
                                    <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                                </button>
                                <button type="submit" class="btn btn-danger btn-round"
                                        onclick="return confirm('Bạn có chắc muốn xóa nó chứ?')">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.goods_receipt.indexGoods.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @include('admin.goods_receipt.indexGoods.modals')
@endsection