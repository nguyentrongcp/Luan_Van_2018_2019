<div class="navbar" id="nav-2">
    <nav id="navbar" class="transparent z-depth-0">
        <div class="container">
            <div class="nav-wrapper">
                <ul id="navbar-ul">
                    @if(Request::is('home'))
                        <li class="nav-col m-nav-col hide-on-small-only" id="navbar-back">
                            <a href="{{ route('customer.index') }}">
                                <i class="material-icons left hide-on-small-only">home</i>
                                <span class="hide-on-small-only">Trang chính</span>
                                <i class="material-icons center hide-on-med-and-up">home</i>
                            </a>
                        </li>
                        <li class="nav-col m-nav-col hide-on-med-and-up" id="navbar-filter">
                            <a id="home-nav-dropdown" class="dropdown" data-target="m-home-nav-container">
                                <i class="material-icons center hide-on-med-and-up">filter_list</i>
                            </a>
                        </li>
                    @else
                        <li class="nav-col m-nav-col" id="navbar-back">
                            <a href="{{ route('customer.home') }}">
                                <i class="material-icons left hide-on-small-only">home</i>
                                <span class="hide-on-small-only">Trang chủ</span>
                                <i class="material-icons center hide-on-med-and-up">home</i>
                            </a>
                        </li>
                    @endif

                    <li data-search="{{ Request::is('home*') ? 'home' : 'result' }}"
                        class="hide nav-col" id="navbar-search">
                        <div class="input-field">
                            <input id="search" type="search" placeholder="Tìm kiếm..." autocomplete="off">
                            <label class="label-icon" for="search"><i class="material-icons center">search</i></label>
                            <i class="material-icons left">close</i>
                        </div>
                    </li>
                    <li class="nav-col hide-on-small-only nav-search">
                        <a>
                            <i class="material-icons left">search</i>
                            <span>Tìm kiếm</span>
                        </a>
                    </li>
                    <li class="nav-col m-nav-col hide-on-med-and-up nav-search">
                        <a>
                            <i class="material-icons center">search</i>
                        </a>
                    </li>

                    <li class="nav-col m-nav-col" id="navbar-category">
                        <a id="dropdown-category" class="dropdown" data-target='dropdown-category-content'>
                            <i class="material-icons left hide-on-small-only">menu</i>
                            <i class="material-icons center hide-on-med-and-up">menu</i>
                            <span class="hide-on-small-only">Phân loại</span></a>
                    </li>

                    <li style="width: 90px" id="navbar-cart" class="nav-col m-nav-col">
                        <a id="dropdown-cart" data-target="dro-cart" class="dropdown truncate">
                            <i class="material-icons left hide-on-small-only">shopping_cart</i>
                            <i class="material-icons center hide-on-med-and-up">shopping_cart</i>
                            <span id="cart-qty" class="new badge" data-badge-caption="">{{ Cart::count() }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<ul id='dropdown-category-content' class='dropdown-content'>
    <li><a onclick="getFoodyByType(null,'vote', '{{ route('home.get_foody') }}')">
            <i class="material-icons">star</i>Ẩm thực đánh giá cao
        </a></li>
    <li><a onclick="getFoodyByType(null,'like', '{{ route('home.get_foody') }}')">
            <i class="material-icons">favorite</i>Ẩm thực yêu thích nhất
        </a></li>
    <li><a onclick="getFoodyByType(null,'buy', '{{ route('home.get_foody') }}')">
            <i class="material-icons">shopping_cart</i>Ẩm thực được mua nhiều nhất
        </a></li>
    @if($logged == 'true')
        <li><a onclick="getFoodyByType('favorite',null, '{{ route('home.get_foody') }}')">
                <i class="material-icons">bookmark</i>Ẩm thực đã lưu
            </a></li>
    @endif
    <li class="divider"></li>
    <li>
        <a href="{{ route('customer.news.index') }}">
            <i class="material-icons">event</i>Tin tức và khuyến mãi
        </a></li>
</ul>

@include('customer.home.navbar-mobile')