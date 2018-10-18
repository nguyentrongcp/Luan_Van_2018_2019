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
                <a href="/admin/statistic" data-toggle="collapse" data-target="#collapseStatistic" aria-expanded="false" aria-controls="collapseStatistic">
                    <i class="fa fa-money"></i>
                    <p>Thống kê</p>
                </a>
                <div class="collapse" id="collapseStatistic">
                    <ul class="nav">
                        <li class="sidebar-child"><a href=""><i class=""></i>Thu chi</a></li>
                        <li class="sidebar-child"><a href="">Đơn hàng</a></li>
                        <li class="sidebar-child"><a href="">Thực đơn</a></li>
                    </ul>
                </div>
            </li>
            <li class="{{Request::is('*/foody_type') || Request::is('*/add_foody_type/*')||Request::is('*/foody_type/*')  ? 'active' : ''}}">
                <a href="/admin/foody_type">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Loại thực đơn</p>
                </a>
            </li>
            <li class="{{Request::is('*/foodies') || Request::is('*/foodies/create')|| Request::is('*/comments')|| Request::is('*/comments/*') ? 'active' : ''}}">

                <a href="/admin/foodies" data-toggle="collapse" data-target="#collapseFoody" aria-expanded="false" aria-controls="collapseFoody">
                    <i class="fa fa-align-justify"></i>
                    <div class="form-group row">
                        Thực đơn<i class="fa fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseFoody">
                    <ul class="nav">
                        <li class="sidebar-child"><a href="/admin/foodies"><i class="fa fa-info"></i>Thông tin</a></li>
                        {{--<li class="sidebar-child"><a href="/admin/feedbacks"><i class="fa fa-star"></i>Đánh giá</a></li>--}}
                        <li class="sidebar-child"><a href="/admin/comments"><i class="fa fa-comment"></i>Bình luận</a></li>
                    </ul>
                </div>
            </li>
            <li class="{{Request::is('*/orders')||Request::is('*/orders/*') ? 'active' : ''}}">
                <a href="/admin/orders">
                    <i class="now-ui-icons design_app"></i>
                    <p>Đơn hàng</p>
                </a>
            </li>
            <li class="{{Request::is('*/goods_receipt_note')||Request::is('*/goods_receipt_note_detail/*') ? 'active' : ''}}">
                <a href="/admin/goods_receipt_note">
                    <i class="now-ui-icons shopping_cart-simple"></i>
                    <p>Nhập hàng</p>
                </a>
            </li>
            <li class="{{Request::is('*/sales_offs')||Request::is('*/create_sales_offs/*')||Request::is('*/sales_offs/*') ? 'active' : ''}}">
                <a href="/admin/sales_offs">
                    <i class="now-ui-icons business_bulb-63"></i>
                    <p>Khuyến mãi</p>
                </a>
            </li>
            <li class="{{Request::is('*/news')||Request::is('*/news/*')||Request::is('*/news/create') ? 'active' : ''}}">
                <a href="/admin/news">
                    <i class="fa fa-bullhorn"></i>
                    <p>Tin tức</p>
                </a>
            </li>
            <li class="{{Request::is('*/employees') ? 'active' : ''}}">
                <a href="/admin/employees">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Nhân viên</p>
                </a>
            </li>
            <li class="{{Request::is('*/shop_infos') ? 'active' : ''}}">
                <a href="/admin/shop_infos" data-toggle="collapse" data-target="#collapseShop" aria-expanded="false" aria-controls="collapseShop">
                    <i class="fa fa-shopping-bag"></i>
                    <div class="form-group row">
                        <p>Cửa hàng</p><i class="fa fa-angle-down"></i>
                    </div>
                </a>
                <div class="collapse" id="collapseShop">
                    <ul class="nav">
                        <li class="sidebar-child"><a href="/admin/shop_infos"><i class="fa fa-info-circle"></i>Thông tin cửa hàng</a></li>
                        <li class="sidebar-child"><a href=""><i class="	fa fa-file-image-o"></i>Slide quảng cáo</a></li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>