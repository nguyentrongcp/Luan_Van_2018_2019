@push('script')
    <script>
        $(document).ready(function(){
            $('#login-modal').modal({

            });
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
                onOpenStart: function () {
                    $('#dropdown-cart').addClass('teal');
                    // var calc = $(window).width() * 98 / 100 - 200 + 'px';
                    // $('#navbar-menu').addClass('hide');
                    // $('.nav-cart').animate({'margin-left': calc}, 100);
                },
                onCloseEnd: function () {
                    $('#dropdown-cart').removeClass('teal');
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
                if ($(window).width() < 601) {
                    $('.navbar-hide').addClass('hide');
                    $('#navbar-search').removeClass('hide-on-small-only');
                    $('#navbar-search').css('display', 'unset');
                    // $('#navbar-search').removeClass('hide');
                    $('#search').focus();
                    $('#navbar-search').animate({width: '100%'}, 750);
                }
            });
            $('#search').focusout(function () {
                if ($(window).width() < 601) {
                    $('#navbar-search').animate({width: 0}, 500, function () {
                        $('.navbar-hide').removeClass('hide');
                        $('#navbar-search').addClass('hide-on-small-only');
                    });
                }

            });

        });

        function updateCart(type, id) {
            var count = '1';
            if (type.id === 'cart-minus-' + id) {
                count = '-1';
            }
            if (type.id === 'cart-plus-' + id) {
                count = type.text();
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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

        function removeCart(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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