<div class="seven wide column">
    <table class="ui very compact table celled striped center aligned" id="order-value-table">
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
        buildTableValue();

        function buildTableValue() {
            let types = JSON.parse('{!! \App\Statistic::getOrderByYear() !!}');

            let unapproved = types.unapproved;
            let shipping = types.shipping;
            let delivered = types.delivered;
            let cancelled = types.cancelled;
            let tbody = buildTableBody(unapproved, shipping, delivered, cancelled);

            $('#order-value-table').find('tbody').html(tbody);
        }

        function buildTableBody(unapproved, shipping, delivered, cancelled) {
            let tbody = '';
            let unapprovedSum = 0, shippingSum = 0, deliveredSum = 0, cancelledSum = 0;
            for (let i = 0; i < delivered.length; i++) {
                tbody += buildRow(unapproved[i], shipping[i], delivered[i], cancelled[i]);
                unapprovedSum += parseFloat(unapproved[i].extra);
                shippingSum += parseFloat(shipping[i].extra);
                deliveredSum += parseFloat(delivered[i].extra);
                cancelledSum += parseFloat(cancelled[i].extra);
            }
            tbody += `<tr>
                <td><strong>Tổng cộng:</strong></td>
                <td><strong>${unapprovedSum.toFixed(2)}</strong></td>
                <td><strong>${shippingSum.toFixed(2)}</strong></td>
                <td><strong>${deliveredSum.toFixed(2)}</strong></td>
                <td><strong>${cancelledSum.toFixed(2)}</strong></td>

            </tr>`;
            return tbody;
        }

        function buildRow(u, s, d, c) {
            if (u.extra == 0 && s.extra == 0 && d.extra == 0 && c.extra == 0)
                return '';
            let tr = '';
            tr += `<tr>
                <td><strong>${u.year}</strong></td>
                <td>${u.extra}</td>
                <td>${s.extra}</td>
                <td>${d.extra}</td>
                <td>${c.extra}</td>
            </tr>`;
            return tr;
        }
    </script>
@endpush
