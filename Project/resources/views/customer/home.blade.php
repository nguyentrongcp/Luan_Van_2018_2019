@extends('customer.layouts.master')

@section('title', 'Trang chủ')

@section('content')


    @include('customer.layouts.partials.second-navbar')

    @include('customer.home.slider')

    @include('customer.home.hot-foody')

    @include('customer.home.hot-drink')

    <style>
        .navbar-quarter form {
            height: 64px;
        }

        .row .card {
            /*height: 260px;*/
        }

        .row .col {
            padding: 0 5px;
        }

        #navbar-search {
            height: 64px;
        }

        #navbar-second {
            width: 90%;
            background: #444;
            background: rgba(68, 68, 68, 0.8);
        }

        .dropdown-content.nested {
            overflow-y: visible;
        }

        .dropdown-content.dropdown2 {
            left: 100%;
        }

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