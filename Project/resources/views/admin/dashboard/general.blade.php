
<div class="ui segment">
    <div class="ui mini four statistics">
        <div class="statistic">
            <div class="value">
                <i class="box icon"></i>
                {{ \App\Statistic::totalFoody() }}
            </div>
            <div class="label">
                Thực đơn
            </div>
        </div>

        <div class="statistic">
            <div class="value">
                <i class="comments outline icon"></i>
                {{ \App\Statistic::totalCommentNotApproved() }}
            </div>
            <div class="label">
                Bình luận chưa duyệt
            </div>
        </div>

        <div class="statistic">
            <div class="value">
                <i class="clipboard icon"></i>
                {{ \App\Statistic::totalOrders() }}
            </div>
            <div class="label">
                Đơn hàng
            </div>
        </div>

        <div class="statistic">
            <div class="value">
                VNĐ
                {{ \App\Statistic::totalRevenue() }}
            </div>
            <div class="label">
                Doanh thu
            </div>
        </div>
    </div>
</div>