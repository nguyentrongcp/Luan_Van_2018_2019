@include('admin.layouts.partials.header')

<body class="login-page sidebar-collapse">
    <div class="ui middle aligned center aligned grid">
        <div class="container" style="padding-top: 100px;">
            {{--<div class="col-lg-10">--}}
                <div class="panel-default">
                    <div class="panel-header">
                        <h2 class="ui teal image header">
                            {{--<img src="assets/images/logo.png" class="image">--}}
                            <div class="content">
                                Đăng nhập Admin
                            </div>
                        </h2>
                    </div>
                    <div class="panel-body">
                        <form class="ui form" action="{{route('admin.login.submit')}}" method="post">
                            @csrf
                            <div class="ui stacked segment">
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="user icon"></i>
                                        <input type="text" name="username" placeholder="E-mail address" value="ltgiang">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="lock icon"></i>
                                        <input type="password" name="password" placeholder="Password" value="111111">
                                    </div>
                                </div>
                                <button type="submit" class="ui fluid large teal submit button">Login</button>
                            </div>

                            <div class="ui error message"></div>

                        </form>

                        <div class="ui message">
                            New to us? <a href="#">Sign Up</a>
                        </div>
                    </div>
                {{--</div>--}}
            </div>
        </div>


    </div>

</body>