<div id="login-modal" class="modal">
    <div class="modal-content">
        <h5 class="modal-header">Đăng nhập</h5>
        <div class="input-field col s12">
            <input id="username-login" type="text" name="username" value="nguyennguyencp@gmail.com">
            <label for="username-login" class="active">Email</label>
            <span id="username-login-error"></span>
        </div>

        <div class="input-field col s12">
            <input id="password-login" type="password" name="password" value="635982359">
            <label for="password-login" class="active">Mật khẩu</label>
            <span id="password-login-error"></span>
        </div>

        <div class="col s12">
            Bạn chưa có tài khoản? <a href="{{ route('customer.register.show') }}">Đăng ký ngay</a>
        </div>

        <div class="modal-action">
            <a  class="waves-effect waves-light btn red lighten-2 modal-close">Hủy bỏ</a>
            <a class="waves-effect waves-light btn" id="login-modal-button">Đăng nhập</a>
        </div>

    </div>
</div>