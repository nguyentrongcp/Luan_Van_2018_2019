@php
    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
@endphp

<div class="navbar-container">
    <div class="navbar">
        <nav class="transparent z-depth-0">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="{{ route('customer.home') }}" class="brand-logo left">
                        <img class="responsive-img" src="{{ asset("customer/image/logo-white.png") }}">
                    </a>
                    <ul class="right hide-on-small-only">
                        @if(!Auth::guard('customer')->check())
                            <li><a href="#" class="waves-effect waves-light btn navbar-first-button">
                                    <b>Tạo tài khoản</b></a></li>
                            <li><a href="#login-modal" class="waves-effect waves-light btn modal-trigger navbar-first-button">
                                    <b>Đăng nhập</b></a></li>
                        @else
                            <li><a style="height: 64px;" class="dropdown-trigger waves-effect waves-teal" id="dropdown-profile" data-target="customer-profile">
                                    <img class="responsive-img circle" src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&oh=2e5468930f3c7be683b7ed7428b9eaed&oe=5C5E95CB">

                                    <b style="position: relative; vertical-align: top">{{ Auth::guard('customer')->user()->name }}</b>
                                </a></li>
                        @endif
                        {{--<li><a id="dropdown-cart" data-target="cart" style="height: 64px">--}}
                                {{--<i class="cart icon" style="font-size: 18px"></i>--}}
                                {{--<span id="cart-count" class="ui red mini floating label" style="top: 0;">--}}
                                {{--{{ Cart::count() }}--}}
                            {{--</span>--}}
                            {{--</a></li>--}}
                    </ul>
                    {{--<a href="#" data-target="nav-mobile" class="navbar-fixed sidenav-trigger hide-on-large-only right-align">--}}
                        {{--<i class="material-icons" style="font-size: 30px">menu</i></a>--}}
                </div>
            </div>
        </nav>
    </div>

    @include('customer.layouts.partials.second-navbar')
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

@include('customer.layouts.partials.cart')

@include('customer.layouts.components.login')

@include('customer.layouts.components.login-require')

@include('customer.layouts.partials.navbar-mobile')

{{--<div class="container">--}}
    {{--@include('customer.layouts.partials.second-navbar')--}}
{{--</div>--}}

@include('customer.layouts.partials.style')

@include('customer.layouts.partials.js')