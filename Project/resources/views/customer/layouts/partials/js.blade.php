@push('script')
    <script>
        $(document).ready(function(){
            $('.modal').modal();
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
            });

            $('#dropdown-category').dropdown({
                coverTrigger: false,
                constrainWidth: false,
                alignment: 'right',
                closeOnClick: false
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
                    }
                    else if (data.status === 'deleted') {
                        $('#' + id).remove();
                        $('#cart-added-home-' + id).text('');
                        if (data.total_count === 0) {
                            $('#cart-body').append("<div id=\"cart-empty\" class=\"row center-align\">\n" +
                                "                Giỏ hàng trống\n" +
                                "            </div>");
                        }
                        $('#cart-payment').addClass('disabled');
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
                }
            })
        }
    </script>
@endpush