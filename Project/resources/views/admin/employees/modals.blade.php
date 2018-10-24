@foreach($employees as $stt => $employee)
    <div class="ui mini-40 vertical flip modal" id="{{ "modal-reset-pwd-" . $employee->id }}">
        <div class="blue header">Đặt lại mật khẩu</div>
        <div class="content">
            <form action="{{ route('reset_pass', [$employee->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}
                <div class="field">
                    <label>Mật khẩu cũ</label>
                    <input type="password" name="old-pwd"
                           minlength="6" maxlength="30" required>
                </div>
                <div class="field">
                    <label>Mật khẩu mới</label>
                    <input type="password" name="new-pwd"
                           minlength="6" maxlength="30" required>
                </div>

                <div class="field">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" name="confirm-pwd"
                           minlength="6" maxlength="30" required>
                </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>OK</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach


@foreach($employees as $stt => $employee)
    <div class="ui mini-50 vertical flip modal" id="{{ "update-employee-modal-" . $employee->id }}">
        <div class="blue header">Cập nhật thông tin nhân viên</div>
        <div class="content">
            <form action="{{ route('employees.update', [$employee->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label>Tên nhân viên</label>
                    <input type="text" value="{{ $employee->name }}" name="employee-name"
                           maxlength="50" required>
                </div>

                <div class="field">
                    <label>Email</label>
                    <input type="email" value="{{ $employee->email }}" name="employee-email"
                           maxlength="100" required>
                </div>

                <div class="field">
                    <label>Số điện thoại</label>
                    <input type="text" value="{{ $employee->phone }}" name="employee-phone"
                           maxlength="10" required>
                </div>
                <div class="field">
                    <label>Địa chỉ</label>
                    <input type="text" value="{{ $employee->address }}" name="employee-address"
                           maxlength="100" required>
                </div>
                    <div class="field">
                        <label for="role">Phân quyền</label>
                        <select name="employee-role-id"
                                class="ui fluid dropdown">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}"
                                {{$employee->role_id == $role->id ? 'selected':''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="field">
                    <button class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach

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