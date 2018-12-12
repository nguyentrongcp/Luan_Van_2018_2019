@php
    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
    $logged = Auth::guard('customer')->check() ? 'true' : 'false';
@endphp

<div class="navbar-container">
    <div class="navbar">
        <nav class="transparent z-depth-0">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="{{ route('customer.index') }}" class="brand-logo left">
                        <img class="responsive-img" src="{{ asset("customer/image/logo-white.png") }}">
                    </a>
                    <ul class="right">
                        @if(!Auth::guard('customer')->check())
                            <li class="hide-on-med-and-up">
                                <a href="#login-modal" class="waves-effect waves-light btn modal-trigger nav-btn">
                                    <i class="material-icons">menu</i></a></li>
                            <li class="hide-on-small-only"><a href="{{ route('customer.register.show') }}" class="waves-effect waves-light btn nav-btn">
                                    <b>Tạo tài khoản</b></a></li>
                            <li class="hide-on-small-only"><a href="#login-modal" class="waves-effect waves-light btn modal-trigger nav-btn">
                                    <b>Đăng nhập</b></a></li>
                        @else
                            <li><a style="height: 64px;" class="dropdown-trigger waves-effect waves-light" id="dropdown-profile" data-target="customer-profile">
                                    <img id="avatar" class="responsive-img circle" src="{{ asset(Auth::guard('customer')->user()->avatar) }}">

                                    <b style="position: relative; vertical-align: top" class="hide-on-small-only">{{ Auth::guard('customer')->user()->name }}</b>
                                </a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @include('customer.layouts.partials.navbar.second-navbar')
    @include('customer.layouts.components.search-result')
</div>

<ul id="customer-profile" class="dropdown-content">
    <li><a href="{{ route('payment.order.index') }}">
            <i class="material-icons left">history</i>Lịch sử đặt món
        </a></li>
    <li><a href="#profile-modal" class="modal-trigger">
            <i class="material-icons left">account_box</i>Cập nhật tài khoản
        </a></li>
    <li><a href="{{ route('customer.logout') }}">
            <i class="material-icons left">power_settings_new</i>
            Đăng xuất
        </a></li>
</ul>

@include('customer.layouts.partials.navbar.cart.cart')

{{--<div class="container">--}}
    {{--@include('customer.layouts.partials.second-navbar')--}}
{{--</div>--}}

@include('customer.layouts.partials.navbar.style')

@include('customer.layouts.partials.navbar.js')