<div class="ui bottom attached tab segment {{ Request::has('lim') ? '': 'active' }}" data-tab="first">

    <div class="ui segment">
        <div class="ui tiny five statistics">

            <div class="statistic">
                <div class="value">
                    <i class="clipboard icon"></i>
                    {{ \App\Dashboard::totalOrders() }}
                </div>
                <div class="label">
                    Đơn hàng
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="clipboard icon"></i>
                        <i class="bottom right corner warning open fitted orange icon"></i>
                    </i>
                    {{\App\Statistic::getTotalOrderNotApproved()}}
                </div>
                <div class="label">
                    Chưa duyệt
                </div>
            </div>
            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="clipboard icon"></i>
                        <i class="bottom right corner green shipping icon"></i>
                    </i>
                    {{ \App\Statistic::getTotalOrdershipping() }}
                </div>
                <div class="label">
                    Đang vận chuyển
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="clipboard icon"></i>
                        <i class="bottom right corner check open fitted green icon"></i>
                    </i>
                    {{ \App\Statistic::getTotalOrderdelivered() }}
                </div>
                <div class="label">
                    Đã giao hàng
                </div>
            </div>

            <div class="statistic">
                <div class="value">
                    <i class="icons">
                        <i class="clipboard icon"></i>
                        <i class="bottom right corner red remove icon"></i>
                    </i>
                    {{\App\Statistic::getTotalOrdercancelled()}}
                </div>
                <div class="label">
                    Đã hủy
                </div>
            </div>
        </div>
    </div>

{{--    @include('admin.statistic.foody.foody_type')--}}
</div>