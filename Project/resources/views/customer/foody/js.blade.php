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

            if ($($('.foody-describe .cont')[0]).height() > 72) {
                $($('.foody-describe')[0]).append("<a style='cursor: pointer' id='show-more'>Xem thêm</a>");
                $('#show-more').on('click', function () {
                    if ($(this).text() === 'Xem thêm') {
                        $($('.foody-describe .cont')[0]).removeClass('cont');
                        $(this).text('Thu nhỏ');
                    }
                    else {
                        $($($('.foody-describe')[0]).children().get(0)).addClass('cont');
                        $(this).text('Xem thêm');
                    }
                });
            }

            $('#dimmer-image').dimmer({
                on: 'hover'
            });
            $('#foody-comment-modal').modal({
                dismissible: false,
                endingTop: '5%'
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
            let height_of_window = $(window).height();
            let width_of_window = $(window).width();
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

        $("#add-cart-qty").change(function () {
            let cost = $(this).val() * parseFloat('{{ $foody->getSaleCost() }}');
            cost = numeral(cost).format('0,0');
            $('#add-cart-cost').html(cost + "<sup>đ</sup>");
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

        function changeCost() {

        }

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
@endpush