@include('customer.layouts.partials.header')

@section('title', 'fastfoody.vn - Thức ăn nhanh, ngon, tiện lợi')

<body>

    <div id="background-index"></div>
    <div class="index-container">
        <div class="row">
            <div id="type-container" class="col s12 m12 l5 type-container">
                <div class="col s12 page-title">
                    <div class="page-logo">
                        <img src="{{ asset('/customer/image/logo-white.png') }}">
                    </div>
                    <div class="page-describe white-text center-align">
                        Thế giới ẩm thực dành cho bạn
                    </div>
                </div>
                <div class="col s12">
                    <div class="til white-text">Có {{ count($foodies) }} món ăn và nước uống đang chờ bạn</div>
                    <div class="input-field col s12" style="margin-top: 0">
                        <input id="search" type="text" placeholder="Món ăn, nước uống, đơn hàng..." autocomplete="off">
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                    </div>
                    <a data-type="all" class="foody-type waves-effect waves-light ui large label">Tất cả</a>
                    @foreach($foody_types as $foody_type)
                        <a data-type="{{ $foody_type->id }}"
                           class="foody-type waves-effect waves-light ui large label">{{ $foody_type->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="col s12 m12 l7 index-info-container right">

                @if(\App\Functions::isSalesOff())
                    <div class="index-row index-foody-container">
                        <div class="til truncate">
                    <span>
                        Ẩm thực đang giảm giá
                    </span>
                            <a style="cursor: pointer" onclick="getFoodyByType('sale',null,'{{ route('home.get_foody') }}')">
                                Xem tất cả
                            </a>
                        </div>
                        <div class="divider"></div>
                        <div class="index-foody">
                            @php $count = 0; @endphp
                            @foreach($foody_sales as $foody)
                                @if($count == 6)
                                    @break
                                @endif
                                @php $foody = \App\Foody::find($foody->id); $count++ @endphp
                                <div class="foody-row col s4">
                                    <div class="z-depth-1 hoverable">
                                        <a href="{{ route('customer.foody.show', $foody->slug) }}">
                                            <div class="foody-image">
                                                <img src="{{ asset($foody->avatar) }}">
                                            </div>
                                            <div class="foody-content">
                                                <div class="foody-name truncate">
                                                    {{ $foody->name }}
                                                </div>
                                                <div class="foody-type truncate">
                                                    {{ $foody->foodyType->name }}
                                                </div>
                                            </div>
                                            <div class="divider"></div>
                                            <div class="foody-cost center-align">
                                            <span class="old">
                                                <span>{{ number_format($foody->currentCost()) }}</span><sup>đ</sup>
                                            </span>
                                                {{ number_format($foody->getSaleCost()) }}<sup>đ</sup>
                                                <span>-{{ $foody->getSalePercent() }}%</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="index-row index-foody-container">
                    <div class="til truncate">
                    <span>
                        Ẩm thực đang hot
                    </span>
                        <a style="cursor: pointer" onclick="getFoodyByType(null,'buy','{{ route('home.get_foody') }}')">
                            Xem tất cả
                        </a>
                    </div>
                    <div class="divider"></div>
                    <div class="index-foody">
                        @php $count = 0; @endphp
                        @foreach($foody_buys as $foody)
                            @if($count == 6)
                                @break
                            @endif
                            @php $foody = \App\Foody::find($foody['id']); $count++ @endphp
                            <div class="foody-row col s4">
                                <div class="z-depth-1 hoverable">
                                    <a href="{{ route('customer.foody.show', $foody->slug) }}">
                                        <div class="foody-image">
                                            <img src="{{ asset($foody->avatar) }}">
                                        </div>
                                        <div class="foody-content">
                                            <div class="foody-name truncate">
                                                {{ $foody->name }}
                                            </div>
                                            <div class="foody-type truncate">
                                                {{ $foody->foodyType->name }}
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="foody-cost center-align">
                                            {{ number_format($foody->getSaleCost()) }}<sup>đ</sup>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="index-row index-news">
                    <div class="til truncate">
                    <span>
                        Tin tức và khuyến mãi
                    </span>
                        <a href="{{ route('customer.news.index') }}">
                            Xem tất cả
                        </a>
                    </div>
                    <div class="divider"></div>
                    <div class="index-news-content">
                        @foreach($newses as $key => $news)
                            <div class="news-row">
                                <div class="news-image">
                                    <img src="{{ asset($news->avatar) }}">
                                </div><div class="news-content">
                                    <a href="{{ route('customer.news.show', $news->slug) }}" class="til truncate">
                                        {!! $news->title !!}
                                    </a>
                                    <div class="cont truncate-twolines">
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
                                    <div class="time">
                                        {{ \App\Functions::getTimeCount(date_create($news->date)->getTimestamp()) }}
                                    </div>
                                </div>
                            </div>
                            @if ($key == 4)
                                @break
                            @endif
                            @if ($key != count($newses) - 1)
                                <div class="divider"></div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="index-row index-guide">
                    <div class="til center-align">
                        <span>
                            Sử dụng <span class="teal-text">Fastfoody.vn</span> rất dễ dàng
                        </span>
                    </div>
                    <div class="col s12 index-guide-content">
                        <div class="col s4 guide-col">
                            <label class="ui circular large label guide-step">1</label>
                            <div class="col s12 center-align guide-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <div class="col s12 center-align guide-text">
                                Chọn món ăn hoặc nước uống
                            </div>
                        </div>
                        <div class="col s4 guide-col">
                            <label class="ui circular large label guide-step">2</label>
                            <div class="col s12 center-align guide-icon">
                                <i class="fas fa-cart-plus"></i>
                            </div>
                            <div class="col s12 center-align guide-text">
                                Thêm vào giỏ hàng
                            </div>
                        </div>
                        <div class="col s4 guide-col">
                            <label class="ui circular large label guide-step">3</label>
                            <div class="col s12 center-align guide-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="col s12 center-align guide-text">
                                Thanh toán và giao hàng tận nơi
                            </div>
                        </div>
                    </div>
                </div>

                <div class="index-row index-guide">
                    <div class="til center-align">
                        <span>
                            <span class="teal-text">Fastfoody.vn</span> có những gì?
                        </span>
                    </div>
                    <div class="col s12 index-info">
                        <div class="col s12">
                            <i class="material-icons left teal-text">remove</i>
                            <span class="info-text">{{ count($foodies) }} ẩm thực khác nhau, chất lượng ngon, giá rẻ</span>
                        </div>
                        <div class="col s12">
                            <i class="material-icons left teal-text">remove</i>
                            <span class="info-text">Bình luận, chia sẻ, giao lưu với các thành viên khác của Fastfoody.vn</span>
                        </div>
                        <div class="col s12">
                            <i class="material-icons left teal-text">remove</i>
                            <span class="info-text">Giao hàng tận nơi trong nội ô TP.Cần Thơ, <b>một món cũng giao hàng</b></span>
                        </div>
                        <div class="col s12">
                            <i class="material-icons left teal-text">remove</i>
                            <span class="info-text">Miễn phí giao hàng với các đơn hàng trên 400k</span>
                        </div>
                        <div class="col s12">
                            <i class="material-icons left teal-text">remove</i>
                            <span class="info-text">Thanh toán trực tuyến thông qua cổng Ngân Lượng</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




    @include('customer.layouts.components.search-result')
    @include('customer.index.style')
    @include('customer.index.js')

</body>

@include('customer.layouts.partials.footer')