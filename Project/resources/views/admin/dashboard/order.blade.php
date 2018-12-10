<div class="ui segment">
    <h4 class="ui header">Tình trạng đơn hàng</h4>
    <div class="holder">
        <canvas id="order-chart"></canvas>
    </div>
</div>

@push('script')
    <script>
        let orders = JSON.parse('{!! \App\Dashboard::getOrdersStatus() !!}');
        let orderColors = ['#FF9900','#66CCFF','#33CC33','#FF0000'];
        buildChart('order-chart', 'pie', orders, 'label', orderColors);
    </script>
@endpush