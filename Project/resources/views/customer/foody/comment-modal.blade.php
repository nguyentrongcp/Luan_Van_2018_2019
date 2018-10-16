<div id="foody-comment-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h5 class="modal-header center-align">Bình luận</h5>
        <div class="input-field col s12">
            <input id="comment-modal-title" name="title" type="text">
            <label for="comment-modal-title">Tiêu đề</label>
            <span id="comment-modal-title-error"></span>
        </div>
        <div class="input-field col s12 comment-modal-content">
            <textarea id="comment-modal-content" name="content" class="materialize-textarea"></textarea>
            <label for="comment-modal-content">Nội dung</label>
            <span id="comment-modal-content-error"></span>
        </div>

    </div>
    <div id="comment-modal-image" class="col s12">
        <div class="comment-modal-next" onclick="previousImage()" style="width: 24px">
            <i id="comment-modal-before" class="material-icons hide">navigate_before</i>
        </div>
        <div class="comment-modal-add-image" id="comment-add-image">
            <div class="blue-grey lighten-3">
                <i class="material-icons">add_a_photo</i>
            </div>
        </div>
        <input onchange="uploadImage(this)" id="comment-input-file" class="hide" type="file"
               accept=".png, .jpg, .jpeg" multiple>
        {{--<div class='comment-modal-image'>--}}
            {{--<img src="{{ asset($foody->avatar) }}">--}}
            {{--<i class='material-icons'>clear</i>--}}
        {{--</div>--}}
        <div id="comment-modal-image-location" style="display: inline-flex">

        </div>
        <div class='comment-modal-next hide' id='comment-modal-next' data-active="false">
            <i class='material-icons' onclick="nextImage()">navigate_next</i>
        </div>
    </div>
    <div class="modal-footer">
        <a class="modal-close waves-effect waves-light red lighten-2 btn">Thoát</a>
        <a id="testtest" class="waves-effect waves-light btn" onclick="uploadToServer({{ $foody->id }})">Đăng bài</a>
    </div>
</div>