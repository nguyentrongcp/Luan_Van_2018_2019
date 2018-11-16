@push('script')
    <script>
        $(document).ready(function () {
            $(window).resize(function () {
                setCssSearch();
            });
            $(window).scroll(function () {
                changePosition($('#background-index'));
                if (getWidth() >= 993) {
                    changePosition($('#type-container'));
                }
            });

            $('.foody-type').on('click', function () {
                let id = $(this).attr('data-type');
                getFoodyByType(id,null,'{{ route('home.get_foody') }}');
            });
        });

        $('#search').focus(function () {
            $('#search-result').addClass('search-result');
            setCssSearch();
            if(getWidth() > 992) {
                $('body').css('overflow', 'hidden');
            }
            setDimmer($('#type-container'));
        });

        $('#search').on('input', function () {
            var value = $(this).val();
            if (value === '') {
                $('#search-result').removeClass('search-result');
                $('#search-result').empty();
            }
            else {
                $.ajax({
                    type: 'get',
                    url: '/customer/search',
                    data: {
                        value: value
                    },
                    success: function (data) {
                        $('#search-result').html(data);
                        $('.search-foody').each(function (key,value) {
                            $(value).on('mousedown', function () {
                                window.location.href = $(value).attr('data-target');
                            });
                        });
                        $('.search-order').each(function (key,value) {
                            $(value).on('mousedown', function () {
                                window.location.href = $(value).attr('data-target');
                            });
                        });
                        if ($('#search-result').height() >= 320) {
                            $('#search-result').css({
                                'overflow' : 'auto'
                            });
                        }
                        else {
                            $('#search-result').css({
                                overflow: 'hidden'
                            });
                        }
                    }
                });
                $('#search-result').addClass('search-result');
            }
        });

        $('#search').focusout(function () {
            $('#search-result').removeClass('search-result');
            $('body').css('overflow', 'auto');
            closeDimmer($('#type-container'));
        });

        function setCssSearch() {
            let top = $('#search').offset().top + $('#search').height();
            let left = $('#search').offset().left;
            let width = $('#search').width();
            $('#search-result').css({
                'top': top + 3,
                'left': left,
                'width': width + 35
            });
        }
        function changePosition(element) {
            if ($(document).scrollTop() >= $('#footer-container').offset().top - $(window).height()) {
                $(element).css({
                    'position' : 'absolute',
                    'top': $('#footer-container').offset().top - $(window).height()
                });
            }
            else {
                $(element).css({
                    'position' : 'fixed',
                    'top': 0
                });
            }
        }
    </script>
@endpush