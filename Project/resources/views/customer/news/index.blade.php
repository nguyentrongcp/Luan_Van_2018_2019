@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    @php $new = \App\News::find(4); @endphp

    <div class="row">
        <div class="col s12 m12 l8">
            <div class="news-container white">
                <div class="news-header">
                    Tin tức và khuyến mãi
                </div>

                <div class="row slider-ads-landscape">
                    <img src="/customer/image/slider-ads.jpg">
                </div>

                <div class="row news-row">
                    <div class="news-title">
                        {{ $new->title }}
                    </div>
                    <img class="news-image" src="{{ asset('/customer/image_news/1_0.jpg') }}">
                    <div class="news-content">
                        {!! $new->content !!}
                    </div>
                    <div class="news-footer">
                        <img src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&_nc_ht=scontent.fsgn5-4.fna&oh=970cbe0208f7900457f6f76cea55aa37&oe=5C8622CB"
                        >
                        <span>
                        <span class="news-footer-name">Nguyễn Đình Trọng</span>
                        <span class="news-footer-time">1 giờ trước</span>
                    </span>
                    </div>
                </div>
                <div class="divider"></div>

                @for($i=1; $i<20; $i++)
                    <div class="row news-row">
                        <div class="news-title">
                            Apple Pencil thế hệ thứ 2: 129$, gắn vào iPad để sạc không dây, chỉ dùng được với iPad Pro mới
                        </div>
                        <img class="news-image" src="{{ asset('/customer/image/slider4.jpg') }}">
                        <div class="news-content">
                            Cùng với việc ra mắt iPad Pro thế hệ mới thì Apple cũng giới thiệu Apple Pencil mới. Trên thế hệ thứ 2 này Apple đã thiết kế lại toàn bộ bên ngoài lẫn nâng cấp tính năng bên trong.
                        </div>
                        <div class="news-footer">
                            <img src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&_nc_ht=scontent.fsgn5-4.fna&oh=970cbe0208f7900457f6f76cea55aa37&oe=5C8622CB"
                            >
                            <span>
                        <span class="news-footer-name">Nguyễn Đình Trọng</span>
                        <span class="news-footer-time">1 giờ trước</span>
                    </span>
                        </div>
                    </div>
                    <div class="divider"></div>
                @endfor
            </div>
        </div>

        <div class="col s12 m12 l4">
            @include('customer.news.navbar.navbar')
        </div>
    </div>

    @include('customer.news.style')

    @include('customer.news.js')


@endsection