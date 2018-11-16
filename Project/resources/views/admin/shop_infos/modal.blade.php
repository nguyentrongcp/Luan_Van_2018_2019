<div class="ui mini vertical flip modal" id="change-logo-modal">
    <i class="close icon"></i>
    <div class="blue header">Cập nhật logo</div>
    <div class="content">
        <form action="{{ route('shop_change_logo',[1])}}" class="ui form" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="required field">
                <label>Logo</label>
                <label for="logo">
                    <span class="ui blue compact label">Chọn một ảnh</span>
                    <span id="logo-name"></span>
                </label>
                <input type="file" name="logo" id="logo" style="display: none;"
                       onchange="$('#logo-name').text($('#logo')[0].files[0].name)"
                       accept=".jpg, .png, .jpeg">
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>