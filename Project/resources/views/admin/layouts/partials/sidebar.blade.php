<div class="sidebar" data-color="blue">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('admin') ? 'active' : '' }} ">
                <a href="/admin" >
                    <i class="now-ui-icons design_app"></i>
                    <p>Tổng quan</p>
                </a>
            </li>
            <li class="{{Request::is('*/product_type') || Request::is('*/add_product_type/*')  ? 'active' : ''}}">
                <a href="/admin/product_type">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Loại thực đơn</p>
                </a>
            </li>
            <li class="{{Request::is('*/products') || Request::is('*/products/create') ? 'active' : ''}}">
                <a href="/admin/products">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Thực đơn</p>
                </a>
            </li>
            <li {{Request::is('*/nhan_vien') ? 'active' : ''}}>
                <a href="/admin/nhan_vien">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Nhân viên</p>
                </a>
            </li>
            <li {{Request::is('*/khach_hang') ? 'active' : ''}}>
                <a href="/admin/khach_hang">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Khách hàng</p>
                </a>
            </li>
        </ul>
    </div>
</div>