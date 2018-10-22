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
                            <li><a href="#" class="waves-effect waves-light btn btn-nav">
                                    <b>Tạo tài khoản</b></a></li>
                            <li><a href="#login-modal" class="waves-effect waves-light btn btn-nav modal-trigger">
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

    <div class="navbar nav-2" id="nav-2">
        <nav class="transparent z-depth-0">
            <div class="container">
                <div class="nav-wrapper">
                    <ul>
                        <li class="nav-2">
                            <a>
                                <i class="material-icons left">arrow_back</i>
                                <span>Trở về</span>
                            </a>
                        </li>
                        <li class="nav-2">
                            <a>
                                <i class="material-icons left">search</i>
                                <span>Tìm kiếm</span>
                            </a>
                        </li>
                        <li class="nav-2">
                            <a>
                                <i class="material-icons left">menu</i>
                                <span>Phân loại</span>
                            </a>
                        </li>
                        <li class="nav-2">
                            <a data-target="dro-cart" id="dro-cart-btn" class="dropdown-trigger">
                                <i class="material-icons left">shopping_cart</i>
                                <span>Giỏ hàng</span>
                                <span id="cart-quantity" class="new badge" data-badge-caption="">3{{ Cart::count() }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <ul id="dro-cart" class='dropdown-content'>
        <li class="cart-title">
            <div class="col s12 right-align">
                Giỏ hàng
            </div>
        </li>
        <li class="divider"></li>
        <li class="col s12 cart-body">
            @if($carts->count() == 0)
                <span class="center-align">
                    Giỏ hàng trống
                </span>
            @endif
            @php $cost = 0 @endphp
            @foreach($carts as $cart)
                @php
                    $foody = \App\Foody::find($cart->id);
                    $cost += $foody->currentCost() * $cart->qty;
                @endphp
                <div class="cart-row row" id="{{ $cart->id }}">
                    <div class="col cart-count" id="cart-count-{{ $cart->id }}"
                         style="width: 30px; margin-left: 15px">
                        {{ $cart->qty }}
                    </div>
                    <div class="col" style="width: 20px">x</div>
                    <div class="col cart-name">
                        {{ $cart->name }}
                    </div>
                    <div class="col cart-action">
                        <a class="ui button" onclick="updateCart(this,{{ $cart->id }})">
                            <i class="plus icon"></i>
                        </a>

                        <a class="ui button" onclick="updateCart(this,{{ $cart->id }})"
                           data-amount="cart-minus-{{ $cart->id }}"><i class="minus icon"></i>
                        </a>
                    </div>
                    <div class="col right-align" style="width: 70px" id="cart-cost-{{ $cart->id }}">
                        {{ number_format($foody->currentCost() * $cart->qty) }}<sup>đ</sup>
                    </div>
                    <div class="col cart-remove">
                        <i onclick="removeCart({{ $cart->id }})" class="trash alternate icon"></i>
                    </div>
                </div>
            @endforeach
        </li>

        <li class="divider"></li>

        <li class="cart-total-cost">
            <div class="col til left">
                Tổng cộng
            </div>
            <div class="col cost right" id="dro-cart-total-cost">
                {{ number_format($cost)  }}<sup>đ</sup>
            </div>
        </li>

        <li class="divider"></li>

        <li class="cart-footer">
            <a href="{{ route('payment.index') }}" id="cart-payment" class="
            {{ $carts->count() == 0 ? 'disabled' : '' }} btn waves-effect waves-light">
                Đặt hàng
            </a>
        </li>
    </ul>

</div>

@include('customer.layouts.partials.style2')
@include('customer.layouts.partials.js2')