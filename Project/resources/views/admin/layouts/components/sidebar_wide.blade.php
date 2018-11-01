<div class="ui fixed inverted borderless menu full-height under-navbar"
     style="width: 220px; display: inline-block;background-color: #2EA8BD;">
    <div class="item" style="width: 200px">
        <a href="/admin"><img class="ui medium image" src="{{ asset('customer/image/logo.png') }}" alt="Logo"></a>
    </div>

    {{--@php--}}
        {{--$nhanVien = \App\NhanVien::find(\App\Helper\AuthHelper::adminId());--}}
    {{--@endphp--}}

    <a href="/admin/dashboard" class="title item {{ Request::is('*dashboard') ? 'active': '' }}">
        <i class="dashboard icon icon-left"></i>Tổng quan</a>

    {{--@if($nhanVien->checkQuyen(1))--}}
        <div class="ui accordion no-padding">
            <div class="title item menu-item-padding color-white {{ Request::is('*statistic*') ? 'active-bar': '' }}">
                <i class="chart bar icon icon-left icon-accordion"></i>
                Thống kê
                <i class="dropdown icon"></i>
            </div>

            <div class="content menu-item-padding color-white {{ Request::is('*statistic*') ? 'active': '' }}">
                <div class="menu"  style="padding-left: 10px">
                    <a href="{{route('revenue')}}" class="title item {{ Request::is('*revenue') ? 'active': '' }}">
                        <i class="dollar icon icon-left"></i>Thu chi</a>

                    <a href="{{route('order')}}" class="title item {{ Request::is('*thong_ke/don_hang') ? 'active': '' }}">
                        <i class="clipboard icon icon-left"></i>Đơn hàng</a>

                    <a href="{{route('foody')}}"
                       class="title item {{ Request::is('*thong_ke/san_pham') ? 'active' : '' }}">
                        <i class="warehouse icon icon-left"></i>Thực đơn</a>
                </div>
            </div>
        </div>
    {{--@endif--}}

    {{--@if($nhanVien->checkQuyen(3))--}}
        <a class="item {{ Request::is('*/foody_type') ? 'active-bar': '' }}" href="/admin/foody_type">
            <i class="sitemap icon icon-left"></i>Loại thực đơn</a>
    {{--@endif--}}

    {{--@if($nhanVien->checkQuyen(4))--}}
        <a class="item {{ Request::is('*admin/foodies*') ? 'active-bar': '' }}" href="/admin/foodies">
            <i class="box icon icon-left"></i>Thực đơn</a>
    {{--@endif--}}

    {{--@if($nhanVien->checkQuyen(6))--}}
        <a class="item {{Request::is('*/goods_receipt_note') ? 'active-bar': '' }}" href="/admin/goods_receipt_note">
            <i class="dolly icon icon-left"></i>Nhập hàng </a>
    {{--@endif--}}

    {{--@if($nhanVien->checkQuyen(7))--}}
        <a class="item {{Request::is('*admin/orders*') ? 'active-bar': '' }}" href="/admin/orders">
            <i class="clipboard icon icon-left"></i>Đơn hàng </a>
    {{--@endif--}}

    {{--@if($nhanVien->checkQuyen(8))--}}
        <a class="item {{Request::is('*/sales_offs') ? 'active-bar': '' }}" href="/admin/sales_offs">
            <i class="certificate icon icon-left"></i>Khuyến mãi </a>
    {{--@endif--}}


    <div class="ui accordion no-padding">
        <div class="title item menu-item-padding color-white {{ Request::is('*content*') ? 'active-bar': ''}}">
            <i class="newspaper icon icon-left icon-accordion"></i>
            Nội dung website
            <i class="dropdown icon"></i>
        </div>
        <div class="content menu-item-padding color-white">
            <div class="menu" style="padding-left: 10px">
                <a class="title item {{ Request::is('*shop_infos') ? 'active': '' }}"
                   href="{{route('shop_infos.index')}}">
                    <i class="info icon icon-left"></i>
                    Thông tin cửa hàng</a>
                <a  class="title item {{ Request::is('*sliders') ? 'active': '' }}"
                    href="{{route('sliders.index')}}">
                    <i class="certificate icon icon-left"></i>Slide quảng cáo</a>
                <a class="title item {{ Request::is('*news*') ? 'active': '' }}"
                   href="{{route('news.index')}}">
                    <i class="newspaper icon icon-left"></i>Tin tức</a>
            </div>
        </div>
    </div>
    {{--@if($nhanVien->isAdmin())--}}
        <a class="item {{Request::is('*/employeees') ? 'active-bar': '' }}" href="/admin/employees">
            <i class="users icon icon-left"></i>Nhân viên </a>
    {{--@endif--}}


</div>


