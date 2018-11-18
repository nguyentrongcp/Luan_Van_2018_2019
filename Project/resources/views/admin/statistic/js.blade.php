@push('script')
    <script>
        $('#btn-view').on('click', function () {
            let data = [];
            let type = $('#type').val();
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
            else if (type === 'month') {
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
                data: {
                    data: data
                },
                success: function (data) {

                }
            })
        });

        $('#type').change(function () {
            let val = $(this).val();
            $('.select-hide').addClass('hidden');
            if (val === 'quarter') {
                $('#select-year').removeClass('hidden');
            }
            if (val === 'month') {
                $('#select-year').removeClass('hidden');
                $('#select-month-end').removeClass('hidden');
                $('#select-month-start').removeClass('hidden');
            }
            if (val === 'day') {
                $('.select-hide').removeClass('hidden');
                $('#select-month-end').addClass('hidden');
                $('#select-month-start').addClass('hidden');
                $('#select-quarter').addClass('hidden');
            }
        });

        function monthChanged() {
            let select_year = $('#year');
            let select_month = $('#month');
            let select_begin = $('#day-start');
            let year = parseInt($(select_year).val());
            let month = $(select_month).val();
            select_begin.empty();
            if (month==='1' || month==='3' || month==='5' || month==='7' || month==='8' || month==='10' || month==='12') {
                for(let i=1; i<=31; i++) {
                    select_begin.append(new Option('Ngày ' + i.toString(), i.toString()));
                }
            }
            else if(month==='4' || month==='6' || month==='9' || month==='11') {
                for(let i=1; i<=30; i++) {
                    select_begin.append(new Option('Ngày ' + i.toString(), i.toString()));
                }
            }
            else if(month==='2' && ((year%4===0 && year%100!==0) || year%400===0)) {
                for(let i=1; i<=29; i++) {
                    select_begin.append(new Option('Ngày ' + i.toString(), i.toString()));
                }
            }
            else {
                for(let i=1; i<=28; i++) {
                    select_begin.append(new Option('Ngày ' + i.toString(), i.toString()));
                }
            }
            beginChanged();
        }

        function yearChanged() {
            let select = $('#month');
            select.empty();
            for(let i=1; i<=12; i++) {
                select.append(new Option('Tháng ' + i.toString(), i.toString()));
            }
            monthChanged();
            beginChanged();
        }

        function beginChanged() {
            let select_end = $('#day-end');
            let select_begin = $('#day-start');
            select_end.empty();
            let value = $(select_begin).val();
            for(let i=parseInt(value); i<=select_begin.children('option').length; i++) {
                select_end.append(new Option('Ngày ' + i.toString(), i.toString()));
            }
        }

        function beginMonthChanged() {
            let select_end = $('#month-end');
            let select_begin = $('#month-start');
            select_end.empty();
            let value = $(select_begin).val();
            for(let i=parseInt(value); i<=select_begin.children('option').length; i++) {
                select_end.append(new Option('Tháng ' + i.toString(), i.toString()));
            }
        }
    </script>
@endpush