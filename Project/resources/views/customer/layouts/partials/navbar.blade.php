<div class="navbar-fixed">
    <nav>
        <div class="container">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo left">
                    <img class="responsive-img" src="customer/image/logo.png">
                </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#"><b>Tạo tài khoản</b></a></li>
                    <li><a href="#"><b>Đăng nhập</b></a></li>
                    <li><a href="#">
                            <i class="material-icons">shopping_cart</i>
                        </a></li>
                </ul>
                <a href="#" data-target="slide-out" class="navbar-fixed sidenav-trigger hide-on-large-only right-align">
                    <i class="material-icons" style="font-size: 30px">menu</i></a>
            </div>
        </div>
    </nav>

</div>

<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
            <div class="background">
                <img src="images/office.jpg">
            </div>
            <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
            <a href="#name"><span class="white-text name">John Doe</span></a>
            <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
        </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
</ul>

@push('script')
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav({
                edge: 'right'
            });
        });
    </script>
@endpush