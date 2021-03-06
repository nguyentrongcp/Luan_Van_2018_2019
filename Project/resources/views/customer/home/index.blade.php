@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thức ăn nhanh, ngon, tiện lợi')

@section('content')

    @php $logged = Auth::guard('customer')->check() ? 'true' : 'false' @endphp
    <div class="row">
        @include('customer.home.navbar')

        <div class="row">
            @include('customer.home.show')
        </div>
    </div>

    @include('customer.home.js')
    @include('customer.layouts.components.modal.require-modal')

@endsection