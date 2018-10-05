<div class="navbar-fixed" style="z-index: 998">
    <nav class="purple">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo left">
                    <img class="responsive-img" src="{{ asset("customer/image/logo-white.png") }}">
                </a>
                <ul class="right hide-on-med-and-down">
                    @if(!Auth::guard('customer')->check())
                        <li><a href="#"><b>Tạo tài khoản</b></a></li>
                        <li><a href="#login-modal" class="modal-trigger"><b>Đăng nhập</b></a></li>
                    @else
                        <li><a style="height: 64px;" id="profile" data-target="customer-profile">
                                <img class="responsive-img circle" src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&oh=2e5468930f3c7be683b7ed7428b9eaed&oe=5C5E95CB">

                                <b style="position: relative; vertical-align: top">{{ Auth::guard('customer')->user()->name }}</b>
                            </a></li>
                    @endif
                    <li><a href="#">
                            <i class="cart icon" style="font-size: 18px"></i>
                            <span id="cart-count" class="ui red mini floating label" style="top: 0;">
                                {{ Cart::count() }}
                            </span>
                        </a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="navbar-fixed sidenav-trigger hide-on-large-only right-align">
                    <i class="material-icons" style="font-size: 30px">menu</i></a>
            </div>
        </div>
    </nav>
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

@include('customer.layouts.components.login')

@include('customer.layouts.partials.navbar-mobile')

<div class="container">
    @include('customer.layouts.partials.second-navbar')
</div>

<style>
    .navbar-mobile {
        padding: 0 32px !important;
        font-weight: 500;
    }
    .collapsible-body .waves-effect {
        padding: 0 47px !important;
    }
    #nav-mobile li.search .search-wrapper {
        color: #777;
        margin-top: -1px;
        border-top: 1px solid rgba(0,0,0,0.14);
        -webkit-transition: margin .25s ease;
        transition: margin .25s ease;
    }
    #nav-mobile .search .search-wrapper input {
        border-bottom: 1px solid rgba(0,0,0,0.14);
    }
    #search-mobile {
        padding: 0 32px;
    }

    .dropdown-content li>a>i {
        margin: 0 15px 0 0;
    }

    .responsive-img.circle {
        height: 40px;
        width: 40px;
        margin-top: 12px;
        margin-right: 10px;
    }
</style>

@push('script')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
            $('#profile').dropdown({
                coverTrigger: false,
                alignment: 'right',
                constrainWidth: false
            })
        });
    </script>
@endpush