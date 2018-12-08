
<!DOCTYPE html>
<html>
<head>
    <title>Login | Fast Foody Shop</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/png">
    <link rel="icon" href="{{ asset("customer/image/logo.png") }}">
    <link rel="shortcut icon" href="{{ asset("/customer/image/logo.png") }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
          integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    {{--Semantic--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.css">
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
    {{--    <link rel="stylesheet" href="{{asset('admin/assets/css/semanticoff.min.css')}}">--}}

    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('customer/semantic/search.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/semantic/checkbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('customer/semantic/tab.min.css')}}">
    {{--<link rel="stylesheet" href="{{asset('customer/semantic/modal.min.css')}}">--}}

    <link rel="stylesheet" href="{{ asset('admin/assets/plugin/jq-toast/jquery.toast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugin/fotorama/fotorama.css') }}">


    <style type="text/css">
        *:not(i) {
            font-family: 'Segoe UI', Tahoma, Arial, san-serif !important;
        }
        .hidden {
            display: none !important;
        }
    </style>
</head>
<body class="login-page sidebar-collapse">
    <div class="ui middle aligned center aligned grid">
        <div class="container" style="padding-top: 100px;width: 35%">
                <div class="panel-default">
                    <div class="panel-header">
                        <h2 class="ui teal centered header">
                                ĐĂNG NHẬP ADMIN
                        </h2>
                    </div>
                    <div class="panel-body">
                        <form class="ui form" action="{{route('admin.login.submit')}}" method="post">
                            @csrf
                            <div class="ui stacked segment">
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="user icon"></i>
                                        <input type="text" name="email" placeholder="E-mail address" value="ltgiang@gmail.com">
                                    </div>
                                </div>
                                <div class="field">
                                    <div class="ui left icon input">
                                        <i class="lock icon"></i>
                                        <input type="password" name="password" placeholder="Password" value="admin123">
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