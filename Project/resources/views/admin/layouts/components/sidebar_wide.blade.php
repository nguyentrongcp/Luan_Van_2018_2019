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
                <div class="menu" style="padding-left: 10px">
                    <a href="{{route('revenue')}}"
                       class="title item {{ Request::is('*statistic/revenue') ? 'active': '' }}">
                        <i class="dollar icon icon-left"></i>Thu chi</a>

                    <a href="{{route('order')}}"
                       class="title item {{ Request::is('*statistic/order') ? 'active': '' }}">
                        <i class="clipboard icon icon-left"></i>Đơn hàng</a>

                    <a href="{{route('foody')}}"
                       class="title item {{ Request::is('*statistic/foody') ? 'active' : '' }}">
                        <i class="utensils icon icon-left"></i>Món ăn</a>
                </div>
            </div>
        </div>
    @endif

    @if($employee->checkRoles(2))
        <a class="item {{ Request::is('*/foody_type') ? 'active-bar': '' }}" href="/admin/foody_type">
            <i class="sitemap icon icon-left"></i>Loại món ăn</a>
    @endif

    @if($employee->checkRoles(3))
        <a class="item {{ Request::is('*admin/foodies*')||Request::is('*/foody_type/*') ? 'active-bar': '' }}"
           href="/admin/foodies">
            <i class="utensils icon icon-left"></i>Món ăn</a>
    @endif
    @if($employee->checkRoles(4))
        <a class="item {{Request::is('*/material')|| Request::is('*/materials/*')|| Request::is('*/material') ? 'active-bar': '' }}"
           href="/admin/material">
            <i class="nutritionix icon icon-left"></i>Nguyên liệu </a>
    @endif
    @if($employee->checkRoles(5))
        <a class="item {{Request::is('*/goods_receipt_note')|| Request::is('*/goods_receipt_note_detail/*')|| Request::is('*/goods_receipt') ? 'active-bar': '' }}"
           href="/admin/goods_receipt_note">
            <i class="dolly icon icon-left"></i>Nhập hàng </a>
    @endif

    @if($employee->checkRoles(6))
        <a class="item {{Request::is('*admin/orders*') ? 'active-bar': '' }}" href="/admin/orders">
            <i class="clipboard icon icon-left"></i>Đơn hàng </a>
    @endif

    @if($employee->checkRoles(7))
        <a class="item {{Request::is('*/sales_offs') ? 'active-bar': '' }}" href="/admin/sales_offs">
            <i class="certificate icon icon-left"></i>Khuyến mãi </a>
    @endif

    @if($employee->checkRoles(8))

        <div class="ui accordion no-padding">
            <div class="title item menu-item-padding color-white {{ Request::is('*content*') ? 'active-bar': ''}}">
                <i class="newspaper icon icon-left icon-accordion"></i>
                Nội dung website
                <i class="dropdown icon"></i>
            </div>
            <div class="content menu-item-padding color-white {{ Request::is('*content*') ? 'active': ''}}">
                <div class="menu" style="padding-left: 10px">
                    <a class="title item {{ Request::is('*shop_infos') ? 'active': '' }}"
                       href="/admin/content/shop_infos">
                        <i class="info icon icon-left"></i>
                        Thông tin cửa hàng</a>
                    {{--<a class="title item {{ Request::is('*sliders') ? 'active': '' }}"--}}
                       {{--href="/admin/content/sliders">--}}
                        {{--<i class="certificate icon icon-left"></i>Slide quảng cáo</a>--}}
                    <a class="title item {{ Request::is('*news') ? 'active': '' }}"
                       href="/admin/content/news">
                        <i class="newspaper icon icon-left"></i>Tin tức</a>
                </div>
            </div>
        </div>
    @endif
    @if($employee->checkRoles(9))
        <a class="item {{Request::is('*/transport_fees') ? 'active-bar': '' }}" href="/admin/transport_fees">
            <i class="shipping fast icon icon-left"></i>Phí vận chuyển </a>
    @endif
    @if($employee->isAdmin())
        <a class="item {{Request::is('*/employees') ? 'active-bar': '' }}" href="/admin/employees">
            <i class="users icon icon-left"></i>Nhân viên </a>
    @endif

    <div class="ui accordion no-padding">
        <div class="title item menu-item-padding color-white {{ Request::is('*restore*') ? 'active-bar': ''}}">
            <i class="newspaper icon icon-left icon-accordion"></i>
            Phục hồi
            <i class="dropdown icon"></i>
        </div>
        <div class="content menu-item-padding color-white {{ Request::is('*restore*') ? 'active': ''}}">
            <div class="menu" style="padding-left: 10px">
                @if($employee->checkRoles(2))
                    <a class="title item {{ Request::is('*foody_type_restore') ? 'active': '' }}"
                       href="{{route('foody_type_restore.index')}}">
                        <i class="sitemap icon icon-left"></i>Loại ẩm thực</a>
                @endif
                @if($employee->checkRoles(3))
                    <a class="title item {{ Request::is('*foody_restore') ? 'active': '' }}"
                       href="{{route('foody_restore.index')}}">
                        <i class="utensils icon icon-left"></i>Ẩm thực</a>
                @endif
                @if($employee->checkRoles(4))
                    <a class="title item {{ Request::is('*material_restore') ? 'active': '' }}"
                       href="{{route('material_restore.index')}}">
                        <i class="nutritionix icon icon-left"></i>Nguyên liệu</a>
                @endif
                @if($employee->checkRoles(5))
                    <a class="title item {{ Request::is('*goods_receipt_note_restore') ? 'active': '' }}"
                       href="{{route('goods_receipt_note_restore.index')}}">
                        <i class="dolly icon icon-left"></i>Nhập hàng</a>
                @endif
                @if($employee->checkRoles(6))
                    <a class="title item {{ Request::is('*order_restore') ? 'active': '' }}"
                       href="{{route('order_restore.index')}}">
                        <i class="clipboard icon icon-left"></i>Đơn hàng</a>
                @endif
                @if($employee->isAdmin())
                    <a class="title item {{ Request::is('*employee_restore') ? 'active': '' }}"
                       href="{{route('employee_restore.index')}}">
                        <i class="users icon icon-left"></i>Nhân viên</a>
                @endif
            </div>
        </div>
    </div>
</div>



