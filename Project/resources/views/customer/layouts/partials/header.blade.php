<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('/customer/css/materialize.min.css') }}">

    {{--Rating stars--}}
    <link rel="stylesheet" href="{{ asset('/customer/css/rating.min.css') }}">

    {{--Label--}}
    <link rel="stylesheet" href="{{ asset('/customer/css/label.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/customer/css/custom.css') }}">

    {{--<link rel="stylesheet" href="{{ asset('/customer/semantic/dimmer.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/customer/semantic/card.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/customer/semantic/button.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/customer/semantic/icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/customer/semantic/transition.min.css') }}">
    {{--<link rel="stylesheet" href="/customer/semantic/dimmer.min.css">--}}
    {{--<link rel="stylesheet" href="/customer/semantic/dropdown.min.css">--}}
    {{--<link rel="stylesheet" href="customer/css/font-awesome.css">--}}

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>