@php $customer = Auth::guard('customer')->user(); @endphp

<div id="profile-modal" class="modal">
    <div class="modal-content">
        <h5 class="modal-header">Cập nhật tài khoản</h5>
        <div class="col s12 profile-title">
            Cập nhật thông tin
        </div>
        <div class="row">
            <div class="profile-avatar">
                <img id="profile-avatar-preview" src="{{ asset($customer->avatar) }}">
                <input id="profile-upload-input" class="hide" type="file" accept=".jpg, .png, .jpeg">
                <div>
                    <i id="profile-upload" class="material-icons center">photo_camera</i>
                </div>
                {{--<a class="btn btn-fluid">Thay đổi</a>--}}
            </div>
            <div class="input-field profile-name">
                <input id="name-pro" type="text" name="name" value="{{ $customer->name }}">
                <label for="name-pro">Họ tên</label>
                <span id="name-pro-error" class="helper-text red-text"></span>
            </div>
            <div class="input-field profile-gender">
                <select id="gender-pro">
                    <option value='male'>Nam</option>
                    <option value='female' {{ $customer->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                </select>
                <label>Giới tính</label>
                <span id="gender-pro-error" class="helper-text red-text hide"></span>
            </div>
        </div>

        <div class="col s12 profile-title">
            Cập nhật mật khẩu
            <a id="password-change" class="ui small label">Cập nhật</a>
        </div>

        <div class="input-field col s12">
            <input id="pass-old-pro" disabled type="password">
            <label for="pass-old-pro" class="active">Mật khẩu cũ</label>
            <span id="pass-old-pro-error" class="helper-text red-text"></span>
        </div>

        <div class="input-field col s12">
            <input id="pass-pro" disabled type="password">
            <label for="pass-pro" class="active">Mật khẩu mới</label>
            <span id="pass-pro-error" class="helper-text red-text"></span>
        </div>

        <div class="input-field col s12">
            <input id="pass-confirm-pro" disabled type="password">
            <label for="pass-confirm-pro" class="active">Nhập lại mật khẩu</label>
            <span id="pass-confirm-pro-error" class="helper-text red-text"></span>
        </div>

        {{--<div class="modal-action">--}}
            {{--<a  class="waves-effect waves-light btn red lighten-2 modal-close">Hủy bỏ</a>--}}
            {{--<a class="waves-effect waves-light btn" id="login-modal-button">Đăng nhập</a>--}}
        {{--</div>--}}

    </div>

    <div class="modal-footer">
        <a style="width: 73px" id="profile-cancel" class="modal-close waves-effect waves-light red lighten-2 btn">Thoát</a>
        <a id="profile-action" class="waves-effect waves-light btn">Xác nhận</a>
    </div>
</div>

{{--@push('script')--}}
    {{--<script>--}}
        {{--$(document).ready(function () {--}}
            {{--$('#profile-modal').modal({--}}
                {{--dismissible: false,--}}
                {{--opacity: 0.8--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}