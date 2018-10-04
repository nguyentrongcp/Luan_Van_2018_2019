<!-- Modal create foodies type-->
<div class="modal fade" id="modal-add-fdt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50" id="exampleModalCenterTitle">THÊM LOẠI MỚI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('add_new.store')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="bmd-label-floating">Tên loại sản phẩm</label>
                        <input type="text" class="form-control" name="name-type" id="name-type"
                               placeholder="Nhập tên loại..." minlength="5" required>
                        <input type="hidden" value="{{$id}}" name="id-type">
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
@foreach($foodyTypes as $fdt)
    <div class="modal fade" id="modal-update-fdt-{{$fdt->id}}" tabindex="-1" role="dialog"
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
                      <form action="{{route('add_new.update',[$fdt->id])}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="bmd-label-floating">Tên loại sản phẩm</label>
                            <input type="text" class="form-control" name="name-type" id="name-type"
                                   value="{{$fdt->name}}" minlength="5" required>
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
@endforeach
<!--  End Modal -->

<!--  Modal delete -->
@foreach($foodyTypes as $fdt)
    <div class="modal fade" id="modal-del-fdt-{{$fdt->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title " id="delete">Bạn chắc chắn muốn xóa phải không?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-black-50">Các dữ liệu liên quan đến <strong> {{$fdt->name}} </strong>sẽ bị xóa hoàn toàn. Bạn cần suy nghĩ trước khi xóa?</p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('add_new.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="foody-type-id" value="{{ $fdt->id }}">
                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                        <button type="submit" class="btn btn-info btn-round">OK</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endforeach
<!--  End Modal -->