<div class="ui segment">
    <h4 class="ui header">Số lượng thực đơn theo loại</h4>
    <div class="holder">
        <canvas id="product-ptype-chart"></canvas>
    </div>
</div>

@push('script')
    <script>
        let totalType = JSON.parse('{!! \App\Statistic::getAmountType() !!}');
        let color = d3.scaleOrdinal(d3.schemeCategory20c);
        let arrayColor = [];
        for (let i = 1; i <= totalType; i++) {
            arrayColor[i] = color(i);
        }
        let ptypeProducts = JSON.parse('{!! \App\Statistic::getProductAmountByType() !!}');
        let typeColor = arrayColor;
        buildChart('product-ptype-chart', 'doughnut', ptypeProducts, 'name', typeColor);
    </script>
@endpush