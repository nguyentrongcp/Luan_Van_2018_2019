@extends('admin.layouts.master')
@section('title','Chi tiết phiếu nhập | Fast Foody Shop')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('goods_receipt_note_detail.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="goods-id" value="{{$id}}">
                        <div class="card-header">
                            <a class="title" rel="tooltip" title="Trang quản lý nhập hàng" data-placement="bottom"
                               href="{{route('goods_receipt_note.index')}}">
                                <i class="fa fa-chevron-circle-left btn btn-info btn-round"></i>
                            </a>
                            <label for=""class="title text-black-50" style="font-size: 16px">PHIẾU NHẬP NGÀY {{$date}} - {{$name}}</label>
                            <div class="text-right" style="padding-right: 50px;font-size: 20px">
                                <label class="title text-success" for="">Tổng tiền: {{number_format($totalCost)}} đ</label>
                            </div>
                            <hr>
                            <div class="add-goods">
                                <button type="button" onclick="$('#modal-create-goods-detail').modal('show')" class="btn btn-info btn-round" >
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
                                    @include('admin.goods_receipt.indexDetails.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
        @include('admin.goods_receipt.indexDetails.modals')
@endsection