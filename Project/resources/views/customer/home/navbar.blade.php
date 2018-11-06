<div class="col s12 m3 l3 hide-on-small-only" id="home-nav-container">
    <div class="row">
        <h6><b>Sắp xếp</b></h6>
        <div class="divider"></div>

        <div class="col s12 home-nav">
            <a data-filter="default" class="sort-default foody-sort waves-effect waves-teal btn white black-text btn-fluid active">
                Mặc định
                <i class="material-icons left">clear_all</i>
            </a>
        </div>

        <div class="col s12 home-nav">
            <a data-filter="asc" class="sort-asc foody-sort waves-effect waves-teal btn white black-text btn-fluid">
                Giá tăng dần
                <i class="material-icons left">arrow_upward</i>
            </a>
        </div>

        <div class="col s12 home-nav">
            <a data-filter="desc" class="sort-desc foody-sort waves-effect waves-teal btn white black-text btn-fluid">
                Giá giảm dần
                <i class="material-icons left">arrow_downward</i>
            </a>
        </div>

        <div class="col s12 home-nav">
            <a data-filter="vote" class="sort-vote foody-sort waves-effect waves-teal btn white black-text btn-fluid">
                Đánh giá cao
                <i class="material-icons left">star</i>
            </a>
        </div>

        <div class="col s12 home-nav">
            <a data-filter="like" class="sort-like foody-sort waves-effect waves-teal btn white black-text btn-fluid">
                Yêu thích nhất
                <i class="material-icons left">favorite</i>
            </a>
        </div>

        <div class="col s12 home-nav">
            <a data-filter="buy" class="sort-buy foody-sort waves-effect waves-teal btn white black-text btn-fluid">
                Mua nhiều nhất
                <i class="material-icons left">shopping_cart</i>
            </a>
        </div>
    </div>

    @if($logged == 'true')
        <div class="row">
            <h6><b>Khác</b></h6>
            <div class="divider"></div>

            <div class="col s12 home-nav">
                <a data-filter="favorite" class="type-favorite foody-type waves-effect waves-teal btn white black-text btn-fluid">
                    Ẩm thực đã lưu
                    <i class="material-icons left">bookmark</i>
                </a>
            </div>
        </div>
    @endif

    @if(\App\Functions::isSalesOff())
        @php $sales = \App\SalesOff::distinct('percent')->get(); @endphp
        <div class="row">
            <h6><b>Khuyến mãi</b></h6>
            <div class="divider"></div>
            <div class="col s12 home-nav">
                <a data-filter="sale" class="type-sale waves-effect waves-teal btn white black-text foody-type btn-fluid">
                    Đang giảm giá
                    <i class="material-icons right">chevron_right</i>
                </a>
            </div>
            @foreach($sales as $sale)
                @if($sale->percent != null)
                    <div class="col s12 home-nav">
                        <a data-filter="sale" data-sales="{{ $sale->percent }}"
                           class="type-sale-{{ $sale->percent }} waves-effect waves-teal btn white black-text foody-type btn-fluid">
                            Giảm giá {{ $sale->percent }}%
                            <i class="material-icons right">chevron_right</i>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    @endif


    <div class="row">
        <h6><b>Ẩm thực</b></h6>
        <div class="divider"></div>
        <div class="col s12 home-nav">
            <a data-filter="all" class="type-all waves-effect waves-teal btn white black-text btn-fluid foody-type active">
                Xem tất cả
                <i class="material-icons right">chevron_right</i>
            </a>
        </div>
        @foreach($foody_types as $foody_type)
            @if($foody_type->foodies()->count() == 0)
                @continue
            @endif
            <div class="col s12 home-nav">
                <a data-filter="{{ $foody_type->id }}"
                   class="type-{{ $foody_type->id }} waves-effect waves-teal btn white black-text btn-fluid foody-type">
                    <span class="truncate left" style="max-width: calc(100% - 35px)">{{ $foody_type->name }}</span>
                    <i class="material-icons right">chevron_right</i>
                </a>
            </div>
        @endforeach
    </div>
</div>