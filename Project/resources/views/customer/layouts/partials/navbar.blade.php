<div class="navbar-fixed">
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo left">
                    <img class="responsive-img" src="customer/image/logo.png">
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#"><b>Tạo tài khoản</b></a></li>
                    <li><a href="#"><b>Đăng nhập</b></a></li>
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

<ul id="nav-mobile" class="sidenav">
    {{--<li><div class="user-view">--}}
            {{--<div class="background">--}}
                {{--<img src="images/office.jpg">--}}
            {{--</div>--}}
            {{--<a href="#user"><img class="circle" src="images/yuna.jpg"></a>--}}
            {{--<a href="#name"><span class="white-text name">John Doe</span></a>--}}
            {{--<a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>--}}
        {{--</div></li>--}}
    {{--<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>--}}
    {{--<li><a href="#!">Second Link</a></li>--}}
    {{--<li><div class="divider"></div></li>--}}
    {{--<li><a class="subheader">Subheader</a></li>--}}
    {{--<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>--}}
    <li>
        <a class="waves-effect" href="#">
            Tạo tài khoản
        </a>
    </li>
    <li>
        <a class="waves-effect" href="#">
            Đăng nhập
        </a>
    </li>
    <li class="search">
        <div class="search-wrapper">
            <input id="search-mobile" placeholder="Tìm kiếm...">
            <div class="search-results"></div>
        </div>
    </li>
    {{--<li><div class="divider"></div></li>--}}
    {{--<li>--}}
        {{--<a class="waves-effect" href="#">--}}
            {{--<i class="material-icons left">shopping_cart</i>--}}
            {{--Giỏ hàng--}}
        {{--</a>--}}
    {{--</li>--}}
    {{--<li><div class="divider"></div></li>--}}
    <li>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header waves-effect waves-purple navbar-mobile">Thức ăn</div>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="#" class="waves-effect">First</a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect">Second</a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect">Third</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="collapsible-header waves-effect navbar-mobile">Nước uống</div>
                <div class="collapsible-body">
                    <ul>
                        <li>
                            <a href="#" class="waves-effect">First</a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect">Second</a>
                        </li>
                        <li>
                            <a href="#" class="waves-effect">Third</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li class="bold">
        <a class="waves-effect" href="#">
            Tạo tài khoản
        </a>
    </li>
    <li>
        <a class="waves-effect" href="#">
            Đăng nhập
        </a>
    </li>
</ul>

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
            $('.sidenav').sidenav({
                edge: 'right'
            });
            $('.collapsible').collapsible();
        });
    </script>
@endpush