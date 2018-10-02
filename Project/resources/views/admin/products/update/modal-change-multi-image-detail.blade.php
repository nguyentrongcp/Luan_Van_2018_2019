<!-- Modal edit products type-->
<div class="modal fade" id="modal-change-multi-image" tabindex="-1" role="dialog"
     aria-labelledby="list-edit-prot" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title title text-black-50"
                    style="font-size: 16px">CẬP NHẬT ẢNH CHI TIẾT THỰC ĐƠN</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('product_change_multi_image',[$id])}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="images">Hình ảnh chi tiết: </label>
                        <div class="">
                            <button class="btn btn-info btn-fab btn-icon btn-round" style="cursor: pointer">
                                <i class="now-ui-icons ui-1_simple-add"></i>
                                <input type="file" multiple id="gallery-product-image" name="product-image-upload" accept=".jpg, .png, .jpeg">
                            </button>
                        </div>
                        <div class="gallery-product-image"></div>
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