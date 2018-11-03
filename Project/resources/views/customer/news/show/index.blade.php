@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    <div class="row">
        <div id="news-content" class="col s12 m12 l8">
            <div class="white news-show-container">
                <div class="news-show-title">
                    <div class="til">{!! $news->title !!}</div>
                    <img src="{{ asset('/customer/image_news/2_0.jpg') }}">
                    <div class="share">
                        <iframe src="https://www.facebook.com/plugins/like.php?href={{ urlencode(Request::url()) }}&layout=button_count&action=like&size=large&show_faces=false&share=false&height=28&appId"
                                width="100" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                        <iframe src="https://www.facebook.com/plugins/share_button.php?href={{ urlencode(Request::url()) }}&layout=button_count&size=large&mobile_iframe=true&height=28&appId"
                                width="110" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
                <div class="news-show-author">
                    <img class="author-img" src="{{ asset('/customer/image_news/1_0.jpg') }}">
                    <span class="author-name">
                         {{ $news->admin->name }}
                    </span>
                    <span class="time hide-on-small-only">
                        Đăng ngày {{ date_format(date_create($news->date), 'd-m-Y H:i') }}
                    </span>
                </div>
                <div class="news-time hide-on-med-and-up">
                    Đăng ngày {{ date_format(date_create($news->date), 'd-m-Y H:i') }}
                </div>
                {{--<div class="news-show-share">--}}

                {{--</div>--}}
                <div class="news-show-content">
                    <div class="cont">
                        {!! $news->content !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12 m12 l4">
            @include('customer.news.navbar.navbar')
        </div>
    </div>

    @include('customer.news.show.style')


@endsection