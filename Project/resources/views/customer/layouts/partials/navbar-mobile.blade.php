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
    @if(!Auth::guard('customer')->check())
        <li>
            <a class="waves-effect" href="#">
                Tạo tài khoản
            </a>
        </li>
        <li>
            <a class="waves-effect waves-purple modal-trigger sidenav-close" href="#mobile-login-modal">
                Đăng nhập
            </a>
        </li>
    @else
        <li><div class="user-view">
                <div class="background">
                    <img src="https://images.unsplash.com/photo-1530482817083-29ae4b92ff15?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=44f4aebbd1e1371d5bf7dc22016c5d29&w=1000&q=80">
                </div>
                <a href="#user"><img class="circle" src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&oh=2e5468930f3c7be683b7ed7428b9eaed&oe=5C5E95CB"></a>
                <a href="#name"><span class="white-text name">John Doe</span></a>
                <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                <a href="#"></a>
                <a href="{{ route('customer.logout') }}">
                    <span class="white-text">Đăng xuất</span>
                </a>
                {{--<a href="{{ route('customer.logout') }}">--}}
                {{--<span class="white-text right-align">Đăng xuất</span>--}}
                {{--</a>--}}
            </div></li>
    @endif
    <li class="search">
        <div class="search-wrapper">
            <input id="search-mobile" style="margin: 0" placeholder="Tìm kiếm...">
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