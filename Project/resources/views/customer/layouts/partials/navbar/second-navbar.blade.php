<div class="navbar" id="nav-2">
    <nav id="navbar" class="transparent z-depth-0">
        <div class="container">
            <div class="nav-wrapper">
                <ul id="navbar-ul">
                    <li class="nav-col m-nav-col" id="navbar-filter">
                        <a class="hide-on-small-only">
                            <i class="material-icons left">arrow_back</i>
                            <span class="hide-on-small-only">Trở về</span>
                        </a>
                        <a id="home-nav-dropdown" class="hide-on-med-and-up dropdown-trigger" data-target="m-home-nav-container">
                            <i class="material-icons center hide-on-med-and-up">filter_list</i>
                        </a>
                    </li>

                    <li data-search="{{ Request::is('home*') ? 'home' : 'result' }}"
                        class="hide nav-col" id="navbar-search">
                        <div class="input-field">
                            <input id="search" type="search" placeholder="Tìm kiếm..." required>
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
                        <a id="dropdown-category" class='dropdown-trigger' data-target='dropdown-category-content'>
                            <i class="material-icons left hide-on-small-only">menu</i>
                            <i class="material-icons center hide-on-med-and-up">menu</i>
                            <span class="hide-on-small-only">Phân loại</span></a>
                    </li>

                    <li style="width: 90px" id="navbar-cart" class="nav-col m-nav-col">
                        <a id="dropdown-cart" data-target="dro-cart" class="truncate dropdown-trigger">
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

@include('customer.home.navbar-mobile')