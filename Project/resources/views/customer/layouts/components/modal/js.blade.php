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
            let top = 0;
            if ($('#profile-modal').height() < $(window).height()) {
                top = ($(window).height() - $('#profile-modal').height()) / 2;
                $('#profile-modal').css('top', top + 'px');
            }
            $('#profile-modal').modal({
                dismissible: false,
                opacity: 0.8,
                endingTop: top + 'px',
                onCloseEnd: function () {
                    $('#pass-old-pro, #pass-pro, #pass-confirm-pro').attr('disabled', '');
                }
            });
            $(window).resize(function () {
                let top = 0;
                if ($('#profile-modal').height() < $(window).height()) {
                    top = ($(window).height() - $('#profile-modal').height()) / 2;
                }
                $('#profile-modal').css('top', top + 'px');
                // $('#profile-modal').modal({
                //     dismissible: false,
                //     opacity: 0.8,
                //     endingTop: top + 'px'
                // });
            });
        });

        // login modal
        $('#login-modal-button').on('click', function () {
            $('#username-login-error').empty();
            $('#password-login-error').empty();
            if ($('#username-login').val() === '') {
                $('#username-login-error').html("<span id=\"username-login-error\" class=\"helper-text red-text\">" +
                    "Bạn chưa nhập email!</span>");
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

        // profile modal

        @php $customer = Auth::guard('customer')->user(); @endphp

        $('#password-change').on('click', function () {
            $('#pass-old-pro, #pass-pro, #pass-confirm-pro').removeAttr('disabled');
            $('#pass-old-pro').focus();
        });
        $('#profile-upload').on('click', function () {
            $('#profile-upload-input').click();
        });
        @if(Auth::guard('customer')->check())
            $('#profile-avatar-preview').on('error', function () {
                M.Toast.dismissAll();
                M.toast({
                    html: "<i class='material-icons left red-text'>error_outline</i> Hình ảnh không hợp lệ!"
                });
                $(this).attr('src', '{{ asset($customer->avatar) }}');
            });
            $('#profile-cancel').on('click', function () {
                $('#pass-pro').val('');
                $('#pass-old-pro').val('');
                $('#pass-confirm-pro').val('');
                $('#profile-avatar-preview').attr('src', '{{ asset($customer->avatar) }}');
                $('#name-pro').val('{{ $customer->name }}');
                $('#gender-pro').val('{{ $customer->gender }}');
                $('#gender-pro').formSelect();
            });
        @endif
        $('#profile-upload-input').on('input', function () {
            let input = this;
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile-avatar-preview').attr('src', e.target.result);
                    $('#profile-avatar-preview').hide();
                    $('#profile-avatar-preview').fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
        $('#profile-action').on('click', function () {
            if ($('#name-pro').val() === '') {
                $('#name-pro-error').text('Vui lòng không bỏ trống họ tên!');
                return false;
            }
            if ($('#pass-old-pro').val() !== '' || $('#pass-pro').val() !== '' || $('#pass-confirm-pro').val() !== '') {
                if ($('#pass-old-pro').val() === '') {
                    $('#pass-old-pro-error').text('Vui lòng không bỏ trống mật khẩu cũ!');
                    return false;
                }
                if ($('#pass-pro').val() === '') {
                    $('#pass-pro-error').text('Vui lòng không bỏ trống mật khẩu mới');
                    return false;
                }
                if ($('#pass-confirm-pro').val() === '') {
                    $('#pass-confirm-pro-error').text('Vui lòng xác nhận lại mật khẩu mới!');
                    return false;
                }
            }
            $.ajax({
                type: 'post',
                url: '{{ route('customer.profile.change') }}',
                data: {
                    name: $('#name-pro').val(),
                    gender: $('#gender-pro').val(),
                    old_pass: $('#pass-old-pro').val(),
                    pass: $('#pass-pro').val(),
                    pass_confirm: $('#pass-confirm-pro').val(),
                    avatar: $('#profile-avatar-preview').attr('src')
                },
                success: function (data) {
                    console.log(data);
                    if (data.status === 'success') {
                        $('#name-pro').val(data.name);
                        $('#gender-pro').val(data.gender);
                        $('#gender-pro').formSelect();
                        $($('#dropdown-profile b')[0]).text(data.name);
                        $($('#dropdown-profile img')[0]).attr('src', data.avatar);
                        $('#profile-modal').modal('close');
                        M.toast({
                            html: "<i class='material-icons left green-text'>check</i> Cập nhật tài khoản thành công"
                        })
                    }
                    else {
                        $.each(data.errors, function (key, value) {
                            $('#' + key + '-pro-error').text(value);
                        });
                    }
                }
            })
        });
        $('#name-pro').on('input', function () {
            $('#name-pro-error').text('');
        });
        $('#pass-pro').on('input', function () {
            $('#pass-pro-error').text('');
        });
        $('#pass-old-pro').on('input', function () {
            $('#pass-old-pro-error').text('');
        });
        $('#pass-confirm-pro').on('input', function () {
            $('#pass-confirm-pro-error').text('');
        });

    </script>
@endpush