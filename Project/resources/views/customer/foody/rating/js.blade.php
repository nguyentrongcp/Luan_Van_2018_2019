@push('script')
    <script>
        let rating = $('#foody-rating-show');

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


        // let width_of_window = getWidth();
        // $(window).resize(function () {
        //     $(rating).pushpin({
        //         top: $(rating).offset().top - $(second_navbar).height(),
        //         onPositionChange: function (status) {
        //             if (status === 'pinned') {
        //                 $(rating).css('top', $(second_navbar).height());
        //             }
        //         }
        //     })
        // });

    </script>
@endpush