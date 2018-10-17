<!-- Modal edit products type-->
<div class="modal fade" id="modal-change-avatar" tabindex="-1" role="dialog"
     aria-labelledby="list-edit-prot" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title title text-black-50"
                    style="font-size: 16px">CẬP NHẬT ẢNH ĐẠI DIỆN THỰC ĐƠN</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('foody_change_avatar',[$id])}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="images">Hình ảnh đại diện: </label>
                        <div class="">
                            <button class="btn btn-info btn-fab btn-icon btn-round" style="cursor: pointer">
                                <i class="now-ui-icons ui-1_simple-add"></i>
                                <input type="file" id="gallery-avatar-image" name="avatar-image-upload" accept=".jpg, .png, .jpeg">
                            </button>
                        </div>
                        <div class="gallery-avatar-image">
                            <img id='avatar' src="{{asset($avatarFoody)}}" alt="{{$nameFoody}}">
                        </div>
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
<!--  End Modal -->