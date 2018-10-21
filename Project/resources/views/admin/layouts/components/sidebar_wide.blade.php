<div class="ui fixed inverted borderless menu full-height under-navbar"
     style="width: 220px; display: inline-block">
    <div class="item">
        <a href="/admin"><img class="ui image" src="{{ asset('customer/image/logo.png') }}" alt="Logo"></a>
    </div>

    {{--@php--}}
        {{--$nhanVien = \App\NhanVien::find(\App\Helper\AuthHelper::adminId());--}}
    {{--@endphp--}}

    <a href="/admin" class="title item {{ Request::is('admin') ? 'active': '' }}">
        <i class="dashboard icon icon-left"></i>Tổng quan</a>

    {{--@if($nhanVien->checkQuyen(1))--}}
        <div class="ui accordion item no-padding">
            <div class="title item menu-item-padding color-white {{ Request::is('*thong_ke*') ? 'active-bar': '' }}">
                <i class="chart bar icon icon-left icon-accordion"></i>
                Thống kê
                <i class="dropdown icon"></i>
            </div>

            <div class="content {{ Request::is('*thong_ke*') ? 'active': '' }}">
                <div class="menu">
                    <a href="" class="title item {{ Request::is('*thu_chi') ? 'active': '' }}">
                        <i class="dollar icon icon-left"></i>Thu chi</a>

                    <a href="" class="title item {{ Request::is('*thong_ke/don_hang') ? 'active': '' }}">
                        <i class="clipboard icon icon-left"></i>Đơn hàng</a>

                    <a href=""
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
        <a class="item {{Request::is('*admin/don_hang*') ? 'active-bar': '' }}" href="/admin/don_hang">
            <i class="clipboard icon icon-left"></i>Đơn hàng </a>
    {{--@endif--}}

    {{--@if($nhanVien->checkQuyen(8))--}}
        <a class="item {{Request::is('*/khuyen_mai') ? 'active-bar': '' }}" href="/admin/khuyen_mai">
            <i class="certificate icon icon-left"></i>Khuyến mãi </a>
    {{--@endif--}}

    {{--@if($nhanVien->checkQuyen(9))--}}
        <div class="ui accordion item no-padding">
            <div class="title item menu-item-padding color-white {{ Request::is('*noi_dung*') ? 'active-bar': ''}}">
                <i class="newspaper icon icon-left icon-accordion"></i>
                Nội dung website
                <i class="dropdown icon"></i>
            </div>

            <div class="content {{ Request::is('*noi_dung*') ? 'active': ''}}">
                <div class="menu">
                    <a  class="title item {{ Request::is('*slider') ? 'active': '' }}"
                        href="">
                        <i class="certificate icon icon-left"></i>Slide quảng cáo</a>

                    <a class="title item {{ Request::is('*info') ? 'active': '' }}"
                       href="">
                        <i class="info icon icon-left"></i>
                        Thông tin cửa hàng</a>

                    <a class="title item {{ Request::is('*menu') ? 'active': '' }}"
                       href="">
                        <i class="list icon icon-left"></i>Menu</a>

                    <a class="title item {{ Request::is('*news*') ? 'active': '' }}"
                       href="">
                        <i class="newspaper icon icon-left"></i>Tin tức</a>
                </div>
            </div>
        </div>
    {{--@endif--}}

    {{--@if($nhanVien->isAdmin())--}}
        <a class="item {{Request::is('*/nhan_vien') ? 'active-bar': '' }}" href="/admin/nhan_vien">
            <i class="users icon icon-left"></i>Nhân viên </a>
    {{--@endif--}}


</div>


