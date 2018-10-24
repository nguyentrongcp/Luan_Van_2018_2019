<div class="ui mini vertical flip modal" id="change-logo-modal">
    <i class="close icon"></i>
    <div class="blue header">Cập nhật logo</div>
    <div class="content">
        <form action="{{ route('shop_change_logo',[1])}}" class="ui form" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <div class="field">
                <label for="sales-offs-name">Logo</label>
                <input type="file" class="hidden" id="logo" name="logo-upload" accept=".jpg, .png, .jpeg">
            </div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>