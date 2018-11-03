<div class="ui grid stackable">
    <div class="ten wide column">
        <h4 class="ui header">Thực đơn theo loại</h4>
        <div class="ui segment">
            <canvas id="product-type-chart"></canvas>
        </div>
    </div>

    <div class="six wide column">
        <h4 class="ui header right aligned">
            <span class="pointer"
                  {{--onclick="showExport('Thong ke so luong san pham theo loai', cols, rows)">--}}
                  onclick="showExport('Thong ke so luong san pham theo loai', cols, rows)">
            <i class="file pdf outline red icon fitted"></i>
            PDF
        </span></h4>
        <table class="ui very compact table celled striped center aligned" id="product-type-table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Loại sản phẩm</th>
                <th>Số lượng</th>
            </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
            <tr>
                <th colspan="2"><strong>Tổng cộng</strong></th>
                <th>{{ \App\Dashboard::totalFoody() }}</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

@push('script')
    <script>
        let cols = ['STT', 'Loai', 'So luong'];
        let rows = [];

        let types = JSON.parse('{!! \App\Statistic::getFoodyType() !!}');
        let totalType = JSON.parse('{!! \App\Dashboard::getAmountType() !!}');
        let color = d3.scaleOrdinal(d3.schemeCategory20);
        let arrayColor = [];
        for (let i = 1; i <= totalType; i++) {
            arrayColor[i] = color(i);
        }

        let labels = [], data = [];
        let tbody = '';
        types.forEach((type, idx) => {
            labels.push(type.label);
            data.push(type.value);
            tbody += tableRow(idx, type);
            // rows.push([idx+1, toAscii(type.label), type.value]);
        });

        $('#product-type-table').find('tbody').html(tbody);

        let ctx = document.getElementById("product-type-chart").getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: arrayColor,
                    borderColor: arrayColor,
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
                    xAxes: [{display: true, scaleLabel: {display: true, labelString: 'Loại thực đơn'}}],
                    yAxes: [{display: true, scaleLabel: {display: true, labelString: 'Số lượng'}}]
                }
            }
        });

        function tableRow(idx, data) {
            return `<tr><td>${idx + 1}</td><td class='left aligned'>${data.label}</td><td>${data.value}</td></tr>`;
        }
    </script>
@endpush