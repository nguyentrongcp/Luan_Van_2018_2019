<div class="sixteen wide column">
    <h5 class="ui header small-td-margin">Thống kê theo giá trị đơn hàng (đơn vị: triệu đồng)</h5>
</div>
<div class="nine wide column">
    <div class="ui segment">
        <canvas id="order-value-chart"></canvas>
    </div>
</div>

@push('script')
    <script>
        buildChartValue();

        function buildChartValue() {
            let types = JSON.parse('{!! \App\Statistic::getOrderByYear() !!}');

            let labels = [], data = {unapproved: [], shipping: [], delivered: [], cancelled: []};

            let years = types.years;
            let unapproved = types.unapproved;
            let shipping = types.shipping;
            let delivered = types.delivered;
            let cancelled = types.cancelled;
            for (let i = 0; i < delivered.length; i++) {
                let u = getValidValue(unapproved[i],true);
                let s = getValidValue(shipping[i],true);
                let d = getValidValue(delivered[i],true);
                let c = getValidValue(cancelled[i],true);
                labels.push(years[i]);
                data.unapproved.push(u);
                data.shipping.push(s);
                data.delivered.push(d);
                data.cancelled.push(c);
            }
            let ctx = document.getElementById("order-value-chart").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        type: 'bar',
                        label: 'Chưa duyệt',
                        backgroundColor: '#FF9900',
                        borderColor: '#FF9900',
                        data: data.unapproved,
                        borderWidth: 2
                    }, {
                        type: 'bar',
                        label: 'Đang vận chuyển',
                        backgroundColor: '#66CCFF',
                        borderColor: '#66CCFF',
                        data: data.shipping,
                        borderWidth: 2
                    }, {
                        type: 'bar',
                        label: 'Đã giao hàng',
                        backgroundColor: '#33CC33',
                        borderColor: '#33CC33',
                        data: data.delivered,
                        borderWidth: 2
                    },
                        {
                            type: 'bar',
                            label: 'Đã hủy',
                            backgroundColor: '#FF0000',
                            borderColor: '#FF0000',
                            data: data.cancelled,
                            borderWidth: 2
                        }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    responsive: true,
                    tooltips: {mode: 'index', intersect: true,},
                    hover: {mode: 'nearest', intersect: true},
                    scales: {
                        xAxes: [{display: true, scaleLabel: {display: true, labelString: 'Năm'}}],
                        yAxes: [{display: true, scaleLabel: {display: true, labelString: 'Triệu đồng'}}]
                    }
                }
            });
        }
    </script>
@endpush