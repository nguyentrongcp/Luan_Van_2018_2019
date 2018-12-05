
@include('admin.layouts.partials.header')

@section('Login', 'title')

<body class="login-page sidebar-collapse">
    <div class="ui middle aligned center aligned grid">
        <div class="container" style="padding-top: 100px;width: 35%">
                <div class="panel-default">
                    <div class="panel-header">
                        <h2 class="ui teal centered header">
                            {{--<img src="assets/images/logo.png" class="image">--}}
                            {{--<div class="content">--}}
                                ĐĂNG NHẬP ADMIN
                            {{--</div>--}}
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
                                @if($errors->has('username') || $errors->has('password'))
                                    <div style="color: red; margin-top: 5px; font-size: 13px; padding-bottom: 5px">
                                        {{ $errors->first('username') }}
                                    </div>
                                @endif
                                <button type="submit" class="ui fluid large teal submit button">Đăng nhập</button>
                            </div>
                            <div class="ui error message"></div>
                        </form>
                    </div>
                {{--</div>--}}
            </div>
        </div>
    </div>
</body>