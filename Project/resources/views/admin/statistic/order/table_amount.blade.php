<div class="seven wide column">
    <table class="ui very compact table celled striped center aligned" id="order-amount-table">
        <thead>
        <tr>
            <th id="duration"></th>
            <th>Chưa duyệt</th>
            <th>Đang vận chuyển</th>
            <th>Đã giao hàng</th>
            <th>Đã hủy</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

@push('script')
    <script>

        {{--$('#type').on('change',function () {--}}
            {{--let type = $('#type').val();console.log(type);--}}
            {{--if (type === 'year'){--}}
                {{--buildTableAmount(types);--}}
            {{--}--}}
            {{--if (type === 'month'){--}}
                {{--let types = JSON.parse('{!! \App\Statistic::getOrderByMonth() !!}');--}}
                buildTableAmount();


        //     }
        //
        // });
        function buildTableAmount() {
            let types = JSON.parse('{!! \App\Statistic::getOrderByYear() !!}');
            let labels = types.years;
            let unapproved = types.unapproved;
            let shipping = types.shipping;
            let delivered = types.delivered;
            let cancelled = types.cancelled;
            let tbody = buildTableBodyAmount(labels,unapproved, shipping, delivered, cancelled);
            $('#order-amount-table').find('tbody').html(tbody);
        }

        function buildTableBodyAmount(labels,unapproved, shipping, delivered, cancelled) {
            let tbody = '';
            let unapprovedSum = 0, shippingSum = 0, deliveredSum = 0, cancelledSum = 0;
            for (let i = 0; i < labels.length; i++) {
                tbody += buildRowAmount(unapproved[i], shipping[i], delivered[i], cancelled[i]);
                unapprovedSum += parseFloat(unapproved[i].total);
                shippingSum += parseFloat(shipping[i].total);
                deliveredSum += parseFloat(delivered[i].total);
                cancelledSum += parseFloat(cancelled[i].total);
            }
            tbody += `<tr>
                <td><strong>Tổng cộng:</strong></td>
                <td><strong>${unapprovedSum}</strong></td>
                <td><strong>${shippingSum}</strong></td>
                <td><strong>${deliveredSum}</strong></td>
                <td><strong>${cancelledSum}</strong></td>

            </tr>`;
            return tbody;
        }

        function buildRowAmount(u, s, d, c) {
            if (u.total == 0 && s.total == 0 && d.total == 0 && c.total == 0)
                return '';
            let tr = '';
            tr += `<tr>
                <td><strong>${u.label}</strong></td>
                <td>${u.total}</td>
                <td>${s.total}</td>
                <td>${d.total}</td>
                <td>${c.total}</td>
            </tr>`;
            return tr;
        }
    </script>
@endpush
