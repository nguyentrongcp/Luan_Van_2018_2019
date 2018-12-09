@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - '.$foody->name)

@php
    $logged = Auth::guard('customer')->check() ? 'true' : 'false';
    $voted = 'false';
    if ($logged == 'true') {
        if (\App\VoteDetail::where('foody_id', $foody->id)->where('customer_id', Auth::guard('customer')->user()->id)->count() > 0) {
            $voted = 'true';
        }
    }
@endphp

{{--@section('meta')--}}
    {{--<meta property="og:url"           content="{{ Request::url() }}" />--}}
    {{--<meta property="og:type"          content="website" />--}}
    {{--<meta property="og:title"         content="fastfoody.vn - {{ $foody->name }}" />--}}
    {{--<meta property="og:description"   content="{{ $foody->describe }}" />--}}
    {{--<meta property="og:image:url"     content="{{ asset($foody->avatar) }}"/>--}}
    {{--<meta property="og:image:width" content="400" />--}}
    {{--<meta property="og:image:height" content="300" />--}}
{{--@endsection--}}

@section('content')

    <div class="row section scrollspy" id="foody-info">

        <div class="col s12 m12 l5 z-depth-1" style="line-height: 0; margin-bottom: 15px">
            <img class="responsive-img foody-image" src="{{ asset($foody->avatar) }}">
        </div>

        <div class="col s12 m12 l7 foody-info" style="padding-left: 0">
            <div class="navigation truncate">
                <a href="{{ route('customer.home') }}">Trang chủ</a>
                <i class="angle double right small icon"></i>
                <a id="foody-type" href="#">{{ $foody->foodyType->name }}</a>
                <i class="angle double right small icon"></i>
                {{ $foody->name }}
            </div>
            <h5 class="foody-name">{{ $foody->name }}</h5>
            <div class="foody-cost">
                @if($foody->isSalesOff())
                    <span class="old-cost-container">
                        <span class="old-cost">{{ number_format($foody->currentCost()) }}</span><sup>đ</sup>
                    </span>
                    <span class="cost">{{ number_format($foody->getSaleCost()) }}<sup>đ</sup></span>
                    <span class="ui red label pulse">Giảm giá {{ $foody->getSalePercent() }}%</span>
                @else
                    <span class="cost">{{ number_format($foody->currentCost()) }}<sup>đ</sup></span>
                @endif
            </div>
            <div class="foody-describe">
                <div class="cont">
                    {!! $foody->describe !!}
                </div>
            </div>
            <div class="foody-rating">
                @if($votes != null)
                    @for($i=1; $i<=5; $i++)
                        @if($i <= $votes->average)
                            {{--<i class="material-icons left">star</i>--}}
                            <i class="fas fa-star"></i>
                        @elseif(number_format($votes->average) == $i)
                            <i class="fas fa-star-half-alt"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                    <span class="rate-number-avg">{{ $votes->average }}</span> / 5
                    <span class="space">|</span>
                    <span class="rate-number">{{ $votes->attitude }}</span> phục vụ
                    <span class="space">|</span>
                    <span class="rate-number">{{ $votes->cost }}</span> giá cả
                    <span class="space">|</span>
                    <span class="rate-number">{{ $votes->quality }}</span> ngon
                @else
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                    <span class="rate-number">Chưa có đánh giá nào</span>
                @endif
            </div>
            <div class="foody-like">
                <a class="ui label" id="foody-like">
                    @if(!Auth::guard('customer')->check())
                        <i class="heart outline icon"></i>Thích
                    @else
                        @if($foody->checkLiked(Auth::guard('customer')->user()->id))
                            <i class="heart icon" data-like="active"></i>
                            Bỏ thích
                        @else
                            <i class="heart outline icon"></i>
                            Thích
                        @endif
                    @endif
                        <span class="count">({{ $foody->getLiked() }})</span>
                </a>
                <a id="foody-favorite" class="ui label">
                    @if(!Auth::guard('customer')->check())
                        <i class="bookmark outline icon"></i>Lưu
                    @else
                        @if($foody->checkFavorited(Auth::guard('customer')->user()->id))
                            <i class="bookmark icon"></i>Bỏ lưu
                        @else
                            <i class="bookmark outline icon"></i>Lưu
                        @endif
                    @endif
                </a>
                <iframe src="https://www.facebook.com/plugins/share_button.php?href={{ urlencode(Request::url()) }}&layout=button_count&size=large&mobile_iframe=true&height=28&appId"
                         height="28" width="170" style="border:none;overflow:hidden;vertical-align: bottom;margin-left: 30px;" scrolling="no"
                        frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

            </div>
            <div class="foody-cart">
                @if($foody->getQuantity() == 0)
                    <span style="margin-top: 15px; margin-bottom: 15px" class='ui large red label'>Ẩm thực tạm hết</span>
                @else
                    @if($foody->is_deleted)
                        <span style="margin-top: 15px; margin-bottom: 15px" class='ui large red label'>Ẩm thực đã ngừng bán</span>
                    @else
                        <button id="add-cart-button" data-qty="add" data-id="{{ $foody->id }}"
                                class="waves-effect waves-light btn col s3" style="width: 170px">
                            <i class="shopping cart plus icon"></i>
                            Thêm vào giỏ
                        </button>
                        <input id="add-cart-qty" class="input-field col s2 cart-number number-only" type="number" value="1">
                        <span id="add-cart-cost" class="cost cart-number">{{ number_format($foody->getSaleCost()) }}<sup>đ</sup></span>
                    @endif
                @endif
            </div>
            <div class="foody-action navbar col s12">
                <nav class="grey darken-2">
                    <div class="nav-wrapper">
                        <ul>
                            <li class="col s6 text-center waves-effect waves-light">
                                <a class="foody-comment-show">
                                    <i class="comment icon"></i>
                                    Bình luận
                                </a>
                            </li>
                            <li class="col s6 waves-effect waves-light">
                                <a class="foody-rating-modal-show">
                                    <i class="star icon"></i>
                                    Đánh giá
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="row" id="foody-content-container">
        @include('customer.foody.navbar.navbar')

        <div class="col s12 m12 l10 right foody-content-container">
            <div class="col s12 slider-ads-landscape">
                <img src="/customer/image/slider-ads.jpg">
            </div>
            <div id="foody-rating-show" class="col s12 m12 l4 right foody-rating-show">
                @include('customer.foody.rating.rating')
            </div>
            <div class="col s12 m12 l8 content-col left">

                @if(count($images) > 0)
                    <div class="row section scrollspy" id="foody-images-container">
                        {{--@include('customer.foody.images')--}}
                        @include('customer.foody.images-public')
                    </div>
                @endif

                @include('customer.foody.comment.comment')

                @include('customer.foody.involve-foody')

                {{--@include('customer.foody.image')--}}
            </div>
        </div>
    </div>

    @include('customer.foody.image-viewer')

    @include('customer.foody.comment.comment-modal')

    @include('customer.foody.vote.rating-modal')

    @include('customer.foody.comment.comment-modal-success')

    @include('customer.layouts.components.modal.require-modal')

    @include('customer.foody.style')

    @include('customer.foody.js')

@endsection