@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thức ăn nhanh, ngon, tiện lợi')

@section('content')

    <div class="row">
        @include('customer.index.navbar')

        @include('customer.index.show')
    </div>

@endsection