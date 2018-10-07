<!-- Modal create products type-->
<div class="modal fade" id="modal-create-goods-detail" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle">THÊM MỚI CHI TIẾT
                    PHIẾU
                    NHẬP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('goods_receipt_note_detail.store')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="goods-id" value="{{$id}}">
                    <div class="form-group">
                        <label class="title bmd-label-floating">Nguyên liệu</label>
                        <input type="text" class="form-control" name="material"
                               value="Bột gạo" minlength="5" required>
                    </div>
                    {{--<div class="row">--}}
                    <div class="col-md-12">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="title bmd-label-floating">Số lượng</label>
                                    <input type="number" class="form-control" name="amount"
                                           value="10" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="title bmd-label-floating">Đơn vị tính</label>
                                            <div id="available" >
                                                <select class="form-control" name="unit" id="unit-available">
                                                    <option value="Kg">Kg</option>
                                                    <option value="Chai">Chai</option>
                                                    <option value="Thùng">Thùng</option>
                                                    <option value="Gói">Gói</option>
                                                </select>
                                            </div>
                                            {{--<div id="unavailable" style="display: none">--}}
                                                {{--<input type="text" class="form-control" name="unit" id="unit-unavailable" disabled>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        </br>
                                        <button type="button" class="btn btn-icon btn-sm btn-round btn-info btn-unit"
                                                name="btn-unit" onclick="unitHiden()">
                                            ...
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="title bmd-label-floating">Đơn giá</label>
                        <input type="number" class="form-control" name="cost"
                               value="100000" min="10000" required>
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
<script>
    // $('.btn-unit').click( function () {
    //     $('#unit-available').attr("disabled", "true");
    //     $('#unit-unavailable').removeAttr('disabled');
    //
    // });
    function unitHiden() {
        var x = document.getElementById("available");
        var y = document.getElementById("unavailable");

        if (x.style.display === "block" && y.style.display === "none") {
            x.style.display = "none";
            y.style.display = "block";

        } else {
            x.style.display = "block";
            y.style.display = "none";
        }
    }
</script>
<!-- Modal edit products type-->
@foreach($goodsReceiptDetails as $goodsReceiptDetail)
<div class="modal fade" id="modal-update-goods-{{$goodsReceiptDetail->id}}" tabindex="-1" role="dialog"
     aria-labelledby="list-edit-prot" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title title text-black-50 text-center" id="list-edit-prot"
                    style="font-size: 16px">CẬP NHẬT CHI TIẾT PHIẾU NHẬP</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('goods_receipt_note_detail.update',[$goodsReceiptDetail->id])}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="goods-id" value="{{$id}}">
                    <div class="form-group">
                        <label class="title bmd-label-floating">Nguyên liệu</label>
                        <input type="text" class="form-control" name="material"
                               value="{{$goodsReceiptDetail->material}}" minlength="5" required>
                    </div>
                    {{--<div class="row">--}}
                    <div class="col-md-12">
                        <div class="row form-group">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="title bmd-label-floating">Số lượng</label>
                                    @php
                                        $arr = explode(" ",$goodsReceiptDetail->value);
                                    @endphp
                                    <input type="number" class="form-control" name="amount"
                                           value="{{$arr[0]}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="title bmd-label-floating">Đơn vị tính</label>
                                            <div id="available" >
                                                <select class="form-control" name="unit" id="unit-available">
                                                    <option value="">{{$arr[1]}}</option>
                                                </select>
                                            </div>
                                            {{--<div id="unavailable" style="display: none">--}}
                                            {{--<input type="text" class="form-control" name="unit" id="unit-unavailable" disabled>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        </br>
                                        <button type="button" class="btn btn-icon btn-sm btn-round btn-info btn-unit"
                                                name="btn-unit" onclick="unitHiden()">
                                            ...
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--</div>--}}
                    <div class="form-group">
                        <label class="title bmd-label-floating">Đơn giá</label>
                        <input type="number" class="form-control" name="cost"
                               value="{{$goodsReceiptDetail->cost}}" min="10000" required>
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