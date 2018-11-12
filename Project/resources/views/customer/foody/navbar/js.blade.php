@push('script')
    <script>
        $(document).ready(function () {
            let foody_navbar = $('#foody-scrollspy-container');

            if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 70) {
                let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 70;
                $(foody_navbar).css({
                    'bottom': bottom,
                });
            }
            else {
                $(foody_navbar).css('bottom','');
            }
            $(document).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 70) {
                    let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 70;
                    $(foody_navbar).css({
                        'bottom': bottom,
                    });
                }
                else {
                    $(foody_navbar).css('bottom','');
                }
            });
        });

    </script>
@endpush