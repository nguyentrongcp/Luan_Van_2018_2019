@push('script')
    <script>
        $('#type').change(function () {
            let val = $(this).val();
            $('.select-hide').addClass('hidden');
            if (val === 'day') {
                $('#select-day').removeClass('hidden');
            }
            if (val === 'days') {
                $('#select-day-start').removeClass('hidden');
                $('#select-day-end').removeClass('hidden');
                $('#select-day').addClass('hidden');
            }
        });

        $('#statistic-btn').on('click', function () {
            $('#table-hot-foody').remove();
            let type = $('#type').val();
            let data = {type: type};
            if (type === 'day') {
                data = {
                    type: type,
                    date: $('#day').val()
                }
            }
            else if (type === 'days') {
                data = {
                    type: type,
                    date_start: $('#day-start').val(),
                    date_end: $('#day-end').val()
                }
            }
            $.ajax({
                type: 'get',
                url: '{{ route('statistic.foody.get') }}',
                data: data,
                success: function (data) {
                    if (data.status === 'error') {
                        return false;
                    }
                        console.log(data.data);
                    buildTable(data);

                }
            })
        });
        $('#statistic-btn').click();
        function buildTable(data) {
            $('#hot-foody-table').append('<tbody id="table-hot-foody">\n' +
                '\n' +
                '                </tbody>');
            let labels = data.data;
            for (let i = 0; i < labels.length; i++) {
                $('#table-hot-foody').append("<tr>" +
                    "<td>" + (i+1) + "</td>" +
                    "<td class=\"left aligned\">" + data.data[i].foodyname + "</td>" +
                    "<td>" + data.data[i].total + "</td>" +
                    "</tr>")
            }
        }
    </script>
@endpush