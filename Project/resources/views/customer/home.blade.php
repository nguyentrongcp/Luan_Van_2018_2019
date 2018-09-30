@extends('customer.layouts.master')

@section('title', 'Trang chủ')

@section('content')

    @include('customer.home.slider')

    @include('customer.home.hot-foody')

    @include('customer.home.hot-drink')

    <style>
        /*.row .col {*/
            /*padding: 0 5px;*/
        /*}*/

    </style>

@endsection