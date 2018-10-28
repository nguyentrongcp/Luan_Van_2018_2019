@push('script')
    <script>
        $(document).ready(function () {
            $('#page-number').on('input', function () {
                if ($(this).val() !== '') {
                    if (parseInt($(this).val()) < 1 ) {
                        $(this).val('1');
                        $(this).attr('data-page', '1');
                    }
                    else if ($(this).val() > parseInt('{{ $count }}')) {
                        $(this).val('{{ $count }}');
                        $(this).attr('data-page', '{{ $count }}');
                    }
                    getOrder($('#page-number').val());
                }
            });
            $('#page-number').focusout(function () {
                if ($(this).val() === '') {
                    $(this).val($(this).attr('data-page'));
                }
            });

            $('#page-next').on('click', function () {
                let page = parseInt($('#page-number').val()) + 1;
                getOrder(page);
            });

            $('#page-previous').on('click', function () {
                let page = parseInt($('#page-number').val()) - 1;
                getOrder(page);
            });
        });

        function getOrder(page) {
            $.ajax({
                type: 'get',
                url: '/payment/order/get',
                data: {
                    page: page
                },
                success: function (data) {
                    if (data.status !== 'error') {
                        $('#page-number').val(page)
                        $('#page-number').attr('data-page', page);
                        $('#order-container').empty()
                        $('#order-container').append(data.text);
                        $('#page-total').text(data.total);
                        if (page >= 2) {
                            $('#page-previous').removeClass('disabled');
                        }
                        else {
                            $('#page-previous').addClass('disabled');
                        }
                        if (page < data.total) {
                            $('#page-next').removeClass('disabled');
                        }
                        else {
                            $('#page-next').addClass('disabled');
                        }
                    }
                }
            });
        }
    </script>
@endpush