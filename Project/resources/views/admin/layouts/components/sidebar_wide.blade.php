<div class="ui fixed inverted borderless menu full-height under-navbar"
     style="width: 220px; display: inline-block;background-color: #2EA8BD;">
    <div class="item" style="width: 200px">
        <a href="/admin"><img class="ui medium image" src="{{ asset('customer/image/logo.png') }}" alt="Logo"></a>
    </div>

    @php
        $employee = \App\Employees::find(\App\Admin::adminId());
    @endphp

    <a href="/admin/dashboard" class="title item {{ Request::is('*dashboard') ? 'active-bar': '' }}">
        <i class="dashboard icon icon-left"></i>Tổng quan</a>

    @if($employee->checkRoles(1))
        <div class="ui accordion no-padding">
            <div class="title item menu-item-padding color-white {{ Request::is('*statistic*') ? 'active-bar': '' }}">
                <i class="chart bar icon icon-left icon-accordion"></i>
                Thống kê
                <i class="dropdown icon"></i>
            </div>

            <div class="content menu-item-padding color-white {{ Request::is('*statistic*') ? 'active': '' }}">
                <div class="menu"  style="padding-left: 10px">
                    <a href="{{route('revenue')}}" class="title item {{ Request::is('*statistic/revenue') ? 'active': '' }}">
                        <i class="dollar icon icon-left"></i>Thu chi</a>

                    <a href="{{route('order')}}" class="title item {{ Request::is('*statistic/order') ? 'active': '' }}">
                        <i class="clipboard icon icon-left"></i>Đơn hàng</a>

                    <a href="{{route('foody')}}"
                       class="title item {{ Request::is('*statistic/foody') ? 'active' : '' }}">
                        <i class="utensils icon icon-left"></i>Ẩm thực</a>
                </div>
            </div>
        </div>
    @endif

    @if($employee->checkRoles(2))
        <a class="item {{ Request::is('*/foody_type') ? 'active-bar': '' }}" href="/admin/foody_type">
            <i class="sitemap icon icon-left"></i>Loại ẩm thực</a>
    @endif

    @if($employee->checkRoles(3))
        <a class="item {{ Request::is('*admin/foodies*')||Request::is('*/foody_type/*') ? 'active-bar': '' }}" href="/admin/foodies">
            <i class="utensils icon icon-left"></i>Ẩm thực</a>
    @endif

    @if($employee->checkRoles(4))
        <a class="item {{Request::is('*/goods_receipt_note')|| Request::is('*/goods_receipt_note_detail/*')|| Request::is('*/goods_receipt') ? 'active-bar': '' }}" href="/admin/goods_receipt_note">
            <i class="dolly icon icon-left"></i>Nhập hàng </a>
    @endif

    @if($employee->checkRoles(5))
        <a class="item {{Request::is('*admin/orders*') ? 'active-bar': '' }}" href="/admin/orders">
            <i class="clipboard icon icon-left"></i>Đơn hàng </a>
    @endif

    @if($employee->checkRoles(6))
        <a class="item {{Request::is('*/sales_offs') ? 'active-bar': '' }}" href="/admin/sales_offs">
            <i class="certificate icon icon-left"></i>Khuyến mãi </a>
    @endif

    @if($employee->checkRoles(7))

    <div class="ui accordion no-padding">
        <div class="title item menu-item-padding color-white {{ Request::is('*content*') ? 'active-bar': ''}}">
            <i class="newspaper icon icon-left icon-accordion"></i>
            Nội dung website
            <i class="dropdown icon"></i>
        </div>
        <div class="content menu-item-padding color-white {{ Request::is('*content*') ? 'active': ''}}">
            <div class="menu" style="padding-left: 10px">
                <a class="title item {{ Request::is('*content/shop_infos') ? 'active': '' }}"
                   href="{{route('shop_infos.index')}}">
                    <i class="info icon icon-left"></i>
                    Thông tin cửa hàng</a>
                <a  class="title item {{ Request::is('*content/sliders') ? 'active': '' }}"
                    href="{{route('sliders.index')}}">
                    <i class="certificate icon icon-left"></i>Slide quảng cáo</a>
                <a class="title item {{ Request::is('*content/news') ? 'active': '' }}"
                   href="{{route('news.index')}}">
                    <i class="newspaper icon icon-left"></i>Tin tức</a>
            </div>
        </div>
    </div>
    @endif

@if($employee->isAdmin())
        <a class="item {{Request::is('*/employees') ? 'active-bar': '' }}" href="/admin/employees">
            <i class="users icon icon-left"></i>Nhân viên </a>
        <a class="item {{Request::is('*/transport_fees') ? 'active-bar': '' }}" href="/admin/transport_fees">
            <i class="shipping fast icon icon-left"></i>Phí vận chuyển </a>
@endif

</div>w


