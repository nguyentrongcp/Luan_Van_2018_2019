@push('script')
    <script>
        $('#statistic-btn').on('click', function () {
            let type = $('#type').val();
            let data = {type: type};
            if (type === 'quarter') {
                data = {
                    type: type,
                    year: $('#year').val()
                }
            }
            else if (type === 'month') {
                data = {
                    type: type,
                    year: $('#year').val(),
                    month_start: $('#month-start').val(),
                    month_end: $('#month-end').val()
                }
            }
            else if (type === 'day') {
                data = {
                    type: type,
                    year: $('#year').val(),
                    month: $('#month-start').val(),
                    date_start: $('#day-start').val(),
                    date_end: $('#day-end').val()
                }
            }

            $.ajax({
                type: 'get',
                url: '{{ route('statistic.revenue.get') }}',
                data: data,
                success: function (data) {
                    if (data.status === 'error') {
                        return false;
                    }
                    buildChart(data);
                    buildTable(data);
                }
            })
        });

        $('#statistic-btn').click();

        function buildChart(data) {
            $('#revenue-chart').remove();
            $('#chart-viewer').append("<canvas id=\"revenue-chart\"></canvas>");
            let ctx = document.getElementById("revenue-chart").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.data.labels,
                    datasets: [
                        {
                            type: 'bar',
                            label: 'Mua vào',
                            backgroundColor: '#FF9900',
                            borderColor:  '#FF9900',
                            data: data.data.buy,
                            borderWidth: 2
                        }, {
                            type: 'bar',
                            label: 'Bán ra',
                            backgroundColor: '#66CCFF',
                            borderColor:  '#66CCFF',
                            data: data.data.sale,
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    responsive: true,
                    tooltips: {mode: 'index', intersect: true,},
                    hover: {mode: 'nearest', intersect: true},
                    scales: {
                        xAxes: [{display: true, scaleLabel: {display: true, labelString: $('#type option:selected').text()}}],
                        yAxes: [{display: true, scaleLabel: {display: true, labelString: 'Triệu đồng'}}]
                    }
                }
            });
        }

        function buildTable(data) {
            $('#table-revenue').empty();
            $('#table-revenue-total').empty();
            $('#table-title').text($('#type option:selected').text());
            $total = {
                'buy' : 0,
                'sale' : 0,
                'minus': 0
            };
            $.each(data.data.labels, function (key, value) {
                $total['buy'] += parseFloat(data.data.buy[key]);
                $total['sale'] += parseFloat(data.data.sale[key]);
                let minus = parseFloat(data.data.sale[key]) - parseFloat(data.data.buy[key]);
                $total['minus'] += minus;
                $('#table-revenue').append("<tr>" +
                    "<td>" + value + "</td>" +
                    "<td>" + numeral(data.data.buy[key]).format('0,0.00') + "</td>" +
                    "<td>" + numeral(data.data.sale[key]).format('0,0.00') + "</td>" +
                    "<td>" + numeral(minus).format('0,0.00') + "</td>" +
                    "</tr>")
            });
            $('#table-revenue-total').append("<tr>" +
                "<th><b>" + 'Tổng' + "</b></th>" +
                "<th><b>" + numeral($total['buy']).format('0,0.00') + "</b></th>" +
                "<th><b>" + numeral($total['sale']).format('0,0.00') + "</b></th>" +
                "<th><b>" + numeral($total['minus']).format('0,0.00') + "</b></th>" +
                "</tr>")
        }
    </script>
@endpush