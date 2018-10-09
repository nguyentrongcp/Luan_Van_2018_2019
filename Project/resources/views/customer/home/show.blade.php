<div class="col s12 m9 l9 show-foody" id="show-foody">
    <div class="row"></div>

    @foreach($foodies as $foody)
        <div class="col s12 m6 l4 foody-card">

            <div class="ui cards hoverable">
                <div class="card">
                    <div class="image">
                        <img src="{{ $foody->avatar }}">
                    </div>
                    <div class="content" style="padding-bottom: 5px">
                        <a class="header truncate tooltipped" href="{{ route('customer.foody.show', [$foody->slug]) }}"
                           data-position="top" data-tooltip="{{ $foody->name }}">
                            {{ $foody->name }}</a>
                        <span>
                            <span class="old-cost">1,000,000</span>
                            <sup>đ</sup>
                        </span>
                        <span class="cost">145,000<sup>đ</sup></span>
                        <span class="ui mini red label">- 60%</span>
                        <div class="meta">
                            <span class="right floated">
                                <i class="comment icon"></i><span>3</span>
                            </span>
                            <span class="right floated">
                                <i class="heart icon"></i>
                                <span id="liked-{{ $foody->id }}">{{ $foody->getLiked() }}</span>
                            </span>
                        </div>

                    </div>
                    <div class="extra content">
                        <span id="like-{{ $foody->id }}" data-target="{{ $foody->id }}"
                              onclick="like(this)" class="left floated like">
                              @if(!Auth::guard('customer')->check())
                                <i id="i-like-{{ $foody->id }}" class="like icon"></i>
                                <a id="a-like-{{ $foody->id }}">Thích</a>
                              @elseif(empty($foody->likes()->where('customer_id', Auth::guard('customer')->user()->id)->first()))
                                <i id="i-like-{{ $foody->id }}" class="like icon"></i>
                                <a id="a-like-{{ $foody->id }}">Thích</a>
                              @else
                                <i id="i-like-{{ $foody->id }}" class="like active icon"></i>
                                <a id="a-like-{{ $foody->id }}">Bỏ thích</a>
                              @endif
                        </span>
                        <span id="favorite-{{ $foody->id }}" class="right floated star"
                              onclick="favorite(this)" data-target="{{ $foody->id }}">
                            @if(!Auth::guard('customer')->check())
                                <i id="i-favorite-{{ $foody->id }}" class="star icon"></i>
                                <a id="a-favorite-{{ $foody->id }}">Quan tâm</a>
                            @elseif(empty($foody->favorites()->where('customer_id', Auth::guard('customer')->user()->id)->first()))
                                <i id="i-favorite-{{ $foody->id }}" class="star icon"></i>
                                <a id="a-favorite-{{ $foody->id }}">Quan tâm</a>
                            @else
                                <i id="i-favorite-{{ $foody->id }}" class="star active icon"></i>
                                <a id="a-favorite-{{ $foody->id }}">Bỏ quan tâm</a>
                            @endif
                        </span>
                    </div>
                    <a id="add-cart-{{ $foody->id }}" data-target="{{ $foody->id }}"
                       onclick="updateCart(this, {{ $foody->id }})" class="ui bottom attached button">
                        <i class="cart plus icon"></i>
                        Thêm vào giỏ
                        <span id='cart-added-home-{{ $foody->id }}'>
                            @if(Cart::getCountByID($foody->id) > 0)
                                (<span class='red-text'>{{ Cart::getCountByID($foody->id) }}</span>)
                            @endif
                        </span>

                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@include('customer.home.style')

@include('customer.home.js')