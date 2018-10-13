<div class="navbar">
    <nav id="navbar-second">
        <div class="container">
            <div class="nav-wrapper">
                <ul id="">
                    <li class="navbar-second-col navbar-hide navbar-back" id="navbar-back"><a>
                            <i class="material-icons left hide-on-small-only">arrow_back</i>
                            <span class="hide-on-small-only">Trở về</span>
                            <i class="material-icons center hide-on-med-and-up">arrow_back</i>
                        </a></li>
                    <li data-search="{{ Request::is('home*') ? 'home' : 'result' }}"
                        class="navbar-second-col hide-on-small-only navbar-search" id="navbar-search">
                        {{--<div class="ui icon input">--}}
                            {{--<i class="search icon"></i>--}}
                            {{--<input type="text" placeholder="Search...">--}}
                        {{--</div>--}}
                        {{--<div id="navbar-search" class="hide-on-small-only">--}}
                            {{--<div class="input-field">--}}
                                {{--<input id="search" type="search" placeholder="Tìm kiếm" required>--}}
                                {{--<label class="label-icon" for="search"><i class="material-icons">search</i></label>--}}
                                {{--<i class="material-icons left">close</i>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div>
                            <div class="input-field">
                                <input id="search" type="search" placeholder="Tìm kiếm..." required>
                                <label class="label-icon" for="search"><i class="material-icons center">search</i></label>
                                <i class="material-icons left">close</i>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-search navbar-second-col navbar-hide hide-on-med-and-up">
                        <a><i class="material-icons center">search</i></a>
                    </li>
                    <li class="navbar-second-col navbar-hide navbar-hide-med" id="navbar-category">
                        <a id="dropdown-category" class='dropdown-trigger' data-target='dropdown-category-content'>
                            <i class="material-icons left hide-on-small-only">menu</i>
                            <i class="material-icons center hide-on-med-and-up">menu</i>
                            <span class="hide-on-small-only">Phân loại</span></a>
                    </li>
                    <li style="width: 90px" class="navbar-hide navbar-cart navbar-hide-med">
                        <a id="dropdown-cart" data-target="cart" class="truncate dropdown-trigger">
                            <i class="material-icons left">shopping_cart</i>
                            <span id="cart-count" class="new badge" data-badge-caption="">{{ Cart::count() }}</span>
                            {{--<span id="cart-count" class="ui mini red floating label"--}}
                                  {{--style="top: 0;">{{ Cart::count() }}</span>--}}
                        </a></li>
                    {{--<li id="navbar-menu" style="width: 60px; margin-left: calc(50% - 105px)" class="hide-on-med-and-up">--}}
                        {{--<a href="#" style="margin: 0" data-target="nav-mobile" class="sidenav-trigger hide-on-large-only right-align">--}}
                            {{--<i class="material-icons" style="font-size: 30px">menu</i></a>--}}
                </ul>
            </div>
        </div>
    </nav>
</div>

<ul id='dropdown-category-content' class='dropdown-content'>
    <li><a href="#!">
            <i class="material-icons">access_time</i>Mới nhất
        </a></li>
    <li><a href="#!">
            <i class="material-icons">star</i>Đánh giá
        </a></li>
    <li><a href="#!">
            <i class="material-icons">favorite</i>Yêu thích
        </a></li>
    <li><a href="#!">
            <i class="material-icons">bookmark</i>Đã lưu
        </a></li>
    <li class="divider"></li>
    <li>
        <a href="#!">
            <i class="material-icons">event</i>Tin tức và khuyến mãi
        </a></li>
</ul>