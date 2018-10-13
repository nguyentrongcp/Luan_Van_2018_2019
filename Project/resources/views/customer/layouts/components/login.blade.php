<div id="login-modal" class="modal mini-modal">
    <div class="modal-content">
        <h5 class="modal-header">Đăng nhập</h5>
        <div class="input-field col s12">
            <input id="username-login" type="text" name="username">
            <label for="username-login" class="active">Tài khoản</label>
            <span id="username-login-error"></span>
        </div>

        <div class="input-field col s12">
            <input id="password-login" type="password" name="password">
            <label for="password-login" class="active">Mật khẩu</label>
            <span id="password-login-error"></span>
        </div>

        <button class="waves-effect waves-light btn" id="customer-login-submit">Đăng nhập</button>
    </div>
</div>

<style>
    .input-field {
        margin-top: 0;
    }
</style>

@push('script')
    <script>
        $(document).ready(function(){
            // M.updateTextFields();
        });
        $('#customer-login-submit').on('click', function () {
            $('#username-login-error').empty();
            $('#password-login-error').empty();
            if ($('#username-login').val() === '') {
                $('#username-login-error').html("<span id=\"username-login-error\" class=\"helper-text red-text\">" +
                    "Bạn chưa nhập tài khoản!</span>");
            }
            else if ($('#password-login').val() === '') {
                $('#password-login-error').html("<span id=\"password-login-error\" class=\"helper-text red-text\">" +
                    "Bạn chưa nhập mật khẩu!</span>");
            }
            else {
                $.ajax({
                    type: 'post',
                    url: '/customer/login',
                    data: {
                        username: $('#username-login').val(),
                        password: $('#password-login').val()
                    },
                    success: function (data) {
                        console.log(data.errors);
                        if (data.status === 'username_error') {
                            $('#username-login-error').html("<span id=\"username-login-error\" class=\"helper-text red-text\">" +
                                data.errors + "</span>");
                        }
                        else if (data.status === 'password_error') {
                            $('#password-login-error').html("<span id=\"password-login-error\" class=\"helper-text red-text\">" +
                                data.errors + "</span>");
                        }
                        else {
                            location.reload();
                        }
                    }
                });
            }
        });
    </script>
@endpush