<div class="ui bottom attached tab segment {{ Request::has('lim') ? '': 'active' }}" data-tab="first">

    <div class="ui segment">
        <div class="ui tiny four statistics">

            <div class="statistic">
                <div class="value">
                    <i class="box icon"></i>
                    {{ \App\Dashboard::totalFoody() }}
                </div>
                <div class="label">
                    Ẩm thực
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner red heart icon"></i>
                    </i>
                    {{\App\Statistic::getTotalHotSales()}}
                </div>
                <div class="label">
                    Bán chạy nhất
                </div>
            </div>
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

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="box icon"></i>
                        <i class="bottom right corner red remove icon"></i>
                    </i>
                    {{\App\Statistic::getOutOffStock()}}
                </div>
                <div class="label">
                    Hết hàng
                </div>
            </div>
        </div>
    </div>
    @include('admin.statistic.foody.hot_foody')
</div>