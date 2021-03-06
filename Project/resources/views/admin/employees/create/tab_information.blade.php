<div class="ui padded stackable grid">
    <div class="eight wide column">
        <div class="inline required field">
            <label class="label-fixed">Họ tên</label>
            <input type="text" name="employee-name" id="employee_name" placeholder="Họ tên"
                   value="Nguyễn Văn A {{rand(1,100)}}" required>
        </div>
        @if($errors->has('employee-name'))
            <div class="message-error">
                {{ $errors->first('employee-name') }}
            </div>
        @endif
        <div class="inline required field">
            <label class="label-fixed">Email</label>
            <input type="email" name="employee-email" value="nvana{{rand(1,100)}}@gmail.com" id="employee-email"
                   placeholder="Email" required>
        </div>
        @if($errors->has('employee-email'))
            <div class="message-error">
                {{ $errors->first('employee-email') }}
            </div>
        @endif

        <div class="inline required field">
            <label class="label-fixed">Mật khẩu</label>
            <input type="password" name="employee-pwd" id="employee_pwd" placeholder="Mật khẩu"
                   value="admin123" required>
        </div>
        <div class="ui error message">
        </div>
        @if($errors->has('employee-pwd'))
            <div class="message-error">
                {{ $errors->first('employee-pwd') }}
            </div>
        @endif
        <div class="inline required field">
            <label class="label-fixed">Nhập lại mật khẩu</label>
            <input type="password" name="employee-confirm-pwd" id="employee_confirm_pwd" placeholder="Nhập lại mật khẩu"
                   value="admin123" required>
        </div>
        <div class="ui error message">
        </div>
        @if($errors->has('employee-confirm-pwd'))
            <div class="message-error">
                {{ $errors->first('employee-confirm-pwd') }}
            </div>
        @endif
        <div class="inline field">
            <label class="label-fixed">Địa chỉ</label>
            <input type="text" name="employee-address" id="employee_address" placeholder="Địa chỉ"
                   value="Ninh Kiều - Cần Thơ">
        </div>
        <div class="ui error message">
        </div>
        <div class="inline required field">
            <label class="label-fixed">Số điện thoại</label>
            <input type="text" name="employee-phone" value="0323456789" id="employee-phone"
                   placeholder="Số điện thoại" required>
        </div>
        @if($errors->has('employee-phone'))
            <div class="message-error">
                {{ $errors->first('employee-phone') }}
            </div>
        @endif
    </div>

    <div class="eight wide column">


        <div class="inline required field">
            <label class="label-fixed">Cấp quyền</label>
            <div class="inline field row">
                <select name="employee-role-id"
                        class="ui six column fluid dropdown">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inline required field">
            <label>Ảnh đại diện</label>
            <label for="avatar">
                <span class="ui blue compact label">Chọn một ảnh</span>
                <span id="avatar-name"></span>
            </label>
            <input type="file" name="avatar" id="avatar" style="display: none;"
                   onchange="$('#avatar-name').text($('#avatar')[0].files[0].name)"
                   accept=".jpg, .png, .jpeg">
        </div>
        @if($errors->has('avatar'))
            <div style="color: red; margin-top: 5px; font-size: 13px">
                {{ $errors->first('avatar') }}
            </div>
        @endif
    </div>
    <div class="ui divider">
    </div>
</div>
    <div class="sixteen wide column">
        <button class="ui blue button" type="submit">
            <i class="save fitted icon"></i>
            Lưu lại
        </button>
    </div>

@push('script')

    <script>
        var pass = document.getElementById("employee-pwd")
            , confirm_pass = document.getElementById("employee-confirm-pwd");

        function validatePass() {
            if (pass.value != confirm_pass.value) {
                confirm_pass.setCustomValidity("Mật khẩu nhập lại không khớp!");
            } else {
                confirm_pass.setCustomValidity('');
            }
        }

        pass.onchange = validatePass;
        confirm_pass.onkeyup = validatePass;
    </script>

@endpush