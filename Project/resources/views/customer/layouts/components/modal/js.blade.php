@push('script')
    <script>
        $(document).ready(function(){
            $('#login-modal').modal({
                dismissible: false,
                opacity: 0.8
            });
            $('#confirm-modal').modal({
                dismissible: false,
                opacity: 0.8
            });
            $('#notify-modal').modal({
                dismissible: false,
                opacity: 0.8
            });
            $('#require-modal').modal({
                opacity: 0.8
            });
        });

        // login modal
        $('#login-modal-button').on('click', function () {
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
        $('#username-login').on('keyup', function (e) {
            if (e.keyCode == 13) {
                $('#password-login').focus();
            }
        });
        $('#password-login').on('keyup', function (e) {
            if (e.keyCode == 13) {
                $('#login-modal-button').click();
            }
        });

        // login require

        $('#require-modal-button').on('click', function () {
            $('#require-modal').modal('close');
            $('#login-modal').modal('open');
        });
    </script>
@endpush