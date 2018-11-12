@push('script')
    <script>

        $(document).ready(function () {
            $(window).resize(function () {
                $('#home-nav-dropdown').dropdown('close');
            });

            $.each($('.foody-type'), function (key, value) {
                if ($($(value).children().get(0)).width() >= 158) {
                    $(value).addClass('tooltipped');
                    $(value).attr('data-tooltip', $($(value).children().get(0)).text());
                    $(value).attr('data-position', 'top');
                    $(value).tooltip();
                }
            });

            $('#home-nav-container').pushpin({
                top: 300 - $('#navbar').height(),
                onPositionChange: function (status) {
                    if (status === 'pinned') {
                        let nav = $('#home-nav-container');
                        changePositionNav();
                        $(document).scroll(function () {
                            changePositionNav();
                        });
                        $('#show-foody').addClass('special');
                    }
                    else {
                        $('#show-foody').removeClass('special');
                    }
                }
            });

            if ('{{ $type }}' !== '') {
                showFoodyByType($($('.type-{{ $type }}')[0]));
            }
            else if ('{{ $sort }}' !== '') {
                showFoodyBySort($($('.sort-{{ $sort }}')[0]));
            }
            else {
                showFoodyByType($('.foody-type.active')[0]);
            }

            $('#home-nav-dropdown').dropdown({
                constrainWidth: false,
                coverTrigger: false,
                inDuration: 500,
                outDuration: 500,
                // closeOnClick: false,
                onOpenStart: function () {
                    $('body').css('overflow', 'hidden');
                    $('#navbar-filter').addClass('teal');
                    $('html, body').animate({scrollTop: $('#navbar').offset().top}, 0);
                    setDimmer($('#navbar-cart'));
                },
                onOpenEnd: function() {
                    if ($('body').css('overflow') === 'auto') {
                        $('body').css('overflow', 'hidden');
                    }
                },
                onCloseStart: function () {
                    closeDimmer($('#navbar-cart'));
                    $('body').css('overflow', 'auto');
                    $('#navbar-filter').removeClass('teal');
                }
            });
        });

        function addShowMore() {
            $.each($('.show-foody-describe'), function (key, value) {
                if ($(value).height() > 30 && $(value).children().length < 2) {
                    $(value).append("<a class='show-more' style='cursor: pointer'>Xem thêm</a>");
                }
            });
            $('.show-more').on('click', function () {
                if ($(this).text() === 'Xem thêm') {
                    $($($(this).parent().get(0)).children().get(0)).removeClass('truncate-twolines');
                    $(this).text('Thu nhỏ');
                    changePositionNav();
                }
                else {
                    $($($(this).parent().get(0)).children().get(0)).addClass('truncate-twolines');
                    $(this).text('Xem thêm');
                    changePositionNav();
                }
            });
        }

        function like(like) {
            var id = like.id;
            var foody_id = $('#' + id).attr('data-target');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/customer/like",
                data: {
                    foody_id: foody_id
                },
                error: function () {
                    $('#login-modal').modal('open');
                },
                success: function (data) {
                    $('#i-' + id).toggleClass('active');
                    $('#a-' + id).text(data.text);
                    $('#liked-' + foody_id).text(data.number_of_liked)
                }
            })
        }

        function favorite() {
            $('.foody-favorite').on('click', function() {
                let logged = '{!! $logged !!}';
                let value = this;
                if (logged === 'true') {
                    let id = $(value).attr('data-id');
                    $.ajax({
                        type: "post",
                        url: "/customer/favorite",
                        data: {
                            foody_id: id
                        },
                        success: function (data) {
                            if (data.status !== 'error') {
                                M.Toast.dismissAll();
                                let icon = $(value).children().get(0);
                                if (data === 'favorited') {
                                    $(icon).removeClass('outline');
                                    M.toast({
                                        html: "<i class='material-icons teal-text left'>check</i>Đã lưu",
                                        displayLength: 2000
                                    });
                                }
                                else {
                                    $(icon).addClass('outline');
                                    M.toast({
                                        html: "<i class='material-icons teal-text left'>check</i>Đã hủy lưu",
                                        displayLength: 2000
                                    });
                                }
                            }
                        }
                    })
                }
                else {
                    $('#require-modal').modal('open');
                }
            });
        }

        $('.foody-sort').on('click', function () {
            showFoodyBySort(this);
        });

        function showFoodyBySort(sort) {
            let sort_filter = $(sort).attr('data-filter');
            let type_id = $($('.foody-type.active')[0]).attr('data-filter');
            $.ajax({
                type: 'get',
                url: '{{ route('home.show_foody') }}',
                data: {
                    foody_type_id: type_id,
                    foody_sort_id: sort_filter,
                    type: 'sort',
                    number: 0
                },
                success: function (data) {
                    // console.log(data);
                    $('#home-foody-container').empty();
                    $('#home-foody-container').html(data.content);
                    $('.foody-sort').removeClass('active');
                    $('.sort-' + sort_filter).addClass('active');
                    $("html, body").animate({ scrollTop: 300 - $('#navbar').height() }, 'slow');
                    displayLoadMore(data.end, data.number);
                    detectShowChange();
                }
            })
        }

        $('.foody-type').on('click', function () {
            showFoodyByType(this);
        });

        function showFoodyByType(type, number = 0) {
            let sort_id = $($('.foody-sort.active')[0]).attr('data-filter');
            let type_filter = $(type).attr('data-filter');
            let sales_percent = 0;
            if (typeof $(type).attr('data-sales') !== 'undefined') {
                sales_percent = $(type).attr('data-sales');
            }
            $.ajax({
                type: 'get',
                url: '{{ route('home.show_foody') }}',
                data: {
                    foody_type_id: type_filter,
                    foody_sort_id: sort_id,
                    type: 'type',
                    sales_percent: sales_percent,
                    number: number
                },
                success: function (data) {
                    if (number === 0) {
                        $('#home-foody-container').empty();
                        $('#home-foody-container').html(data.content);
                        $('.foody-type').removeClass('active');
                        if (sales_percent !== 0) {
                            $('.type-' + type_filter + '-' + sales_percent).addClass('active');
                        }
                        else {
                            $('.type-' + type_filter).addClass('active');
                        }
                        $("html, body").animate({ scrollTop: 300 - $('#navbar').height() }, 'slow');
                    }
                    else {
                        $('#home-foody-container').append(data.content);
                        let nav = $('#home-nav-container');
                    }
                    displayLoadMore(data.end, data.number);
                    detectShowChange();
                    $('#load-more').text('XEM THÊM');
                }
            })
        }

        function detectShowChange() {
            favorite();
            addShowMore();
            changePositionNav();
            updateCart();
        }

        function displayLoadMore(end, number) {
            if (end === true) {
                $($('#load-more').parent().get(0)).css('display', 'none');
            }
            else {
                $($('#load-more').parent().get(0)).css('display', 'block');
            }
            $('#load-more').attr('data-target', number);
        }

        function changePositionNav() {
            if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 30) {
                let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 30;
                $('#home-nav-container').css({
                    'bottom': bottom,
                });
            }
            else {
                $('#home-nav-container').css({
                    'bottom': '',
                });
            }
        }

        $('#load-more').on('click', function () {
            $(this).text('ĐANG TẢI..');
            let number = $(this).attr('data-target');
            $(this).attr('data-target', parseInt(number) + 10);
            let type = $('.foody-type.active')[0];
            showFoodyByType(type, number);
        });

    </script>
@endpush