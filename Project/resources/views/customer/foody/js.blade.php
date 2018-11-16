@push('script')
    <script>
        $(document).ready(function(){
            // $('.carousel').carousel({
            //     dist: 0,
            //     fullWidth: false,
            //     noWrap: true
            // });
            // $('.materialboxed').materialbox();
            // $('#foody-image').slider( {
            //     indicators: false,
            // })

            $('#foody-rating-modal').modal({
                dismissible: false,
                opacity: 0.8
            });

            if ($($('.foody-describe .cont')[0]).height() === 75) {
                $($('.foody-describe')[0]).append("<a style='cursor: pointer' id='show-more'>Xem thêm</a>");
                $('#show-more').on('click', function () {
                    if ($(this).text() === 'Xem thêm') {
                        $($('.foody-describe .cont')[0]).removeClass('cont');
                        $(this).text('Thu nhỏ');
                        $('#foody-rating-show').removeClass('pinned');
                        resetPushpin();
                    }
                    else {
                        $($($('.foody-describe')[0]).children().get(0)).addClass('cont');
                        $(this).text('Xem thêm');
                        resetPushpin();
                    }
                });
            }

            pushpinRating();
            pushpinNav();

            $(window).resize(function () {
                resetPushpin();
            });

            function pushpinRating() {
                $('#foody-rating-show').pushpin({
                    top: $('#foody-rating-show').offset().top - $('#navbar').height(),
                    onPositionChange: function (status) {
                        if (status === 'pinned') {
                            $('#foody-rating-show').css('top', $('#navbar').height());
                        }
                    }
                });
            }
            function pushpinNav() {
                $('#foody-scrollspy-container').pushpin({
                    top: $('#foody-scrollspy-container').offset().top - $('#navbar').height(),
                    onPositionChange: function (status) {
                        if (status === 'pinned') {
                            $('#foody-scrollspy-container').css('top', $('#navbar').height());
                        }
                    }
                });
            }
            function resetPushpin() {
                $('#foody-rating-show').removeClass('pinned');
                pushpinRating();
                $('#foody-scrollspy-container').removeClass('pinned');
                pushpinNav();
            }

            $('#dimmer-image').dimmer({
                on: 'hover'
            });
            $('#foody-comment-modal').modal({
                dismissible: false,
                endingTop: '5%',
                opacity: 0.8
            });

            $('#comment-add-image').on('click', function () {
                $('#comment-input-file').click();
            });

            $('#comment-modal-title').on('input', function () {
                $('#comment-modal-title-error').empty();
            });

            $('#comment-modal-content').on('input', function () {
                $('#comment-modal-content-error').empty();
            });

            if (getWidth() <= 610) {
                $('#foody-comment-modal').css('height', $(window).outerHeight());
            }
            $(window).resize(function () {
                if (getWidth() <= 610) {
                    $('#foody-comment-modal').css('height', $(window).outerHeight());
                }
                else {
                    $('#foody-comment-modal').css('height', '');
                }
                $.each($('.comment-image img'), function (key, value) {
                    $(value).css('height', $(value).width());
                });
                $.each($('.foody-images'), function (key, value) {
                    $(value).css('height', $(value).width());
                });
            });
        });

        $('#comment-modal-content').focus(function () {
            if (getWidth() <= 610) {
                $(this).addClass('input-full-screen');
                let textarea = this;
                if ($('#out-full-screen').text() !== 'close') {
                    $($(this).parent().get(0)).append("<i id='out-full-screen' class='blue-text material-icons'>close</i>");
                    $('#out-full-screen').on('click', function () {
                        $(textarea).removeClass('input-full-screen');
                        $(this).remove();
                    });
                }
            }
        });


        function changeCost(qty) {
            let cost = qty * parseFloat('{{ $foody->getSaleCost() }}');
            cost = numeral(cost).format('0,0');
            $('#add-cart-cost').html(cost + "<sup>đ</sup>");
        }

        $("#add-cart-qty").on('input', function () {
            let qty = $(this).val();
            changeCost(qty);
        });

        $('#add-cart-button').on('click', function () {
            let element = this;
            let id = $(element).attr('data-id');
            let qty = $('#add-cart-qty').val();
            if (qty < 1) {
                $('#add-cart-qty').val('1');
                changeCost(1);
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
                        count: qty
                    },
                    success: function (data) {
                        if (data.status !== 'full' && data.status !== 'error' && data.status !== 'max') {
                            $('#cart-qty').text(data.total_count);
                            $('#cart-total-cost').html(data.total_cost + '<sup>đ</sup>');
                            if (data.status === 'updated') {
                                $('#cart-qty-' + id).text(data.count);
                                $('#cart-cost-' + id).html(data.cost + '<sup>đ</sup>');
                                $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
                                    "</span>)");
                            }
                            else {
                                if (data.role === 'new') {
                                    $('#cart-body').empty();
                                }
                                $('#cart-body').append(data.cart_body);
                                $('#cart-added-home-' + id).html("(<span class='red-text'>" + data.count +
                                    "</span>)");
                                $('#cart-payment').removeClass('disabled');
                                updateCart();
                            }
                        }
                        else if (data.status === 'full') {
                            M.Toast.dismissAll();
                            M.toast({
                                html: "Rất tiếc, nguyên liệu không đủ" +
                                    "<i style='margin: 0 5px' class=\"far fa-frown\"></i>" +
                                    "Số lượng tối đa bạn có thể đặt hiện tại là " + data.qty,
                                displayLength: 5000,
                            });
                        }
                        else if (data.status === 'max') {
                            M.Toast.dismissAll();
                            M.toast({
                                html: "<i class='material-icons left red-text'>error_outline</i> " +
                                    "Số lượng tối đa bạn được mua là 100",
                                displayLength: 4000,
                            });
                        }
                        $('#add-cart-qty').val('1');
                        changeCost(1);
                    }
                })
            }
        });

        $.each($('.comment-image img'), function (key, value) {
            $(value).css('height', $(value).width());
        });
        $.each($('.foody-images'), function (key, value) {
            $(value).css('height', $(value).width());
        });

        // $('#testtest').click(function () {
        //     console.log($.now());
        // });

        // function uploadImage(input) {
        //     console.log(input.files.length);
        //     if (!input.files) {
        //         return;
        //     }
        //     console.log(input.files);
        //     $.each(input.files, function (key, value) {
        //         console.log(key);
        //         readURL(value);
        //     });
        // }

        // function sliderImage() {
        //     $('#comment-modal-image').append("<div class='comment-modal-next'" + " onclick='nextImage()'" +
        //         " id='comment-modal-next'>\n" +
        //         "            <i class='material-icons'>navigate_next</i>\n" +
        //         "        </div>");
        // }

        $('#foody-like').on('click', function () {
            let logged = '{{ $logged }}';
            if (logged === 'true') {
                let id = '{{ $foody->id }}';
                $.ajax({
                    type: 'post',
                    url: '/customer/like',
                    data: {
                        foody_id: id
                    },
                    success: function (data) {
                        let icon = data.text === 'Thích' ? 'heart outline' : 'heart';
                        $('#foody-like').empty();
                        $('#foody-like').html("<i class='" + icon + " icon'></i>" + data.text + ' ' +
                            "<span class='count'>(" + data.number_of_liked + ")</span>");
                    }
                });
            }
            else {
                $('#require-modal').modal('open');
            }
        });

        $('#foody-favorite').on('click', function () {
            let logged = '{{ $logged }}';
            if (logged === 'true') {
                let id = '{{ $foody->id }}';
                $.ajax({
                    type: 'post',
                    url: '/customer/favorite',
                    data: {
                        foody_id: id
                    },
                    success: function (data) {
                        let icon = data === 'favorited' ? 'bookmark' : 'bookmark outline';
                        let text = data === 'favorited' ? 'Bỏ lưu' : 'Lưu';
                        $('#foody-favorite').empty();
                        $('#foody-favorite').html("<i class='" + icon + " icon'></i>" + text + "</span>");
                    }
                });
            }
            else {
                $('#require-modal').modal('open');
            }
        });
        
        function nextImage() {
            $.each($('.comment-modal-image'), function (key, value) {
                if (key <= 4) {
                    $(value).addClass('hide');
                }
                else {
                    $(value).removeClass('hide');
                }
                $('#comment-modal-next').addClass('hide');
                $('#comment-modal-next').attr('data-active', 'true');
                $('#comment-modal-before').removeClass('hide');
            });
        }
        function previousImage() {
            $.each($('.comment-modal-image'), function (key, value) {
                if (key <= 4) {
                    $(value).removeClass('hide');
                }
                else {
                    $(value).addClass('hide');
                }
                $('#comment-modal-before').addClass('hide');
                $('#comment-modal-next').removeClass('hide');
                $('#comment-modal-next').attr('data-active', 'false');
            });
        }
    </script>

    @include('customer.foody.comment.js')

    <script>
        $('.foody-rating-modal-show').on('click', function () {
            let logged = '{{ $logged }}';
            if (logged === 'false') {
                $('#require-modal').modal('open');
            }
            else {
                if ('{{ $voted }}' === 'true') {
                    $('#rating-content').append("<div id=\"rating-block\">\n" +
                        "            <p class=\"white-text center-align\">Bạn đã thực hiện đánh giá sản phẩm này rồi</p>\n" +
                        "            <div class=\"center\">\n" +
                        "                <button id=\"change-rating\" class=\"blue waves-effect waves-light btn\">Thay đổi</button>\n" +
                        "            </div>\n" +
                        "        </div>");
                    $('#change-rating').on('click', function () {
                        $('#rating-block').remove();
                    });
                }
                $('#foody-rating-modal').modal('open');
            }
        });
        $('.rating-vote i').on('click', function () {
            let current_rate = this;
            let count = 0;
            $($($(this).parent().get(0)).children().get()).attr('class', 'far fa-star');
            $($($(this).parent().get(0)).children().get()).each(function (key, value) {
                $(value).attr('class', 'fas fa-star');
                count = key;
                if (value === current_rate) {
                    return false;
                }
            });
            let describe = $($($(current_rate).parent().get(0)).parent().get(0)).children().get(2);
            if (count === 0) {
                $(describe).html("<span class='red-text'>1.0</span> <small>(Rất tệ)</small>");
            }
            if (count === 1) {
                $(describe).html("<span class='grey-text'>2.0</span> <small>(Tệ)</small>");
            }
            if (count === 2) {
                $(describe).html("3.0 <small>(Trung bình)</small>");
            }
            if (count === 3) {
                $(describe).html("<span class='green-text'>4.0</span> <small>(Tốt)</small>");
            }
            if (count === 4) {
                $(describe).html("<span class='purple-text'>5.0</span> <small>(Tuyệt vời)</small>");
            }
        });

        $('#send-rating').on('click', function () {
            let attitude = 0;
            let quality = 0;
            let cost = 0;
            $('.rating-vote i').each(function (key, value) {
                if (key <= 4) {
                    if ($(value).attr('class') === 'fas fa-star') {
                        cost++;
                    }
                }
                else if (key <=9) {
                    if ($(value).attr('class') === 'fas fa-star') {
                        attitude++;
                    }
                }
                else {
                    if ($(value).attr('class') === 'fas fa-star') {
                        quality++;
                    }
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ route('customer.foody.rating') }}',
                data: {
                    attitude: attitude,
                    quality: quality,
                    cost: cost,
                    foody_id: '{{ $foody->id }}'
                },
                success: function (data) {
                    if (data.status === 'error') {
                        console.log(data.content);
                    }
                    else {
                        location.reload();
                    }
                }
            });
        });
    </script>
@endpush