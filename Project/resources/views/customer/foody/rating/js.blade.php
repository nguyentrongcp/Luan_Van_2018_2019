@push('script')
    <script>
        let rating = $('#foody-rating-show');
        let second_navbar = $('#navbar');
        let container = $('#foody-content-container');

        if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 70) {
            let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 70;
            $(rating).css({
                'bottom': bottom,
            });
        }
        else {
            $(rating).css('bottom','');
        }
        $(document).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 70) {
                let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 70;
                $(rating).css({
                    'bottom': bottom,
                });
            }
            else {
                $(rating).css('bottom','');
            }
        });

        $(rating).pushpin({
            top: $(rating).offset().top - $(second_navbar).height(),
            onPositionChange: function (status) {
                if (status === 'pinned') {
                    $(rating).css('top', $(second_navbar).height());
                }
            }
        });
    </script>
@endpush