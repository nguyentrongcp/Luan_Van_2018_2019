<div id="login-modal" class="modal mini-modal">
    <div class="modal-content">
        <h5 class="modal-header">Đăng nhập</h5>
        <form method="post" action="{{ route('customer.login.submit') }}">
            @csrf

            <div class="row">
                <div class="input-field">
                    <input id="username" type="text" name="username">
                    <label for="username" class="active">Tài khoản</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="password" type="password" name="password">
                    <label for="password" class="active">Mật khẩu</label>
                </div>
            </div>

            <button class="waves-effect waves-light btn" type="submit">Đăng nhập</button>
        </form>
    </div>
</div>

<div class="modal" id="mobile-login-modal">
    <div class="modal-content">
        <h5 class="modal-header">Đăng nhập</h5>
        <form method="post" action="{{ route('customer.login.submit') }}">
            @csrf

            <div class="row">
                <div class="input-field">
                    <input id="username" type="text" name="username">
                    <label for="username" class="active">Tài khoản</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field">
                    <input id="password" type="password" name="password">
                    <label for="password" class="active">Mật khẩu</label>
                </div>
            </div>

            <button class="waves-effect waves-light btn" type="submit">Đăng nhập</button>
        </form>
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
            M.updateTextFields();
        });
    </script>
@endpush