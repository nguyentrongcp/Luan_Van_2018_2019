<!-- Modal create goods receipt notes-->
<div class="modal fade" id="modal-create-goods" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-size">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle">THÊM MỚI PHIẾU
                    NHẬP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('goods_receipt_note.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="title bmd-label-floating">Ngày lập phiếu</label>
                        <input type="date" class="form-control" name="date"
                               value="{{date('Y-m-d')}}" required>
                        <!-- input with datepicker -->
                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control date-picker" value="10/05/2016" data-datepicker-color="primary">--}}
                        {{--</div>--}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" class="btn btn-info btn-round">
                            LƯU LẠI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End modal-->

<!-- Modal edit foodies type-->
@foreach($goodsReceipts as $goods)
    <div class="modal fade" id="modal-update-goods-{{$goods->id}}" tabindex="-1" role="dialog"
         aria-labelledby="list-edit-prot" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-size">
                <div class="modal-header text-center">
                    <h3 class="modal-title title text-black-50 text-center" id="list-edit-prot"
                        style="font-size: 16px">CẬP NHẬT PHIẾU NHẬP</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('goods_receipt_note.update',[$goods->id])}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="title bmd-label-floating">Ngày lập phiếu</label>
                            <input type="date" class="form-control" name="date"
                                   value="{{date('Y-m-d')}}" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-info btn-round">LƯU LẠI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
<!--  End Modal -->

<!--  Modal delete -->
{{--@foreach($productTypes as $prot)--}}
    {{--<div class="modal fade" id="modal-del-prot-{{$prot->id}}" tabindex="-1" role="dialog" aria-labelledby="delete"--}}
         {{--aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title title " id="delete">Bạn chắc chắn muốn xóa phải không?</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p class="text-black-50">Các dữ liệu liên quan đến <strong> {{$prot->name}} </strong>sẽ bị xóa hoàn--}}
                        {{--toàn. Bạn cần suy nghĩ trước khi xóa?</p>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<form action="{{route('product_type.destroy',[0])}}" method="post">--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<input type="hidden" name="product-type-id" value="{{ $prot->id }}">--}}
                        {{--<button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>--}}
                        {{--<button type="submit" class="btn btn-info btn-round">OK</button>--}}
                    {{--</form>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endforeach--}}
<!--  End Modal -->