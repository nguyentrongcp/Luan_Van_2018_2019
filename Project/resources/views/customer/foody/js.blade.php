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
            $('#dimmer-image').dimmer({
                on: 'hover'
            });
            $('#foody-comment-modal').modal({
                dismissible: false
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

            $(window).resize(function () {
                $.each($('.comment-image img'), function (key, value) {
                    $(value).css('height', $(value).width());
                });
                $.each($('.foody-images'), function (key, value) {
                    $(value).css('height', $(value).width());
                });
            });

            let navbar = $('#foody-scrollspy-container');
            let rating = $('#foody-rating-show');
            let second_navbar = $('#navbar-second');
            let container = $('#foody-content-container');
            $(navbar).pushpin({
                top: $(container).offset().top - $(second_navbar).height(),
                bottom: $(container).offset().top + $(container).height() - $(navbar).height()
                    - $(second_navbar).height() -50,
                onPositionChange: function (status) {
                    if (status === 'pin-bottom') {
                        let top = $(container).height() - $(navbar).height() - 50;
                        $(navbar).css('top', top);
                    }
                    if (status === 'pinned') {
                        $(navbar).css('top', $(second_navbar).height());
                    }
                }
            });
            $(rating).pushpin({
                top: $(rating).offset().top - $(second_navbar).height(),
                bottom: $(container).offset().top + $(container).height() - $(rating).height()
                    - $(second_navbar).height() - 50,
                onPositionChange: function (status) {
                    if (status === 'pin-bottom') {
                        let top = $(container).height() - $('#slider-ads-landscape').height() - $(rating).height()
                            - $(second_navbar).height();
                        $(rating).css('top', top);
                    }
                    if (status === 'pinned') {
                        console.log('fsd');
                        $(rating).css('top', $(second_navbar).height());
                    }
                }
            });
        });

        $('#add-cart-qty').on('input', function () {
            let cost = $(this).val() * parseFloat('{{ $foody->getSaleCost() }}');
            cost = numeral(cost).format('0,0');
            $('#add-cart-cost').html(cost + "<sup>đ</sup>");
        });

        $('#foody-comment-show').on('click', function () {
            let logged = '{{ $logged }}';
            if (logged === 'false') {
                $('#login-require').modal('open');
            }
            else {
                $('#foody-comment-modal').modal('open');
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

        function uploadImage(input) {
            if ($('.comment-modal-image').length === 10) {
                M.toast({
                    html: "<i class='material-icons left blue-text'>info_outline</i>Chỉ được thêm tối đa 10 ảnh."
                });
                return false;
            }
            $.each(input.files, function (key, value) {
                let reader = new FileReader();
                $(reader).on('load', function(e) {
                    // $('#blah').attr('src', e.target.result);
                    // console.log(e.target.result);
                    if (!checkExistImage(e.target.result)) {
                        // console.log(e.target.result);

                        if ($('.comment-modal-image').length < 10) {
                            let hide = '';
                            if ($('.comment-modal-image').length === 5) {
                                $('#comment-modal-next').removeClass('hide');
                            }
                            if (($('.comment-modal-image').length >= 5) && ($('#comment-modal-next').attr('data-active') === 'false')) {
                                hide = 'hide';
                            }
                            let time = $.now();
                            let imagePreview = "<div id='" + time + "'" + " data-target=\"" + e.target.result + "\"" +
                                " class='comment-modal-image " + hide + "'>\n" +
                                "            <img src='" + e.target.result + "' onclick=\"openViewer($('.comment-modal-image img'), " +
                                key + ")\"" + "'>\n" +
                                "            <i class='material-icons'" + "' onclick='removeImage(" + time + ")'>clear</i>\n" +
                                "        </div>";
                            $('#comment-modal-image-location').append(imagePreview);
                        }
                    }
                });
                reader.readAsDataURL(input.files[key]);
            });
            $(input).val("");
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
                $('#login-require').modal('open');
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
                $('#login-require').modal('open');
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

        function checkExistImage(result) {
            // console.log(result);
            var exist = false;
            $.each($('.comment-modal-image'), function (key, value) {
                if ($(value).attr('data-target') === result) {
                    exist = true;
                }
            });
            return exist;
        }

        function removeImage(time) {
            $('#' + time).remove();
            if ($('#comment-modal-next').attr('data-active') === 'false') {
                previousImage();
            }
            if ($('.comment-modal-image').length <= 5) {
                previousImage();
                $('#comment-modal-next').addClass('hide');
            }
        }

        function uploadToServer(foody_id) {
            console.log($('#comment-modal-content').val().replace(/\n/g, '<br />'));
            if (($('#comment-modal-title').val() === '') || ($('#comment-modal-content').val() === '')) {
                if ($('#comment-modal-title').val() === '') {
                    $('#comment-modal-title-error').html("<span class=\"helper-text red-text\" >Vui lòng không bỏ trống tiêu đề!</span>");
                }
                if ($('#comment-modal-content').val() === '') {
                    $('#comment-modal-content-error').html("<span class=\"helper-text red-text\" >Vui lòng không bỏ trống nội dung!</span>");
                }
            }
            else {
                var files = [];
                $.each($('.comment-modal-image img'), function (key, value) {
                    files[key] = $(value).attr('src');
                });
                $.ajax({
                    type: 'post',
                    url: '/customer/foody/comment',
                    data: {
                        images: files,
                        title: $('#comment-modal-title').val(),
                        content: $('#comment-modal-content').val().replace(/\n/g, '<br>'),
                        foody_id: foody_id
                    },
                    success: function (data) {
                        if (data.status === 'error') {
                            var response = JSON.parse(data.errors.responseText);
                            $.each(response.errors, function (key, value) {
                                console.log(key);
                            });
                        }
                        else {
                            $('#comment-modal-title').val(null);
                            $('#comment-modal-content').val(null);
                            $('#comment-modal-image-location').empty();
                            $('#foody-comment-modal').modal('close');
                            $('#comment-modal-success-text').text('Bình luận của bạn đã được gửi. Chúng tôi sẽ xem xét và phê duyệt trong thời gian sớm nhất.');
                            $('#comment-modal-success').modal('open');
                        }
                    }
                });
            }
        }
    </script>
@endpush