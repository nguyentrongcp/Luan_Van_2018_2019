@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thức ăn nhanh, ngon, tiện lợi')

@section('content')

    <div class="row">
        @include('customer.home.navbar')

        <div class="row">
            @include('customer.home.show')
        </div>
    </div>

    @include('customer.home.js')

@endsection