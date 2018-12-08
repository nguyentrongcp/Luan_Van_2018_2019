<script>
    $('.foody-comment-show').on('click', function () {
        let logged = '{{ $logged }}';
        if (logged === 'false') {
            $('#require-modal').modal('open');
        }
        else {
            $('#foody-comment-modal').modal('open');
        }
    });

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
                        let imagePreview = "<div id='" + time + "' class='comment-modal-image " + hide + "'>\n" +
                            "<img src='" + e.target.result + "'>\n" +
                            "            <i class='material-icons'>clear</i>\n" +
                            "        </div>";
                        $('#comment-modal-image-location').append(imagePreview);
                        let image = $('#' + time).children().get(0);
                        $(image).on('error', function () {
                            M.toast({
                                html: "<i class='material-icons left red-text'>error_outline</i>Hình ảnh không hợp lệ!"
                            });
                            $($(image).parent().get(0)).remove();
                        });
                        addEventToImage($('#' + time));
                    }
                }
            });
            reader.readAsDataURL(input.files[key]);
        });
        $(input).val("");
    }

    function addEventToImage(value) {
        $($(value).children().get(1)).on('click', function () {
            removeImage(value);
        });
        $($(value).children().get(0)).on('click', function () {
            let image = this;
            let index = 0;
            $.each($('.comment-modal-image img'), function (key, value) {
                if (value === image) {
                    index = key;
                }
            });
            openViewer($('.comment-modal-image img'), index);
        });
    }

    function uploadToServer(foody_id) {
        // console.log($('#comment-modal-content').val().replace(/\n/g, '<br />'));
        if (($('#comment-modal-title').val() === '') || ($('#comment-modal-content').val() === '')) {
            if ($('#comment-modal-title').val() === '') {
                $('#comment-modal-title-error').html("<span class=\"helper-text red-text\" >Vui lòng không bỏ trống tiêu đề!</span>");
            }
            if ($('#comment-modal-content').val() === '') {
                $('#comment-modal-content-error').html("<span class=\"helper-text red-text\" >Vui lòng không bỏ trống nội dung!</span>");
            }
        }
        else {
            setLoader();
            let files = [];
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
                        closeLoader();
                        $('#foody-comment-modal').modal('close');
                        $('#comment-modal-success-text').text('Bình luận của bạn đã được gửi. Chúng tôi sẽ xem xét và phê duyệt trong thời gian sớm nhất.');
                        $('#comment-modal-success').modal('open');
                    }
                }
            });
        }
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

    function removeImage(value) {
        $(value).remove();
        if ($('#comment-modal-next').attr('data-active') === 'false') {
            previousImage();
        }
        if ($('.comment-modal-image').length <= 5) {
            previousImage();
            $('#comment-modal-next').addClass('hide');
        }
    }

    $('.comment-delete').on('click', function () {
        let comment = null;
        let comment_id = $(this).attr('data-id');
        comment = $('#comment-row-' + comment_id);
        $('#confirm-modal').css('max-width', '370px');
        $('#confirm-modal-text').text('Bạn chắc chắn muốn xóa bình luận này?');
        $('#confirm-modal-button').off('click');
        $('#confirm-modal-button').on('click', function () {
            $.ajax({
                type: 'get',
                url: '{{ route('customer.foody.comment.delete') }}',
                data: {
                    comment_id: comment_id,
                    type: 'comment'
                },
                success: function (data) {
                    if (data.status === 'success') {
                        $('#confirm-modal').modal('close');
                        $(comment).remove();
                        M.toast({
                            html: data.content
                        });
                    }
                }
            })
        });
        $('#confirm-modal').modal('open');
    });

    $('.mini-comment').on('keyup', function (e) {
        let id = $(this).attr('data-id');
        let input = $(this).val();
        if (e.keyCode == 13) {
            $(this).val('');
            if (input != '') {
                $.ajax({
                    type: 'post',
                    url: '{{ route('customer.foody.comment.mini') }}',
                    data: {
                        content: input,
                        comment_id: id
                    },
                    success: function (data) {
                        if (data.status === 'success') {
                            $('#mini-comment-' + id).append(data.content);
                            $('.delete-mini-comment').off('click');
                            $('.delete-mini-comment').on('click', function () {
                                deleteMiniChat(this, $(this).attr('data-id'));
                            });
                        }
                    }
                });
            }
        }
    });

    $('.delete-mini-comment').on('click', function () {
        deleteMiniChat(this, $(this).attr('data-id'));
    });

    function deleteMiniChat(element, id) {
        let comment = $($(element).parent().get(0)).parent().get(0);
        $('#confirm-modal').css('max-width', '370px');
        $('#confirm-modal-text').text('Bạn chắc chắn muốn xóa bình luận này?');
        $('#confirm-modal-button').off('click');
        $('#confirm-modal-button').on('click', function () {
            $.ajax({
                type: 'get',
                url: '{{ route('customer.foody.comment.delete') }}',
                data: {
                    comment_id: id,
                    type: 'mini'
                },
                success: function (data) {
                    if (data.status === 'success') {
                        $('#confirm-modal').modal('close');
                        $(comment).remove();
                        M.toast({
                            html: data.content
                        });
                    }
                }
            })
        });
        $('#confirm-modal').modal('open');
    }
</script>