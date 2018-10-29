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
        });

        $('#search').focus(function () {
            $('#search-result').addClass('search-result');
            setCssSearch();
            setDimmer($('#search-row'));
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
            closeDimmer($('#search-row'));
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