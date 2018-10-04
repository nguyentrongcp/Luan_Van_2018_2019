@extends('customer.layouts.master')

@section('title', 'Trang chủ')

@section('content')

    @include('customer.index.slider')

    @include('customer.index.hot-foody')

    @include('customer.index.hot-drink')

    <style>
        /*.row .col {*/
            /*padding: 0 5px;*/
        /*}*/

    </style>

@endsection