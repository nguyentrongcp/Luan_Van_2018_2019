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
    </div>

    <div class="eight wide column">
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
            <label class="label-fixed">Số điện thoại</label>
            <input type="text" name="employee-phone" value="0323456789" id="employee-phone"
                   placeholder="Số điện thoại" required>
        </div>
        @if($errors->has('employee-phone'))
            <div class="message-error">
                {{ $errors->first('employee-phone') }}
            </div>
        @endif
        <div class="inline required field">
            <label class="label-fixed">Cấp quyền</label>
            <div class="two column row">
                {{--<div class="column">--}}
                    <select name="employee-role-id"
                            class="ui six column fluid dropdown">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                {{--</div>--}}
                {{--<div class="wide column">--}}
                    <a href="#" onclick="$('#add-employee-role-modal').modal('show')" class="ui blue mini button a-decoration">
                        <i class="dot fitted icon"></i> ...
                    </a>
                </div>
            </div>
        </div>
        <div class="ui divider">
        </div>
    </div>
    <div class="row">
        <div class="sixteen wide column">
            <button class="ui blue button" type="submit">
                <i class="save fitted icon"></i>
                Lưu lại
            </button>
        </div>
    </div>
</div>
@include('admin.employees.create.modal')
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