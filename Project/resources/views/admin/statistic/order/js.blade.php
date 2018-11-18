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
                            label: 'Chưa duyệt',
                            backgroundColor: '#FF9900',
                            borderColor:  '#FF9900',
                            data: data.data.amount.unapproved,
                            borderWidth: 2
                        }, {
                            type: 'bar',
                            label: 'Đang vận chuyển',
                            backgroundColor: '#66CCFF',
                            borderColor:  '#66CCFF',
                            data: data.data.amount.shipping,
                            borderWidth: 2
                        }, {
                            type: 'bar',
                            label: 'Đã giao hàng',
                            backgroundColor: '#33CC33',
                            borderColor:  '#33CC33',
                            data: data.data.amount.delivered,
                            borderWidth: 2
                        },
                        {
                            type: 'bar',
                            label: 'Đã hủy',
                            backgroundColor: '#FF0000',
                            borderColor:  '#FF0000',
                            data: data.data.amount.cancelled,
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
            $total = {
                'unapproved' : 0,
                'shipping' : 0,
                'delivered' : 0,
                'cancelled' : 0,
            };
            $.each(data.data.labels, function (key, value) {
                $total['unapproved'] += parseInt(data.data.amount.unapproved[key]);
                $total['shipping'] += parseInt(data.data.amount.shipping[key]);
                $total['delivered'] += parseInt(data.data.amount.delivered[key]);
                $total['cancelled'] += parseInt(data.data.amount.cancelled[key]);
                $('#table-amount').append("<tr>" +
                    "<td>" + value + "</td>" +
                    "<td>" + data.data.amount.unapproved[key] + "</td>" +
                    "<td>" + data.data.amount.shipping[key] + "</td>" +
                    "<td>" + data.data.amount.delivered[key] + "</td>" +
                    "<td>" + data.data.amount.cancelled[key] + "</td>" +
                    "</tr>")
            });
            $('#table-amount-total').append("<tr>" +
                "<th><b>" + 'Tổng' + "</b></th>" +
                "<th><b>" + $total['unapproved'] + "</b></th>" +
                "<th><b>" + $total['shipping'] + "</b></th>" +
                "<th><b>" + $total['delivered'] + "</b></th>" +
                "<th><b>" + $total['cancelled'] + "</b></th>" +
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
                            label: 'Chưa duyệt',
                            backgroundColor: '#FF9900',
                            borderColor:  '#FF9900',
                            data: data.data.cost.unapproved,
                            borderWidth: 2
                        }, {
                            type: 'bar',
                            label: 'Đang vận chuyển',
                            backgroundColor: '#66CCFF',
                            borderColor:  '#66CCFF',
                            data: data.data.cost.shipping,
                            borderWidth: 2
                        }, {
                            type: 'bar',
                            label: 'Đã giao hàng',
                            backgroundColor: '#33CC33',
                            borderColor:  '#33CC33',
                            data: data.data.cost.delivered,
                            borderWidth: 2
                        },
                        {
                            type: 'bar',
                            label: 'Đã hủy',
                            backgroundColor: '#FF0000',
                            borderColor:  '#FF0000',
                            data: data.data.cost.cancelled,
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
            $total = {
                'unapproved' : 0,
                'shipping' : 0,
                'delivered' : 0,
                'cancelled' : 0,
            };
            $.each(data.data.labels, function (key, value) {
                $total['unapproved'] += parseFloat(data.data.cost.unapproved[key]);
                $total['shipping'] += parseFloat(data.data.cost.shipping[key]);
                $total['delivered'] += parseFloat(data.data.cost.delivered[key]);
                $total['cancelled'] += parseFloat(data.data.cost.cancelled[key]);
                $('#table-cost').append("<tr>" +
                    "<td>" + value + "</td>" +
                    "<td>" + numeral(parseFloat(data.data.cost.unapproved[key])).format('0,0.00') + "</td>" +
                    "<td>" + numeral(parseFloat(data.data.cost.shipping[key])).format('0,0.00') + "</td>" +
                    "<td>" + numeral(parseFloat(data.data.cost.delivered[key])).format('0,0.00') + "</td>" +
                    "<td>" + numeral(parseFloat(data.data.cost.cancelled[key])).format('0,0.00') + "</td>" +
                    "</tr>")
            });
            $('#table-cost-total').append("<tr>" +
                "<th><b>" + 'Tổng' + "</b></th>" +
                "<th><b>" + numeral($total['unapproved']).format('0,0.00') + "</b></th>" +
                "<th><b>" + numeral($total['shipping']).format('0,0.00') + "</b></th>" +
                "<th><b>" + numeral($total['delivered']).format('0,0.00') + "</b></th>" +
                "<th><b>" + numeral($total['cancelled']).format('0,0.00') + "</b></th>" +
                "</tr>")
        }
    </script>
@endpush