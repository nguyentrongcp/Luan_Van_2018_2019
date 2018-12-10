<div class="ui bottom attached tab segment {{ Request::has('lim') ? '': 'active' }}" data-tab="first">

    <div class="ui segment">
        <div class="ui tiny three statistics">

            <div class="statistic">
                <div class="value">
                    <i class="box icon"></i>
                    {{ \App\Dashboard::totalFoody() }}
                </div>
                <div class="label">
                    Món ăn
                </div>
            </div>

            {{--<div class="statistic">--}}
                {{--<div class="value">--}}
                    {{--<i class="icons">--}}
                        {{--<i class="box icon"></i>--}}
                        {{--<i class="bottom right corner red heart icon"></i>--}}
                    {{--</i>--}}
                    {{--{{\App\Statistic::getTotalHotSales()}}--}}
                {{--</div>--}}
                {{--<div class="label">--}}
                    {{--Bán chạy nhất--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner red certificate icon"></i>
                    </i>
                    {{ \App\Statistic::getFoodyAmountOnSale() }}
                </div>
                <div class="label">
                    Đang khuyến mãi
                </div>
            </div>

            @php
                $count = 0;
                foreach(\App\Foody::all() as $foody) {
                    if ($foody->getQuantity() == 0) {
                        $count++;
                    }
                }
            @endphp
            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner red remove icon"></i>
                    </i>
                    {{ $count }}
                </div>
                <div class="label">
                    Hết hàng
                </div>
            </div>
        </div>
    </div>
    @include('admin.statistic.foody.hot_foody')
</div>