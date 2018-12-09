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
                url: '{{ route('statistic.order.get') }}',
                data: data,
                success: function (data) {
                    if (data.status === 'error') {
                        return false;
                    }
                    chartAmount(data);
                    chartCost(data);
                }
            })
        });

        $('#statistic-btn').click();

        function chartAmount(data) {
            $('#order-amount-chart').remove();
            $('#char-amount-viewer').append("<canvas id=\"order-amount-chart\"></canvas>");
            let ctx = document.getElementById("order-amount-chart").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.data.labels,
                    datasets: [
                        {
                            type: 'bar',
                            label: 'Đơn hàng',
                            backgroundColor: '#33CC33',
                            borderColor:  '#33CC33',
                            data: data.data.amount,
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
                        yAxes: [{display: true, scaleLabel: {display: true, labelString: 'Số lượng'}}]
                    }
                }
            });

            $('#table-amount').empty();
            $('#table-amount-total').empty();
            $('#table-amount-title').text($('#type option:selected').text());
            $total = 0;
            $.each(data.data.labels, function (key, value) {
                $total += parseInt(data.data.amount[key]);
                $('#table-amount').append("<tr>" +
                    "<td>" + value + "</td>" +
                    "<td>" + data.data.amount[key] + "</td>" +
                    "</tr>")
            });
            $('#table-amount-total').append("<tr>" +
                "<th><b>" + 'Tổng' + "</b></th>" +
                "<th><b>" + $total + "</b></th>" +
                "</tr>")
        }

        function chartCost(data) {
            $('#order-cost-chart').remove();
            $('#char-cost-viewer').append("<canvas id=\"order-cost-chart\"></canvas>");
            let ctx = document.getElementById("order-cost-chart").getContext('2d');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.data.labels,
                    datasets: [
                        {
                            type: 'bar',
                            label: 'Số tiền',
                            backgroundColor: '#33CC33',
                            borderColor:  '#33CC33',
                            data: data.data.cost,
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

            $('#table-cost').empty();
            $('#table-cost-total').empty();
            $('#table-cost-title').text($('#type option:selected').text());
            $total = 0;
            $.each(data.data.labels, function (key, value) {
                $total += parseFloat(data.data.cost[key]);
                $('#table-cost').append("<tr>" +
                    "<td>" + value + "</td>" +
                    "<td>" + numeral(parseFloat(data.data.cost[key])).format('0,0.00') + "</td>" +
                    "</tr>")
            });
            $('#table-cost-total').append("<tr>" +
                "<th><b>" + 'Tổng' + "</b></th>" +
                "<th><b>" + numeral($total).format('0,0.00') + "</b></th>" +
                "</tr>")
        }
    </script>
@endpush