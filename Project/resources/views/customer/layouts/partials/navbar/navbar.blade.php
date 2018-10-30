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
                    <ul class="right hide-on-small-only">
                        @if(!Auth::guard('customer')->check())
                            <li><a href="#" class="waves-effect waves-light btn nav-btn">
                                    <b>Tạo tài khoản</b></a></li>
                            <li><a href="#login-modal" class="waves-effect waves-light btn modal-trigger nav-btn">
                                    <b>Đăng nhập</b></a></li>
                        @else
                            <li><a style="height: 64px;" class="dropdown-trigger waves-effect waves-teal" id="dropdown-profile" data-target="customer-profile">
                                    <img class="responsive-img circle" src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&oh=2e5468930f3c7be683b7ed7428b9eaed&oe=5C5E95CB">

                                    <b style="position: relative; vertical-align: top">{{ Auth::guard('customer')->user()->name }}</b>
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
    <li><a href="">
            <i class="material-icons left">history</i>Lịch sử đặt món
        </a></li>
    <li><a href="">
            <i class="material-icons left">account_box</i>Cập nhật tài khoản
        </a></li>
    <li><a href="{{ route('customer.logout') }}">
            <i class="material-icons left">power_settings_new</i>
            Đăng xuất
        </a></li>
</ul>

@include('customer.layouts.partials.navbar.cart.cart')

@include('customer.layouts.partials.navbar-mobile')

{{--<div class="container">--}}
    {{--@include('customer.layouts.partials.second-navbar')--}}
{{--</div>--}}

@include('customer.layouts.partials.navbar.style')

@include('customer.layouts.partials.navbar.js')