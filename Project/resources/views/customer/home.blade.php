@extends('customer.layouts.master')

@section('title', 'Trang chủ')

@section('content')


    @include('customer.layouts.partials.second-navbar')

    @include('customer.home.slider')

    @include('customer.home.hot-foody')

    @include('customer.home.hot-drink')

    <style>
        /*.row .col {*/
            /*padding: 0 5px;*/
        /*}*/

    </style>

    @push('script')
        <script>
            $(document).ready(function(){
                $('.tabs').tabs();
                $('.slider').slider();
                // $('.materialboxed').materialbox();
                $('.tooltipped').tooltip();
            });

            $('.dropdown-trigger').dropdown({
                coverTrigger: false
            });

            $('.dropdown2').dropdown({
                hover: true,
                alignment: 'right'
            });
        </script>
    @endpush

@endsection