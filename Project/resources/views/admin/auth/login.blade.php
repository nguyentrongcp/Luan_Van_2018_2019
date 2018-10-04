@include('admin.layouts.partials.header')

<body class="login-page sidebar-collapse">
<div class="clear-filter" filter-color="orange">
    <div class="content">
        <div class="container">
            <div class="col-md-4 ml-auto mr-auto" style="padding-top: 120px">
                <div class="card card-login" >
                    <form class="form" method="" action="">
                        <div class="card-header text-center ">
                            <label for="title" class="title text-info" style="font-size: 22px">ĐĂNG NHẬP</label>
                        </div>
                        <div class="card-body">
                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="now-ui-icons users_circle-08"></i>
                                  </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Tài khoản..."
                                        value="blabla@gmail.com">
                            </div>

                            <div class="input-group no-border input-lg">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fa fa-unlock-alt"></i>
                                  </span>
                                </div>
                                <input type="password" placeholder="Mật khẩu..." class="form-control"
                                        value="blablabla">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href=""
                               class="btn btn-info btn-round btn-lg btn-block">Đăng nhập</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>