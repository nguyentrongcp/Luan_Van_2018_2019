<div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            SnackShop
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('admin') ? 'active' : '' }} ">
                <a href="/admin" >
                    <i class="fa fa-bar-chart"></i>
                    <p>Tổng quan</p>
                </a>
            </li>
            <li class="{{Request::is('*/statistic') ? 'active' : '' }} ">
                <a href="/admin/statistic" >
                    <i class="fa fa-money"></i>
                    <p>Thống kê</p>
                </a>
            </li>
            <li class="{{Request::is('*/foody_type') || Request::is('*/add_foody_type/*')  ? 'active' : ''}}">
                <a href="/admin/foody_type">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Loại thực đơn</p>
                </a>
            </li>
            <li class="{{Request::is('*/foodies') || Request::is('*/foodies/create') ? 'active' : ''}}">
                <a href="/admin/foodies">
                    <i class="fa fa-align-justify"></i>
                    <p>Thực đơn</p>
                </a>
            </li>
            <li class="{{Request::is('*/orders') ? 'active' : ''}}">
                <a href="/admin/orders">
                    <i class="now-ui-icons design_app"></i>
                    <p>Đơn hàng</p>
                </a>
            </li>
            <li class="{{Request::is('*/goods_receipt')||Request::is('*/goods_receipt_detail') ? 'active' : ''}}">
                <a href="/admin/goods_receipt">
                    <i class="now-ui-icons shopping_cart-simple"></i>
                    <p>Nhập hàng</p>
                </a>
            </li>
            <li class="{{Request::is('*/sales_offs') ? 'active' : ''}}">
                <a href="/admin/sales_offs">
                    <i class="now-ui-icons business_bulb-63"></i>
                    <p>Khuyến mãi</p>
                </a>
            </li>
            <li class="{{Request::is('*/news') ? 'active' : ''}}">
                <a href="/admin/news">
                    <i class="fa fa-bullhorn"></i>
                    <p>Tin tức</p>
                </a>
            </li>
            <li class="{{Request::is('*/shop') ? 'active' : ''}}">
                <a href="/admin/shop">
                    <i class="now-ui-icons travel_info"></i>
                    <p>Cửa hàng</p>
                </a>
            </li>
            <li class="{{Request::is('*/employees') ? 'active' : ''}}">
                <a href="/admin/employees">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Nhân viên</p>
                </a>
            </li>
            <li class="{{Request::is('*/khach_hang') ? 'active' : ''}}">
                <a href="/admin/khach_hang">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Khách hàng</p>
                </a>
            </li>
        </ul>
    </div>
</div>