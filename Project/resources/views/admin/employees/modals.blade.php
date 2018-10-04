<!-- Modal create employee-->
<div class="modal fade" id="modal-add-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle">THÊM NHÂN VIÊN MỚI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="bmd-label-floating">Họ và tên</label>
                        <input type="text" class="form-control" name="name-emp"
                               placeholder="Nhập họ tên..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Số điện thoại</label>
                        <input type="text" class="form-control" name="number-phone"
                               placeholder="Nhập số điện thoại..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="text" class="form-control" name="email"
                               placeholder="Nhập email..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Mật khẩu</label>
                        <input type="password" class="form-control" name="pass"
                               placeholder="Nhập mật khẩu..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="pass-confirm"
                               placeholder="Nhập lại mật khẩu..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Cấp quyền</label>
                        <select class="form-control">
                            <option value="">adadd</option>
                            <option value="">adadd</option>
                            <option value="">adadd</option>

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

<!-- Modal create employee-->
<div class="modal fade" id="modal-change-pwd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle">ĐỔI MẬT KHẨU MỚI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="bmd-label-floating">Nhập mật khẩu mói</label>
                        <input type="password" class="form-control" name="pass-new"
                               placeholder="Nhập mật khẩu..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="pass-confirm"
                               placeholder="Nhập lại mật khẩu..." minlength="5" required>
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

<!-- Edit employee-->
<div class="modal fade" id="modal-edit-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle">THÊM NHÂN VIÊN MỚI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="bmd-label-floating">Họ và tên</label>
                        <input type="text" class="form-control" name="name-emp"
                               placeholder="Nhập họ tên..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Số điện thoại</label>
                        <input type="text" class="form-control" name="number-phone"
                               placeholder="Nhập số điện thoại..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="text" class="form-control" name="email"
                               placeholder="Nhập email..." minlength="5" required>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating">Cấp quyền</label>
                        <selector>
                            <option value="">adadd</option>
                            <option value="">adadd</option>
                            <option value="">adadd</option>

                        </selector>
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

{{--<!--  Modal delete -->--}}
{{--@foreach($productTypes as $prot)--}}
    {{--<div class="modal fade" id="modal-del-prot-{{$prot->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title title " id="delete">Bạn chắc chắn muốn xóa phải không?</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p class="text-black-50">Các dữ liệu liên quan đến <strong> {{$prot->name}} </strong>sẽ bị xóa hoàn toàn. Bạn cần suy nghĩ trước khi xóa?</p>--}}
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
{{--<!--  End Modal -->--}}