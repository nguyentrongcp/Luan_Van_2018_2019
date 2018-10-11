<div class="navbar">
    <nav id="navbar-second">
        <div class="container">
            <div class="nav-wrapper">
                <ul id="">
                    <li style="width: 15%"><a href="sass.html">
                            <i class="material-icons left">arrow_back</i><span class="hide-on-small-only">Trở về</span>
                        </a></li>
                    <li style="width: 45%">
                        {{--<div class="ui icon input">--}}
                            {{--<i class="search icon"></i>--}}
                            {{--<input type="text" placeholder="Search...">--}}
                        {{--</div>--}}
                        <form id="navbar-search">
                            <div class="input-field">
                                <input id="search" type="search" placeholder="Tìm kiếm" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons left">close</i>
                            </div>
                        </form>
                    </li>
                    <li style="width: calc(40% - 80px)"><a class='dropdown-trigger' id="dropdown-type" data-target='dropdown1'>
                            <i class="material-icons left">menu</i>
                            <span class="hide-on-small-only">Phân loại</span></a>
                        <ul id='dropdown1' class='dropdown-content nested'>
                            <li><a class="dropdown-trigger dropdown2" data-target="dropdown2">Thức ăn</a></li>
                            <li><a href="#!">two</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="#!">three</a></li>
                            <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                            <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
                        </ul>

                        <ul id='dropdown2' class='dropdown-content dropdown2'>
                            <li><a href="#!">Cai gi do</a></li>
                            <li><a href="#!">Cai gi day</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="#!">Cai gi nao</a></li>
                            <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                            <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
                        </ul>

                        <ul id="dropdown3" class="dropdown-content">
                            <li><a href="#!">Cai gi do</a></li>
                            <li><a href="#!">Cai gi day</a></li>
                            <li class="divider" tabindex="-1"></li>
                            <li><a href="#!">Cai gi nao</a></li>
                            <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                            <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
                        </ul>
                    </li>
                    <li style="width: 80px"><a id="dropdown-cart" data-target="cart" class="truncate">
                            <i class="material-icons left">shopping_cart</i>
                            <span id="cart-count" class="ui mini red floating label"
                                  style="top: 0; margin-left: -40px !important;">{{ Cart::count() }}</span>
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>