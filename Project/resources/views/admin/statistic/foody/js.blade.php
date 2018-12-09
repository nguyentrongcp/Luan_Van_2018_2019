@push('script')
    <script>
        $('#type').change(function () {
            let val = $(this).val();
            $('.select-hide').addClass('hidden');
            if (val === 'all') {
                $('.select-hide').addClass('hide');
            }
            if (val === 'day' || val === 'today') {
                $('#select-day').removeClass('hidden');
            }
            if (val === 'days') {
                $('#select-day-start').removeClass('hidden');
                $('#select-day-end').removeClass('hidden');
                $('#select-day').addClass('hidden');
            }
        });

        $('#day-start').change(function () {
            $('#day-end').attr('min', $(this).val());
        });

        $('#statistic-btn').on('click', function () {
            let type = $('#type').val();
            let data = {type: type, qty: $('#qty').val()};
            if (type === 'day') {
                data = {
                    type: type,
                    date: $('#day').val(),
                    qty: $('#qty').val()
                }
            }
            else if (type === 'days') {
                data = {
                    type: type,
                    date_start: $('#day-start').val(),
                    date_end: $('#day-end').val(),
                    qty: $('#qty').val()
                }
            }
            $.ajax({
                type: 'get',
                url: '{{ route('statistic.foody.get') }}',
                data: data,
                success: function (data) {
                    buildTable(data);
                }
            })
        });
        $('#statistic-btn').click();
        function buildTable(data) {
            $('#table-hot-foody').empty();
            $.each(data.data, function (key, value) {
                $('#table-hot-foody').append("<tr>" +
                    "<td class='center aligned'>" + (key+1) + "</td>" +
                    "<td>" + value.foodyname + "</td>" +
                    "<td>" + value.total + "</td>" +
                    "</tr>");
            });
        }
    </script>
@endpush