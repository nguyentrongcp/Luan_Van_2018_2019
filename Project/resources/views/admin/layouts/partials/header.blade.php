<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Fast Foody Shop</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/png">
    <link rel="icon" href="{{ asset("customer/image/logo.png") }}">
    <link rel="shortcut icon" href="{{ asset("/customer/image/logo.png") }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    @stack('style')
</head>