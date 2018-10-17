@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - '.$foody->name)

@section('content')

    @php $logged = Auth::guard('customer')->check() ? 'true' : 'false'; @endphp

    <div class="row section scrollspy" id="foody-info">

        <div class="col s12 m12 l5 z-depth-1" style="line-height: 0; margin-bottom: 15px">
            <img class="responsive-img foody-image" src="{{ $foody->avatar }}"></img>
        </div>

        <div class="col s12 m12 l7 foody-info" style="padding-left: 0">
            <div class="navigation truncate">
                <a href="#">Trang chủ</a>
                <i class="angle double right small icon"></i>
                <a href="#">Gà</a>
                <i class="angle double right small icon"></i>
                {{ $foody->name }}
            </div>
            <h5 class="foody-name">{{ $foody->name }}</h5>
            <div class="foody-cost">
                <span class="old-cost">1,000,000<sup>đ</sup></span>
                <span class="cost">{{ number_format($foody->currentCost()) }}<sup>đ</sup></span>
                <span>
                    <span class="ui red label pulse">Giảm giá 50%</span>
                </span>
                <span>
                    <span class="ui red label pulse">Mua 2 tặng 1</span>
                </span>
            </div>
            <div class="foody-describe">
                {{ $foody->describe }}
            </div>
            <div class="foody-rating">
                <i class="material-icons left">star</i>
                <i class="material-icons left">star</i>
                <i class="material-icons left">star</i>
                <i class="material-icons left">star_half</i>
                <i class="material-icons left">star_border</i>
                <span class="rate-number">3.5</span> / 5
                <span class="space">|</span>
                3.5 phục vụ
                <span class="space">|</span>
                3.5 giá cả
                <span class="space">|</span>
                3.5 ngon
            </div>
            <div class="foody-like">
                <a href="#" class="ui small label">
                    <i class="like active icon"></i>Bo Thích <span class="count">(281)</span>
                </a>
                <a href="#" class="ui small label">
                    <i class="star active icon"></i>Bo Thích <span class="count">(281)</span>
                </a>
            </div>
            <div class="foody-cart">
                <button data-amount="cart-add-{{ $foody->id }}" onclick="updateCart(this, {{ $foody->id }})"
                        class="waves-effect waves-light btn col s3" style="width: 170px">
                    <i class="shopping cart plus icon"></i>
                    Thêm vào giỏ
                </button>
                <input id="cart-amount-{{ $foody->id }}" class="input-field col s2 cart-number" type="number" value="1">
                <span class="cost cart-number">{{ number_format($foody->currentCost()) }}<sup>đ</sup></span>
            </div>
            <div class="foody-action navbar col s12">
                <nav class="grey darken-2">
                    <div class="nav-wrapper">
                        <ul>
                            <li class="col s4 text-center waves-effect waves-light">
                                <a id="foody-comment-show">
                                    <i class="comment icon"></i>
                                    Bình luận
                                </a>
                            </li>
                            <li class="col s4 waves-effect waves-light">
                                <a href="#">
                                    <i class="star icon"></i>
                                    Đánh giá
                                </a>
                            </li>
                            <li class="col s4 waves-effect waves-light">
                                <a onclick="$('#commentcomment').click()">
                                    <i class="share alternate icon"></i>
                                    Chia sẻ
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- Your share button code -->
            <div id="foody-share" class="fb-share-button hide" data-mobile_iframe="true">
            </div>
        </div>
    </div>

    <div class="row" id="foody-content-container">
        <div id="foody-scrollspy-container" class="col s2 hide-on-small-only foody-scrollspy-container">
            <ul class="section table-of-contents foody-scrollspy">
                <li><a href="#foody-info">Thông tin</a></li>
                <li><a href="#involve-foody-container">Cùng loại</a></li>
                <li><a href="#initialization">Đánh giá cao</a></li>
                <li><a href="#foody-images-container">Hình ảnh</a></li>
                <li><a href="#comment-container">Bình luận</a></li>
            </ul>
            <div class="slider-ads-portrait">
                <img src="/customer/image/slider-ads2.jpg">
            </div>
        </div>
        <div class="col s12 m12 l10 right foody-content-container">
            <div class="col s12 slider-ads-landscape">
                <img src="/customer/image/slider-ads.jpg">
            </div>
            <div id="foody-rating-show" class="col s12 m12 l4 right foody-rating-show">
                @include('customer.foody.rating')
            </div>
            <div class="col s12 m12 l8 content-col left">
                @include('customer.foody.involve-foody')

                @include('customer.foody.images')

                @include('customer.foody.comment')

                {{--@include('customer.foody.image')--}}
            </div>
        </div>
    </div>

    @include('customer.foody.image-viewer')

    @include('customer.foody.comment-modal')

    @include('customer.foody.comment-modal-success')

    @include('customer.foody.style')

    @include('customer.foody.js')

    @push('script')
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    @endpush

@endsection