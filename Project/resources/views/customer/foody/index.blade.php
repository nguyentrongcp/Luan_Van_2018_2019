@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - '.$foody->name)

@section('content')

    <div class="row" id="foody-info">

        <div class="col s12 m12 l5 left floated z-depth-1" style="line-height: 0; margin-bottom: 15px">
            <img class="responsive-img foody-image" src="{{ $foody->avatar }}"></img>
        </div>

        <div class="col s12 m12 l7 right floated foody-info" style="padding-left: 0">
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
                                <a href="#foody-comment-modal" class="modal-trigger">
                                    <i class="comment icon"></i>
                                    Bình luận
                                </a>
                            </li>
                            <li class="col s4 waves-effect waves-light">
                                <a href="#">
                                    <i class="pencil alternate icon"></i>
                                    Bài đăng
                                </a>
                            </li>
                            <li class="col s4 waves-effect waves-light">
                                <a href="#">
                                    <i class="images icon"></i>
                                    Hình ảnh
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s2 hide-on-med-and-down" style="height: 100px">
        </div>
        <div class="col s12 m12 l7 content-col">
            @include('customer.foody.involve-foody')

            @include('customer.foody.comment')

            {{--@include('customer.foody.image')--}}
        </div>
        <div class="col s12 m12 l3">
            @include('customer.foody.rating')
        </div>
    </div>

    @include('customer.foody.image-viewer')

    @include('customer.foody.comment-modal')

    @include('customer.foody.comment-modal-success')

    @include('customer.foody.style')

    @include('customer.foody.js')

@endsection