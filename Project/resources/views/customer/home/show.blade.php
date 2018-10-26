<div class="col s12 m9 l9 show-foody" id="show-foody">

    <div class="row slider-ads-landscape">
        <img src="/customer/image/slider-ads.jpg">
    </div>

    <div id="home-foody-container">
        @foreach($foodies as $foody)
            <div class="row white show-foody-row">
                <div class="col s12 m4 l4 show-foody-image">
                    <img src="{{ asset($foody->avatar) }}" class="responsive-img">
                </div>
                <div class="col s12 m8 l8 show-foody-content">
                    <div class="show-foody-title truncate">
                        <a class="black-text" href="{{ route('customer.foody.show', [$foody->slug]) }}">{{ $foody->name }}</a>
                    </div>
                    <div class="show-foody-cost"><span class="cost">
                        {{ number_format($foody->getSaleCost()) }}<sup>đ</sup>
                    </span></div>
                    <div class="show-foody-describe">{!! $foody->describe !!}</div>
                    <div class="show-foody-rating">
                        @if($foody->getVoted() != null)
                            <span class="rating-icon">
                            @for($i=1; $i<=5; $i++)
                                    @if($i <= $foody->getVoted()->average)
                                        <i class="material-icons">star</i>
                                    @elseif(number_format($foody->getVoted()->average) == $i)
                                        <i class="material-icons">star_half</i>
                                    @else
                                        <i class="material-icons">star_border</i>
                                    @endif
                                @endfor
                        </span>
                            <span class="rating-number">
                            <b>{{ $foody->getVoted()->average }}</b> / 5
                        </span>
                            <span class="rating-spacing">|</span>
                        @endif
                        <span>
                        <i class="like icon" style="font-size: 12px"></i>
                            {{ $foody->likes()->count() }}
                    </span>
                        <span class="rating-spacing">|</span>
                        <span>
                        <i class="comment icon" style="font-size: 12px"></i> 13
                    </span>
                        <span class="show-foody-favorite">
                        @if(Auth::guard('customer')->check())
                                @if($foody->favorites()->where('customer_id', Auth::guard('customer')->user()->id)->count() > 0)
                                    <a onclick="favorite(this,{{ $foody->id }})" class="tooltipped"
                                       data-tooltip="Lưu món ăn" data-position="left">
                                     <i id="favorite-{{ $foody->id }}" class="bookmark icon"></i>
                                </a>
                                @else
                                    <a onclick="favorite(this,{{ $foody->id }})" class="tooltipped"
                                       data-tooltip="Lưu món ăn" data-position="left">
                                     <i id="favorite-{{ $foody->id }}" class="bookmark outline icon"></i>
                                </a>
                                @endif
                            @else
                                <a onclick="favorite(this,{{ $foody->id }})" class="tooltipped"
                                   data-tooltip="Lưu món ăn" data-position="left">
                                <i id="favorite-{{ $foody->id }}" class="bookmark outline icon"></i>
                            </a>
                            @endif
                    </span>
                    </div>
                    <div class="show-foody-action">
                        <a class="waves-effect waves-light btn" data-id="{{ $foody->id }}" onclick="updateCart(this)">
                            <i class="cart plus icon"></i>
                            Thêm vào giỏ
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('customer.home.style2')