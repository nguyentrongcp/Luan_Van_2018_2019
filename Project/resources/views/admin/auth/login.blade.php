<html>
    <head>
        <meta charset="utf-8">
        <title>Đăng nhập</title>
    </head>

    <body>
        <form method="post" action="{{ route('admin.login.submit') }}">
            @csrf
            <input type="text" name="username" placeholder="Nhập tài khoản...">
            <input type="password" name="password" placeholder="Nhập mật khẩu...">
            <button type="submit">Đăng nhập</button>
        </form>
    </body>
</html>