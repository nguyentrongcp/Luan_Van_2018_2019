<!-- Modal create foodies type-->
<div class="modal fade" id="modal-add-goods" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle">THÊM MỚI PHIẾU
                    NHẬP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="bmd-label-floating">Ngày lập phiếu</label>
                        <input type="date" class="form-control" name="date"
                               minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nguyên liệu</label>
                        <select name="goods[]" multiple id="goods" class="form-control">
                            <option value="">1233</option>
                            <option value="">1233</option>
                            <option value="">1233</option>

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button class="btn btn-info btn-round">
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
    <div class="modal fade" id="modal-update-goods" tabindex="-1" role="dialog"
         aria-labelledby="list-edit-prot" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title title text-black-50 text-center" id="list-edit-prot"
                        style="font-size: 16px">CẬP NHẬT LOẠI THỰC ĐƠN</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="bmd-label-floating">Ngày lập phiếu</label>
                            <input type="date" class="form-control" name="date"
                                   minlength="5" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button class="btn btn-info btn-round">LƯU LẠI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--@endforeach--}}
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