@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    @php $new = \App\News::find(24); @endphp

    <div class="row">
        <div class="col s12 m12 l8">
            <div class="news-container white">
                <div class="news-header">
                    Tin tức và khuyến mãi
                </div>

                <div class="row slider-ads-landscape">
                    <img src="/customer/image/slider-ads.jpg">
                </div>

                @foreach($newses as $news)
                    <div class="row news-row">
                        <div class="news-title">
                            <a href="{{ route('customer.news.show', $news->slug) }}" class="black-text">
                                {!! $news->title !!}
                            </a>
                        </div>
                        <img class="news-image" src="{{ asset($news->avatar) }}">
                        <div class="news-content">
                            @php
                                $news_content = $news->content;
                                            do {
                                                $length = strpos($news_content, '</p>') - strpos($news_content, '<p>') - 3;
                                                $content = substr($news_content, strpos($news_content, '<p>') + 3, $length);
                                                $news_content = substr($news_content, strpos($news_content, $content) + 4 + strlen($content));
                                            }
                                            while(strpos($content, '<img') === 0);
                            @endphp
                            {!! $content !!}
                        </div>
                        <div class="news-footer">
                            <img src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&_nc_ht=scontent.fsgn5-4.fna&oh=970cbe0208f7900457f6f76cea55aa37&oe=5C8622CB"
                            >
                            <span>
                        <span class="news-footer-name">{{ $news->admin->name }}</span>
                        <span class="news-footer-time">
                            {{ \App\Functions::getTimeCount(date_create($news->date)->getTimestamp()) }}
                        </span>
                    </span>
                        </div>
                    </div>
                    <div class="divider"></div>
                @endforeach
            </div>
        </div>

        <div class="col s12 m12 l4">
            @include('customer.news.navbar.navbar')
        </div>
    </div>

    @include('customer.news.style')

    @include('customer.news.js')


@endsection