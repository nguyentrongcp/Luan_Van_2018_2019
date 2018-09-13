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
            <li class="{{Request::is('*/product_type') ? 'active' : ''}}">
                <a href="/admin/productType">
                    <i class="now-ui-icons education_atom"></i>
                    <p>Quản lý sản loại sản phẩm</p>
                </a>
            </li>
            <li class="{{Request::is('*/product') ? 'active' : ''}}">
                <a href="">
                    <i class="now-ui-icons location_map-big"></i>
                    <p>Quản lý sản phẩm</p>
                </a>
            </li>
            <li>
                <a href="./employee.html">
                    <i class="now-ui-icons users_circle-08"></i>
                    <p>Quản lý nhân viên</p>
                </a>
            </li>
            <li>
                <a href="./customer.html">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Quản lý khách hàng</p>
                </a>
            </li>
        </ul>
    </div>
</div>