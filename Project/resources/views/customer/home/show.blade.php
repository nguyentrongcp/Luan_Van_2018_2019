<div class="col s12 m9 l9" id="show-foody">
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
                        <b class="red-text">145,000<sup>đ</sup></b>
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
                    <a id="add-cart-{{ $foody->id }}" data-target="{{ $foody->id }}" onclick="addCart(this)"
                       class="ui bottom attached button">
                        <i class="cart plus icon"></i>
                        Thêm vào giỏ (<span id="cart-added-home-{{ $foody->id }}" class="red-text">
                            {{ Cart::matchedFoody($foody->id)->qty }}
                        </span>)
                    </a>
                </div>
            </div>

            {{--<div class="card hoverable">--}}
                {{--<div class="card-image">--}}
                    {{--650 x 350--}}
                    {{--<img src="{{ $foody->avatar }}">--}}
                    {{--<a class="btn-floating halfway-fab waves-effect waves-light red tooltipped"--}}
                       {{--data-position="top" data-tooltip="Thêm vào giỏ hàng">--}}
                        {{--<i class="material-icons">add_shopping_cart</i>--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<div class="row">--}}
                        {{--<a href="#">--}}
                            {{--<p class="truncate black-text tooltipped" data-position="top"--}}
                               {{--data-tooltip="{{ $foody->name }}">--}}
                                {{--<b>{{ $foody->name }}</b></p></a>--}}
                    {{--</div>--}}
                    {{--<div class="row">--}}
                        {{--<span>--}}
                            {{--<span class="old-cost">1,000,000</span>--}}
                            {{--<sup>đ</sup>--}}
                        {{--</span>--}}
                        {{--<b class="red-text">145,000<sup>đ</sup></b>--}}
                        {{--<span class="ui small label red">- 60%</span>--}}
                    {{--</div>--}}
                    {{--<div class="row show-foody-footer">--}}
                        {{--<div class="col s2 m4 l4">--}}
                            {{--<i class="material-icons left">star</i>4.5--}}
                        {{--</div>--}}
                        {{--<div class="col s2 m4 l4">--}}
                            {{--<i class="material-icons left">comment</i>1333--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-action">--}}
                    {{--<a href="#" class="black-text">--}}
                        {{--<i class="material-icons left">favorite</i>Yêu thích</a>--}}
                    {{--<div class="col s2">--}}

                    {{--</div>--}}
                    {{--<div class="col s5">--}}
                        {{--<i class="material-icons left" style="margin-right: 0">star</i><small>4.5</small>--}}
                    {{--</div>--}}
                    {{--<div class="col s5" style="margin-left: 0 !important;">--}}
                        {{--<i class="material-icons left" style="margin-right: 0">star</i><small>4.5</small>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    @endforeach
</div>

<style>
    .foody-card {
        padding: 0 3px 10px 3px !important;
    }

    /*.card-content {*/
        /*padding-bottom: 5px !important;*/
    /*}*/

    .meta .right.floated {
        margin-left: 7px !important;
    }

    .meta .icon {
        margin-right: 3px !important;
    }

    .ui.cards .content .header {
        font-size: 15px !important;
    }

    .content a:hover {
        color: black !important;
    }

    /*.card-action a {*/
        /*margin-right: 0 !important;*/
    /*}*/

    .card .meta {
        font-size: 12px !important;
    }

    /*.card-action i {*/
        /*color: red !important;*/
    /*}*/

    .ui.cards {
        margin: 0;
    }

    .ui.cards>.card>.button {
        margin: 0;
        width: 100%;
    }

    .extra.content {
        font-size: 12px !important;
    }

    .ui.cards>.card {
        margin: 0;
    }

    /*.row.show-foody-footer {*/
        /*font-size: 10px;*/
        /*margin-bottom: 0;*/
        /*margin-top: 5px;*/
    /*}*/

    /*.row.show-foody-footer i.left {*/
        /*font-size: 15px;*/
        /*margin-right: 5px;*/
    /*}*/
    /*.card-action i.left {*/
        /*margin-right: 0;*/
    /*}*/

    /*.card-action .row {*/
        /*margin: -14% -21%;*/
    /*}*/

    /*.card-action .col {*/
        /*height: 33px;*/
    /*}*/

</style>

@include('customer.home.js')