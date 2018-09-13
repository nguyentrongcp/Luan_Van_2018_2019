<!-- Modal add product type-->
<div class="modal fade" id="modal-add-prot" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50" id="exampleModalCenterTitle">Thêm loại mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('product_type.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="bmd-label-floating">Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="name-type" id="name-type"
                               placeholder="Nhập tên loại..." minlength="5" required>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label class="bmd-label-floating">Mô tả</label>--}}
                        {{--<textarea class="form-control" name="des" id="des" placeholder="Nhập nội dung..."--}}
                                  {{--rows="5"></textarea>--}}
                    {{--</div>--}}
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

{{--<!--Modal view list info-->--}}
{{--@foreach($productTypes as $prot)--}}
{{--<div class="modal fade" id="modal-info-prot-{{$prot->id}}" tabindex="-1" role="dialog"--}}
     {{--aria-labelledby="list-info-prot" aria-hidden="true">--}}
    {{--<div class="modal-dialog" role="document" style="max-width: 80%; min-height: 30%;">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header text-center">--}}
                {{--<h5 class="modal-title text-black-50 title" id="list-info-prot">{{$prot->name}}</h5>--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<div class="table">--}}
                    {{--<table class="table" id="info-table">--}}
                        {{--<thead class="bg-info" style="font-size: 12px; color: #ffffff;">--}}
                        {{--<th class="text-center">STT</th>--}}
                        {{--<th >TÊN SẢN PHẨM</th>--}}
                        {{--<th>MÔ TẢ SƠ LƯỢT</th>--}}
                        {{--</thead>--}}
                        {{--<tbody>--}}
                        {{--@foreach(App\Product::where('product_type_id',$prot->id)->get() as $stt => $rsp)--}}
                            {{--<tr>--}}
                                {{--<td class="text-center">{{$stt +1}}</td>--}}
                                {{--<td>{{$rsp->name}}</td>--}}
                                {{--<td>--}}
                                    {{--{{$rsp->describe}}--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--</tbody>--}}
                    {{--</table>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>--}}
                    {{--<span></span>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--<!--  End Modal -->--}}

<!-- Modal edit product type-->
@foreach($productTypes as $prot)
    <div class="modal fade" id="modal-update-prot-{{$prot->id}}" tabindex="-1" role="dialog"
         aria-labelledby="list-edit-prot" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title title text-black-50" id="list-edit-prot"
                        style="font-size: 16px">CẬP NHẬT LOẠI PHẨM</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product_type.update',[$prot->id])}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="bmd-label-floating">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" name="name-type" id="name-type"
                                   value="{{$prot->name}}" minlength="5" required>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label class="bmd-label-floating">Mô tả</label>--}}
                            {{--<textarea class="form-control" name="des" id="des" rows="5"> </textarea>--}}
                        {{--</div>--}}
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
    @endforeach
<!--  End Modal -->

<!--  Modal delete -->
@foreach($productTypes as $prot)
    <div class="modal fade" id="modal-del-prot-{{$prot->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title " id="delete">Bạn chắc chắn muốn xóa phải không?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-black-50">Các dữ liệu liên quan đến <strong> {{$prot->name}} </strong>sẽ bị xóa hoàn toàn. Bạn cần suy nghĩ trước khi xóa?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('product_type.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="product-type-id" value="{{ $prot->id }}">
                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                        <button type="submit" class="btn btn-info btn-round">OK</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!--  End Modal -->