@push('script')
    <script>
        $(document).ready(function () {
            let navbar = $('#foody-scrollspy-container');
            let second_navbar = $('#navbar');
            let container = $('#foody-content-container');

            if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 70) {
                let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 70;
                $(navbar).css({
                    'bottom': bottom,
                });
            }
            else {
                $(navbar).css('bottom','');
            }
            $(document).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 70) {
                    let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 70;
                    $(navbar).css({
                        'bottom': bottom,
                    });
                }
                else {
                    $(navbar).css('bottom','');
                }
            });
            $(navbar).pushpin({
                top: $(container).offset().top - $(second_navbar).height(),
                onPositionChange: function (status) {
                    if (status === 'pinned') {
                        $(navbar).css('top', $(second_navbar).height());
                    }
                }
            });
        });
    </script>
@endpush