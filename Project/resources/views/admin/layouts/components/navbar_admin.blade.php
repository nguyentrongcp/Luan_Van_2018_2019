<div href="" class="ui dropdown item">
    <img id="admin-avt" style="height: 35px" src="{{ asset(\App\Admin::adminAvatar()) }}"
         class="ui mini circular image">
    <strong>&nbsp;&nbsp;&nbsp; {{ \App\Admin::adminName() }}</strong>
    <i class="dropdown icon"></i>
    <div class="menu">
        <a onclick="$('#modal-edit-info').modal('show')" class="item">
            <i class="edit icon"></i>Cập nhật thông tin</a>

        <a onclick="$('#modal-change-password').modal('show')" class="item">
            <i class="edit icon"></i>Đổi mật khẩu</a>

        <a href="{{ route('admin.logout') }}" class="item">
            <i class="sign out icon"></i>Đăng xuất</a>

        @include('admin.layouts.components.modals_edit')
        @include('admin.layouts.components.modal_change_password')
        @include('admin.layouts.components.error_msg')
    </div>
</div>