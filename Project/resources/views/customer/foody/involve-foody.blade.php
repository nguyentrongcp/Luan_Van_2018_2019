@if($foody_type->foodies()->count() > 1)
    <div id="involve-foody-container" class="row white section scrollspy">
        <div class="col s12 content">
            <span class="content-header">Cùng loại</span>
            <div class="divider" style="margin-bottom: 10px"></div>
            @foreach($foody_type->foodies as $key => $foody_involve)
                @if($foody_involve->is_deleted)
                    @continue
                @endif
                @if($foody->id == $foody_involve->id)
                    @continue
                @endif
                @if($key > 0)
                    <div class="divider" style="margin-bottom: 5px !important;"></div>
                @endif
                <div class="row">
                    <div class="row">
                        <div class="col s4 m3 l3">
                            <img class="responsive-img" src="{{ $foody_involve->avatar }}">
                        </div>
                        <div class="col s8 involve-foody-name">
                            <a href="#" class="truncate">{{ $foody_involve->name }}</a>
                            <span class="cost">{{ number_format($foody_involve->currentCost()) }}<sup>đ</sup></span>
                            <span class="describe truncate">{{ $foody_involve->describe }}</span>
                        </div>
                        @if($foody_involve->getQuantity() != 0)
                            <div class="col s1 hide-on-small-only involve-foody-action right-align">
                                <a class="ui small label cart-update" data-id="{{ $foody_involve->id }}">
                                    <i class="ui plus icon"></i></a>
                            </div>
                        @endif
                    </div>
                    @if($foody_involve->getQuantity() != 0)
                        <a class="s12 hide-on-med-and-up ui attached button waves-effect waves-light cart-update"
                           data-id="{{ $foody_involve->id }}" style="margin-bottom: 5px">
                            <i class="cart plus icon"></i>Thêm vào giỏ hàng
                        </a>
                    @endif
                </div>
                @if($key == 7)
                    @break
                @endif
            @endforeach

            {{--<div class="row">--}}
            {{--<div class="row">--}}
            {{--<div class="col s4 m3 l3">--}}
            {{--<img class="responsive-img" src="{{ $foody->avatar }}">--}}
            {{--</div>--}}
            {{--<div class="col s8 involve-foody-name">--}}
            {{--<span class="col s12"><a href="#" class="truncate">{{ $foody->name }}</a></span>--}}
            {{--<span class="cost">{{ number_format($foody->currentCost()) }}<sup>đ</sup></span>--}}
            {{--</div>--}}
            {{--<div class="col s1 hide-on-small-only involve-foody-action right-align">--}}
            {{--<a href="#" class="ui small label"><i class="ui plus icon"></i></a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<a class="s12 hide-on-med-and-up ui attached button waves-effect waves-light" style="margin-bottom: 5px">--}}
            {{--<i class="cart plus icon"></i>Thêm vào giỏ hàng--}}
            {{--</a>--}}
            {{--</div>--}}

        </div>


        <div class="col s12 involve-footer">
            <a onclick="getFoodyByType('{{ $foody_type->id }}',null,'{{ route('home.get_foody') }}')"
               class="ui attached teal button waves-effect waves-light">
                Xem tất cả
            </a>
        </div>
    </div>
@endif

{{--<div class="row white">--}}
    {{--<div class="col s12 content">--}}
        {{--<span class="content-header">Đánh giá cao</span>--}}
        {{--<div class="divider" style="margin-bottom: 10px"></div>--}}

        {{--@foreach($foody_type->foodies as $key => $foody)--}}
            {{--@if($key > 0)--}}
                {{--<div class="divider" style="margin-bottom: 5px !important;"></div>--}}
            {{--@endif--}}
            {{--<div class="row">--}}
                {{--<div class="row">--}}
                    {{--<div class="col s4 m3 l3">--}}
                        {{--<img class="responsive-img" src="{{ $foody->avatar }}">--}}
                    {{--</div>--}}
                    {{--<div class="col s8 involve-foody-name">--}}
                        {{--<a href="#" class="truncate">{{ $foody->name }}</a>--}}
                        {{--<span class="cost">{{ number_format($foody->currentCost()) }}<sup>đ</sup></span>--}}
                        {{--<span class="describe truncate">{{ $foody->describe }}</span>--}}
                    {{--</div>--}}
                    {{--<div class="col s1 hide-on-small-only involve-foody-action right-align">--}}
                        {{--<a href="#" class="ui small label"><i class="ui plus icon"></i></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<a class="s12 hide-on-med-and-up ui attached button waves-effect waves-light" style="margin-bottom: 5px">--}}
                    {{--<i class="cart plus icon"></i>Thêm vào giỏ hàng--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--@if($key == 7)--}}
                {{--@break--}}
            {{--@endif--}}
        {{--@endforeach--}}

    {{--</div>--}}


    {{--<div class="col s12 involve-footer">--}}
        {{--<a href="#" class="ui attached teal button waves-effect waves-light">--}}
            {{--Xem tất cả--}}
        {{--</a>--}}
    {{--</div>--}}
{{--</div>--}}