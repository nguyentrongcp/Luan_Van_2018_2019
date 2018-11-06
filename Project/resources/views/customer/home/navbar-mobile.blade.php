@if(Request::is('home'))
    <ul id="m-home-nav-container" class="dropdown-content">
        <li>
            <span class="m-home-nav-title">Sắp xếp</span>
        </li>
        <li class="divider"></li>
        <li>
            <a data-filter="default" class="sort-default foody-sort waves-effect waves-light active">
                Mặc định
                <i class="material-icons right">clear_all</i>
            </a>
        </li>
        <li>
            <a data-filter="asc" class="sort-asc foody-sort waves-effect waves-teal">
                Giá tăng dần
                <i class="material-icons right">arrow_upward</i>
            </a>
        </li>
        <li>
            <a data-filter="desc" class="sort-desc foody-sort waves-effect waves-teal">
                Giá giảm dần
                <i class="material-icons right">arrow_downward</i>
            </a>
        </li>
        <li>
            <a data-filter="vote" class="sort-vote foody-sort waves-effect waves-teal">
                Đánh giá cao
                <i class="material-icons right">star</i>
            </a>
        </li>
        <li>
            <a data-filter="like" class="sort-like foody-sort waves-effect waves-teal">
                Yêu thích nhất
                <i class="material-icons right">favorite</i>
            </a>
        </li>
        <li>
            <a data-filter="buy" class="sort-buy foody-sort waves-effect waves-teal">
                Mua nhiều nhất
                <i class="material-icons right">shopping_cart</i>
            </a>
        </li>
        <li class="divider"></li>
        @if($logged == 'true')
            <li>
                <span class="m-home-nav-title">Khác</span>
            </li>
            <li class="divider"></li>
            <li>
                <a data-filter="favorite" class="type-favorite foody-type waves-effect waves-light">
                    Ẩm thực đã lưu
                    <i class="material-icons right">bookmark</i>
                </a>
            </li>
            <li class="divider"></li>
        @endif
        @if(\App\Functions::isSalesOff())
            @php $sales = \App\SalesOff::distinct('percent')->get(); @endphp
            <li>
                <span class="m-home-nav-title">Khuyến mãi</span>
            </li>
            <li class="divider"></li>
            <li>
                <a data-filter="sale" class="type-sale foody-type waves-effect waves-light">
                    Đang giảm giá
                    <i class="material-icons right">chevron_right</i>
                </a>
            </li>
            @foreach($sales as $sale)
                @if($sale->percent != null)
                    <li>
                        <a data-filter="sale" data-sales="{{ $sale->percent }}"
                           class="type-sale-{{ $sale->percent }}foody-type waves-effect waves-light">
                            Giảm giá {{ $sale->percent }}%
                            <i class="material-icons right">chevron_right</i>
                        </a>
                    </li>
                @endif
            @endforeach
            <li class="divider"></li>
        @endif
        <li>
            <span class="m-home-nav-title">Ẩm thực</span>
        </li>
        <li class="divider"></li>
        <li>
            <a data-filter="all" class="type-all foody-type waves-effect waves-light active">
                Xem tất cả
                <i class="material-icons right">chevron_right</i>
            </a>
        </li>
        @foreach($foody_types as $foody_type)
            @if($foody_type->foodies()->count() == 0)
                @continue
            @endif
            <li>
                <a data-filter="{{ $foody_type->id }}" class="type-{{ $foody_type->id }} foody-type waves-effect waves-teal">
                    {{ $foody_type->name }}
                    <i class="material-icons right">chevron_right</i>
                </a>
            </li>
        @endforeach
    </ul>
@endif