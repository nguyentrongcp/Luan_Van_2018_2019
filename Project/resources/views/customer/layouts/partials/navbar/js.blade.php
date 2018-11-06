@push('script')
    <script>
        $(document).ready(function(){
            let width_of_window = getWidth();
            $(window).resize(function () {
                if (getWidth() !== width_of_window) {
                    width_of_window = getWidth();
                    $('#dropdown-cart').dropdown('close');
                    $('#dropdown-category').dropdown('close');
                    $('#dropdown-profile').dropdown('close');
                }
            });
            updateCart();
            let time = 'slow';
            if (getWidth() <= 992) {
                time = 0;
            }
            $('#dropdown-cart').dropdown({
                coverTrigger: false,
                alignment: 'right',
                constrainWidth: false,
                closeOnClick: false,
                inDuration: 500,
                outDuration: 500,
                onOpenStart: function () {
                    $('body').css('overflow', 'hidden');
                    $('#dropdown-cart').addClass('teal');
                    $('#cart-quantity').addClass('white black-text');
                    $("html, body").animate({ scrollTop: $('#navbar').offset().top }, time);
                    setDimmer($('#navbar-cart'));
                },
                onOpenEnd: function() {
                    if ($('body').css('overflow') === 'auto') {
                        $('body').css('overflow', 'hidden');
                    }
                },
                onCloseStart: function() {
                    closeDimmer($('#navbar-cart'));
                    $('body').css('overflow', 'auto');
                    $('#dropdown-cart').removeClass('teal');
                    $('#cart-quantity').removeClass('white black-text');
                },
            });

            $('#dropdown-profile').dropdown({
                constrainWidth: false,
                coverTrigger: false,
                inDuration: 500,
                outDuration: 500,
                // closeOnClick: false,
                // onOpenStart: function () {
                //     $('#navbar-category').addClass('teal');
                //     $('html, body').animate({scrollTop: $('#navbar').offset().top}, time);
                // },
                // onCloseStart: function () {
                //     $('#navbar-category').removeClass('teal');
                // }
            });

            $('#dropdown-category').dropdown({
                coverTrigger: false,
                inDuration: 500,
                outDuration: 500,
                // closeOnClick: false,
                onOpenStart: function () {
                    $('body').css('overflow', 'hidden');
                    $('#navbar-category').addClass('teal');
                    $('html, body').animate({scrollTop: $('#navbar').offset().top}, time);
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
                    $('#navbar-category').removeClass('teal');
                }
            });

            $('#navbar').pushpin({
                top: 300 - $('#navbar').height()
            });

            $('.nav-search').on('click', function () {
                $('#navbar-search').removeClass('hide');
                if (getWidth() <= 600) {
                    $('.m-nav-col').addClass('hide');
                    $('#search').focus();
                    $('#navbar-search').css({
                        'left': 0,
                        'width': '100%'
                    })
                }
                else if (getWidth() <= 992) {
                    $('#navbar-category').addClass('hide');
                    $('.nav-search').addClass('hide');
                    $('#navbar-search').css({
                        'width': 'calc((100% - 90px) * 2 / 3)'
                    });
                    $('#search').focus();
                }
                else {
                    $('.nav-search').addClass('hide');
                    $('#search').focus();
                }
            });

            $('#search').focusout(function () {
                $('body').css('overflow', 'auto');
                $('#search-result').removeClass('search-result');
                $('#navbar-search').addClass('hide');
                $('.m-nav-col').removeClass('hide');
                $('.nav-search').removeClass('hide');
                $('#navbar-search').css({
                    'width': 'calc((100% - 90px) / 3)'
                });
                closeDimmer($('#navbar-search'),$('#search-result'));
            });

            $('#search').focus(function () {
                $('body').css('overflow', 'hidden');
                $("html, body").animate({ scrollTop: $('#navbar').offset().top }, time);
                $('#search-result').addClass('search-result');
                let top = $('#navbar').offset().top + $('#navbar').height();
                let left = $('#navbar-search').offset().left;
                $('#search-result').css({
                    'top': top,
                    'left': left
                });
                setDimmer($('#navbar-search'),$('#search-result'));
            });

            $('#search-result').pushpin({
                top: 300 - $('#navbar').height()
            });

            $('#search').on('input', function () {
                var value = $(this).val();
                if (value === '') {
                    $('#search-result').removeClass('search-result');
                    $('#search-result').empty();
                }
                else {
                    $('#search-result').addClass('search-result');
                    $.ajax({
                        type: 'get',
                        url: '/customer/search',
                        data: {
                            value: value
                        },
                        success: function (data) {
                            $('#search-result').html(data);
                            let height = $(window).height() - $('#navbar').height();
                            if ($('#search-result').height() >= height) {
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
                }
            });
        });

        function removeCart(id) {
            $.ajax({
                type: "post",
                url: "/customer/remove_shopping_cart",
                data: {
                    foody_id: id
                },
                success: function (data) {
                    if (data.status !== 'error') {
                        $('#cart-qty').text(data.total_count);
                        $('#cart-total-cost').html(data.total_cost + '<sup>đ</sup>');
                        $('#' + id).remove();
                        $('#cart-added-home-' + id).text('');
                        if (data.total_count === 0) {
                            $('#cart-body').append("<div id=\"cart-empty\" class=\"row center-align\">\n" +
                                "                Giỏ hàng trống\n" +
                                "            </div>");
                            $('#cart-payment').addClass('disabled');
                        }
                        removePayment(data.total_cost,id);
                    }
                }
            })
        }

        // function cartUpdate(type, id) {
        //     var count = '1';
        //     if ($(type).attr('data-qty') === 'minus-' + id) {
        //         count = '-1';
        //     }
        //     if ($(type).attr('data-qty') === 'add-' + id) {
        //         count = $('#cart-qty-' + id).val();
        //         if (count < 1) {
        //             count = 0;
        //         }
        //     }
        //     if (count === 0) {
        //         $('#cart-qty-' + id).val('1');
        //         M.toast({
        //             html: "<i class='material-icons red-text left'>error_outline</i>Số lượng không hợp lệ!",
        //             displayLength: 2000
        //         });
        //     }
        //     else {
        //         $.ajax({
        //             type: "post",
        //             url: "/customer/update_shopping_cart",
        //             data: {
        //                 foody_id: id,
        //                 count: count
        //             },
        //             success: function (data) {
        //                 if (data.status !== 'error') {
        //                     $('#cart-qty').text(data.total_count);
        //                     $('#cart-total-cost').html(data.total_cost + '<sup>đ</sup>');
        //                     if (data.status === 'updated') {
        //                         $('#cart-qty-' + id).text(data.count);
        //                         $('#cart-cost-' + id).html(data.cost + '<sup>đ</sup>');
        //                         $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
        //                             "</span>)");
        //                         updatePayment(data.total_cost,data.count,data.cost,data.cost_simple);
        //                     }
        //                     else if (data.status === 'deleted') {
        //                         $('#' + id).remove();
        //                         $('#cart-added-home-' + id).text('');
        //                         if (data.total_count === 0) {
        //                             $('#cart-body').append("<div id=\"cart-empty\" class=\"row center-align\">\n" +
        //                                 "                Giỏ hàng trống\n" +
        //                                 "            </div>");
        //                             $('#cart-payment').addClass('disabled');
        //                         }
        //                         removePayment(data.total_cost,id,data.cost);
        //                     }
        //                     else {
        //                         if (data.role === 'new') {
        //                             $('#cart-body').empty();
        //                         }
        //                         $('#cart-body').append(data.cart_body);
        //                         $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
        //                             "</span>)");
        //                         $('#cart-payment').removeClass('disabled');
        //                     }
        //                 }
        //             }
        //         })
        //     }
        // }
    </script>
@endpush