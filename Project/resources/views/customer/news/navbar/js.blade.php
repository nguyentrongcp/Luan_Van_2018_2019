@push('script')
    <script>

        let news_nav_top = $('#news-nav').offset().top;
        let top_pushpin = news_nav_top - $('#navbar').height() + 15;
        $(document).ready(function () {
            if (getWidth() >= 993) {
                pushpin($('#news-nav'));
                $(window).scroll(function () {
                    pushpin($('#news-nav'));
                });
            }
        });

        function pushpin(element) {
            if ($(window).scrollTop() >= top_pushpin) {
                if ($(window).scrollTop() >= $('#footer-container').offset().top - $(window).height() - 45) {
                    $(element).css({
                        'top': $('#footer-container').offset().top - $(window).height() - news_nav_top + 30
                    });
                }
                else {
                    $(element).css({
                        'top': $(window).scrollTop() + $('#navbar').height() - news_nav_top + 15
                    });
                }
            }
            else {
                $(element).css({
                    'top': 0
                });
            }
        }
    </script>
@endpush