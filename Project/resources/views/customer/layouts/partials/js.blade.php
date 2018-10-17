@push('script')
    <script>
        $(document).ready(function(){
            $('#login-modal').modal({

            });
            $('#login-require').modal();
            $('#dropdown-profile').dropdown({
                coverTrigger: false,
                alignment: 'right',
                constrainWidth: false
            });

            $('#dropdown-cart').dropdown({
                coverTrigger: false,
                alignment: 'right',
                constrainWidth: false,
                closeOnClick: false,
                inDuration: 500,
                outDuration: 500,
                onOpenStart: function () {
                    $('#dropdown-cart').addClass('teal');
                    $('#cart-count').addClass('white black-text');
                    // var calc = $(window).width() * 98 / 100 - 200 + 'px';
                    // $('#navbar-menu').addClass('hide');
                    // $('.nav-cart').animate({'margin-left': calc}, 100);
                },
                onCloseEnd: function () {
                    $('#dropdown-cart').removeClass('teal');
                    $('#cart-count').removeClass('white black-text');
                    // var calc = $(window).width() * 49 / 100 - 155 + 'px';
                    // $('.nav-cart').animate({'margin-left': calc}, 100);
                    // $('#navbar-menu').removeClass('hide');
                }
            });

            $('#dropdown-category').dropdown({
                coverTrigger: false,
                alignment: 'right',
                onOpenStart: function () {
                    $('#dropdown-category').addClass('teal');
                },
                onCloseEnd: function () {
                    $('#dropdown-category').removeClass('teal');
                }
            });

            $('.navbar-search').on('click', function () {
                if ($(window).width() < 586) {
                    $('.navbar-hide').addClass('hide');
                    $('#navbar-search').removeClass('hide-on-small-only');
                    $('#navbar-search').css('display', 'unset');
                    // $('#navbar-search').removeClass('hide');
                    $('#navbar-search').css({
                        width: '100%'
                    });
                    $('#search').focus();
                }
            });
            $('#search').focusout(function () {
                $('#search-result').removeClass('search-result');
                $('#navbar-search').addClass('hide-on-small-only');
                $('.navbar-hide').removeClass('hide');
                $('#navbar-search').addClass('navbar-search');
                $('#search').addClass('white-text');
            });

            $('#search').focus(function () {
                $('#search').removeClass('white-text');
                $('#search-result').pushpin({
                    top: 300 - $('#navbar-second').height()
                });
                if ($('#search').val() !== '') {
                    $('#search-result').addClass('search-result');
                }
                if (($(window).width() > 585)) {
                    let calc = ($(window).width() * 180 / 100 + 90) / 3 + 'px';
                    if ($(window).width() < 976) {
                        calc = ($(window).width() * 196 / 100 + 90) / 3 + 'px';
                    }
                    $('.navbar-hide-med').addClass('hide');
                    $('#navbar-search').removeClass('navbar-search');
                    $('#navbar-search').css('width', calc);
                }
                let top = $('#navbar-second').offset().top + $('#navbar-second').height();
                let width = $('#navbar-search').width();
                let left = $('#navbar-search').position().left;
                let overflow = 'hidden';
                if ($(window).width() < 978) {
                    left += $(window).width() / 100;
                }
                else {
                    left += $(window).width() * 5 / 100;
                }
                $('#search-result').css({
                    top: top,
                    width: width,
                    left: left,
                });
                // else if ($(window).width() > 975) {
                //     $('#navbar-category').addClass('hide');
                //     let calc = ($(window).width() * 180 / 100 - 180) / 3 + 'px';
                //     $('#navbar-search').removeClass('navbar-search');
                //     $('#navbar-search').animate({width: calc}, 750);
                // }
            });

            $('#search').on('input', function () {
                var value = $(this).val();
                console.log(value);
                if ($('#navbar-search').attr('data-search') === 'result') {
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
                                let height = $(window).height() - $('#navbar-second').height();
                                if ($('#search-result').height() > height) {
                                    $('#search-result').css({
                                        'overflow' : 'auto',
                                        'max-height': height
                                    });
                                }
                                else {
                                    $('#search-result').css({
                                        overflow: 'hidden',
                                        'max-height' : 'unset'
                                    });
                                }
                            }
                        });
                    }
                }
                else {

                }
            });

        });

        function updateCart(type, id) {
            var count = '1';
            if ($(type).attr('data-amount') === 'cart-minus-' + id) {
                count = '-1';
            }
            if ($(type).attr('data-amount') === 'cart-add-' + id) {
                count = $('#cart-amount-' + id).val();
                if (count < 1) {
                    count = 0;
                }
            }
            if (count === 0) {
                $('#cart-amount-' + id).val('1');
                M.toast({
                    html: "<i class='material-icons red-text left'>error_outline</i>Số lượng không hợp lệ!",
                    displayLength: 2000
                });
            }
            else {
                $.ajax({
                    type: "post",
                    url: "/customer/update_shopping_cart",
                    data: {
                        foody_id: id,
                        count: count
                    },
                    success: function (data) {
                        $('#cart-count').text(data.total_count);
                        $('#cart-total-cost').html(data.total_cost + '<sup>đ</sup>');
                        if (data.status === 'updated') {
                            $('#cart-count-' + id).text(data.count);
                            $('#cart-cost-' + id).html(data.cost + '<sup>đ</sup>');
                            $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
                                "</span>)");
                            updatePayment(data.total_cost,data.count,data.cost,data.cost_simple);
                        }
                        else if (data.status === 'deleted') {
                            $('#' + id).remove();
                            $('#cart-added-home-' + id).text('');
                            if (data.total_count === 0) {
                                $('#cart-body').append("<div id=\"cart-empty\" class=\"row center-align\">\n" +
                                    "                Giỏ hàng trống\n" +
                                    "            </div>");
                                $('#cart-payment').addClass('disabled');
                            }
                            removePayment(data.total_cost,id,data.cost);
                        }
                        else {
                            if (data.role === 'new') {
                                $('#cart-body').empty();
                            }
                            $('#cart-body').append(data.cart_body);
                            $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
                                "</span>)");
                            $('#cart-payment').removeClass('disabled');
                        }
                    }
                })
            }
        }

        function removeCart(id) {
            $.ajax({
                type: "post",
                url: "/customer/remove_shopping_cart",
                data: {
                    foody_id: id
                },
                success: function (data) {
                    $('#cart-count').text(data.total_count);
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
            })
        }

        function updatePayment(total_cost, count, cost, cost_simple) {
            $('#payment-table-amount').text(count);
            $('#payment-table-cost').html(cost_simple + '<sup>đ</sup>');
            $('#payment-table-total').html(cost + '<sup>đ</sup>');
            $('#payment-table-total-cost').html(total_cost + '<sup>đ</sup>');
            $('#foody-cost').html(total_cost + '<sup>đ</sup>');
            $('#foody-cost').attr('data-cost',total_cost);
            if (typeof $('#transport-fee').attr('data-cost') !== 'undefined') {
                getFee();
            }
        }

        function removePayment(total_cost, id) {
            $('#payment-table-row-' + id).remove();
            $('#payment-table-total-cost').html(total_cost + '<sup>đ</sup>');
            $('#foody-cost').html(total_cost + '<sup>đ</sup>');
            $('#foody-cost').attr('data-cost',total_cost);
            if (typeof $('#transport-fee').attr('data-cost') !== 'undefined') {
                getFee();
            }
        }
    </script>
@endpush