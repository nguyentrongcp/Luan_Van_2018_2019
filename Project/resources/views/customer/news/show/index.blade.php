@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thanh toán đơn hàng')

@section('content')

    @php $new = \App\News::find(4); @endphp

    <div class="row">
        <div class="col s12 m12 l8">
            <div class="white news-show-container">
                <div class="news-show-title">
                    {!! $new->title !!}
                </div>
                <img class="news-show-image" src="{{ asset('/customer/image_news/1_0.jpg') }}">
                <div class="news-show-content">
                    <div class="cont">
                        {!! $new->content !!}
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