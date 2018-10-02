<div class="navbar-fixed" data-target="red">
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo left">
                    <img class="responsive-img" src="customer/image/logo.png">
                </a>
                <ul class="right hide-on-med-and-down">
                    @if(!Auth::guard('customer')->check())
                        <li><a href="#"><b>Tạo tài khoản</b></a></li>
                        <li><a href="#login-modal" class="modal-trigger"><b>Đăng nhập</b></a></li>
                    @else
                        <li><a class="dropdown-trigger" data-target="customer-profile">
                                <b>{{ Auth::guard('customer')->user()->name }}</b>
                            </a></li>
                    @endif
                    <li><a href="#">
                            <i class="material-icons">shopping_cart</i>
                        </a></li>
                </ul>
                <a href="#" data-target="nav-mobile" class="navbar-fixed sidenav-trigger hide-on-large-only right-align">
                    <i class="material-icons" style="font-size: 30px">menu</i></a>
            </div>
        </div>
    </nav>
</div>

<ul id="customer-profile" class="dropdown-content">
    <li><a href="{{ route('customer.logout') }}">
            Đăng xuất
        </a></li>
</ul>

@include('customer.layouts.components.login')

@include('customer.layouts.partials.navbar-mobile')

{{--<div class="container">--}}
    {{--@include('customer.layouts.partials.second-navbar')--}}
{{--</div>--}}

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
</style>

@push('script')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
@endpush