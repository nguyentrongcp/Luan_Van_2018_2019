@push('script')
    <script>

        $(document).ready(function () {
            $('#home-nav-container').pushpin({
                top: 300 - $('#navbar').height(),
                onPositionChange: function (status) {
                    if (status === 'pinned') {
                        $(document).scroll(function () {
                            let nav = $('#home-nav-container');
                            if ($(window).scrollTop() + $(window).height() >= $('#footer-container').offset().top - 30) {
                                // let bottom = $('#footer-container').offset().top - $(nav).height() - 30 - $(window).scrollTop();
                                let bottom = $(window).height() + $(window).scrollTop() - $('#footer-container').offset().top + 30;
                                // $(nav).removeClass('pinned');
                                $(nav).css({
                                    'bottom': bottom,
                                });
                            }
                            else {
                                $(nav).css('bottom','');
                            }
                        });
                        $('#show-foody').addClass('special');
                    }
                    else {
                        $('#show-foody').removeClass('special');
                    }
                }
            });

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

        function favorite(favorite, id) {
            let logged = '{!! $logged !!}';
            if (logged === 'true') {
                $.ajax({
                    type: "post",
                    url: "/customer/favorite",
                    data: {
                        foody_id: id
                    },
                    success: function (data) {
                        $('#favorite-' + id).toggleClass('outline');
                        M.Toast.dismissAll();
                        if (data === 'favorited') {
                            M.toast({
                                html: "<i class='material-icons teal-text left'>check</i>Đã lưu",
                                displayLength: 2000
                            });
                        }
                        else {
                            M.toast({
                                html: "<i class='material-icons teal-text left'>check</i>Đã hủy lưu",
                                displayLength: 2000
                            });
                        }
                    }
                })
            }
            else {
                $('#login-require').modal('open');
            }
        }

        function addCart(foody) {
            var foody_id = $('#' + foody.id).attr('data-target');
            $.ajax({
                type: "post",
                url: "/customer/add_shopping_cart",
                data: {
                    foody_id: foody_id
                },
                success: function (data) {
                    if (data.status === 200) {
                        $('#cart-count').text(data.count);
                        $('#cart-added-home-' + foody_id).html(data.added_text);
                    }
                    else {
                        M.Toast.dismissAll();
                        M.toast({
                            html: "<i class='material-icons red-text left'>error_outline</i><span>" +
                                "Số lượng đã đạt tối đa!</span>",
                            classes: 'message'
                        });
                    }
                }
            })
        }

        $('.foody-sort').on('click', function () {
            let sort = this;
            let type_id = $($('.foody-type.active')[0]).attr('data-filter');
            $.ajax({
                type: 'post',
                url: '/customer/show_foody',
                data: {
                    foody_type_id: type_id,
                    foody_sort_id: $(sort).attr('data-filter'),
                    type: 'sort'
                },
                success: function (data) {
                    $('#home-foody-container').empty();
                    $('#home-foody-container').html(data);
                    $('.foody-sort').removeClass('active');
                    $(sort).addClass('active');
                    $("html, body").animate({ scrollTop: 300 - $('#navbar').height() }, 'slow');
                }
            })
        });

        $('.foody-type').on('click', function () {
            let type = this;
            let sort_id = $($('.foody-sort.active')[0]).attr('data-filter');
            $.ajax({
                type: 'post',
                url: '/customer/show_foody',
                data: {
                    foody_type_id: $(type).attr('data-filter'),
                    foody_sort_id: sort_id,
                    type: 'type'
                },
                success: function (data) {
                    $('#home-foody-container').empty();
                    $('#home-foody-container').html(data);
                    $('.foody-type').removeClass('active');
                    $(type).addClass('active');
                    $("html, body").animate({ scrollTop: 300 - $('#navbar').height() }, 'slow');
                }
            })
        });

    </script>
@endpush