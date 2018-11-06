<div id="image-viewer" class="image-viewer hide">
    <div class="image-view-main">
        <img id="image-viewer-main" src="{{ asset('/customer/image_comment/1-1539529539-0.png') }}">
    </div>
    <div class="divider"></div>
    <div class="image-view-action">
        <div class="image-view-close">
            <i onclick="closeViewer()" class="material-icons">close</i>
        </div>
        <div class="image-view-previous">
            <i id="image-view-previous"
               onclick="viewImage($('#image-viewer-' + (parseInt($($('#image-viewer-list img.active')[0]).attr('data-image')) - 1)))"
               class="material-icons">navigate_before</i>
        </div>
        <div class="image-view-next">
            <i data-image="image-viewer-1"
               onclick="viewImage($('#image-viewer-' + (parseInt($($('#image-viewer-list img.active')[0]).attr('data-image')) + 1)))"
               id="image-view-next" class="material-icons">navigate_next</i>
        </div>
    </div>
    <div class="image-viewer-list">
        <div id="image-viewer-list">
            {{--@foreach(\App\Image::all() as $key => $image)--}}
                {{--<img id="image-viewer-{{ $key }}" class="{{ $key==0?'active':'' }}" style="margin-left: {{ $key==0?'0':'5px' }}"--}}
                     {{--src="{{ $image->link }}" onclick="viewImage(this)" data-image="{{ $key }}">--}}
            {{--@endforeach--}}
        </div>
    </div>
</div>

<style>
    @media only screen and (min-width: 993px) {
        .image-view-action i:hover {
            color: #D7D0D0;
        }
        .image-view-next i, .image-view-previous i {
            cursor: pointer;
        }
        .image-view-action:hover {
            opacity: 1 !important;
        }
        .image-view-action {
            opacity: 0 !important;
        }
    }

    .image-viewer {
        opacity: 1;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        will-change: opacity;
        z-index: 1004;
        width: 100%;
        height: 100%;
        background-color: #292929;
    }
    .image-view-main {
        height: calc(100vh - 100px);
    }
    .image-view-main img {
        max-width: 100%;
        max-height: 100%;
        position: relative;
    }
    .image-viewer-list {
        height: 100px;
        width: 80%;
        overflow: hidden;
        margin: auto;
    }
    .image-view-action {
        position: fixed;
        top: 0;
        left: 0;
        height: calc(100vh - 100px);
        width: 100%;
        opacity: 1;
    }
    .image-view-action i {
        color: #666;
    }
    .image-view-close {
        height: 100px;
    }
    .image-view-close i {
        font-size: 50px;
        float: right;
        cursor: pointer;
    }
    .image-view-previous i, .image-view-next i {
        font-size: 100px !important;
        height: 100%;
        padding-top: calc((100vh - 400px) / 2);
    }
    .image-view-previous {
        float: left;
        height: calc(100vh - 200px);
    }
    .image-view-next {
        float: right;
        height: calc(100vh - 200px);
    }

    #image-viewer-list {
        height: 100%;
        width: 100vw;
        position: relative;
        margin: auto;
    }
    #image-viewer-list img {
        width: 80px;
        height: 80px;
        margin: 10px 0;
        display: block;
        float: left;
        opacity: 0.4;
        cursor: pointer;
    }
    #image-viewer-list img.active {
        opacity: 1 !important;
    }
</style>

@push('script')
    <script>

        var image_width = 85;

        function initImageViewer(list_image, image_selected) {
            var count = parseInt((($(window).width()) * 8 / 10) / image_width) + 1;
            let width = count * image_width;
            if (list_image.length < count) {
                width = image_width * list_image.length;
            }
            $('#image-viewer-list').css({
                width: width,
                left: 0
            });
            var next = count;
            $.each(list_image, function (key, value) {
                let active = '';
                let margin = '5px';
                let src = $(value).attr('src');
                if (key === image_selected) {
                    active = "class='active'";
                    $('#image-viewer-main').attr('src', src);
                }
                if (key === 0) {
                    margin = '0';
                }
                let data_action = '';
                if (key === next - 2) {
                    if (($(window).width() * 0.8 - ((count - 1) * image_width) - 80) > 0 &&
                        key === list_image.length - 2) {
                        data_action = '';
                    }
                    else {
                        data_action = "data-action='previous'";
                    }
                }
                if (key === next - 1) {
                    if (($(window).width() * 0.8 - ((count - 1) * image_width) - 80) > 0 &&
                        key === list_image.length - 1) {
                        data_action = '';
                    }
                    else {
                        data_action = "data-action='next'";
                        next += count - 2;
                    }
                }
                $('#image-viewer-list').append("" +
                    "<img id='image-viewer-" + key + "' " + data_action + active +
                    " style='margin-left: " + margin + "'\n" +
                    "                     src='" + src + "' onclick='viewImage(this)' data-image='" + key + "'>");
            });
            // $('#image-viewer-' + (next - count + 2)).attr('data-last', 'inactive');
            scrollImageList(image_selected, 750);
        }

        // $(window).resize(function f() {
        //     initImageViewer($('#image-viewer-list img'), 0);
        //     console.log(parseInt(($(window).width() * 8 / 10) / image_width) + 1);
        // });

        function sizeChange() {
            $(window).resize(function () {
                console.log('fsd');
                // scrollImage(image_selected);
                // console.log($('#image-viewer-list img'));
                // $('#image-viewer-list').html('');
                let list_image = $('#image-viewer-list img');
                $('#image-viewer-list img').removeAttr('data-next');
                $('#image-viewer-list img').removeAttr('data-action');
                let count = parseInt(($(window).width() * 8 / 10) / image_width) + 1;
                let next = count;
                while(next <= list_image.length) {
                    if (($(window).width() * 0.8 - ((count - 1) * image_width) - 80) > 0 &&
                        next === list_image.length) {
                    }
                    else {
                        $('#image-viewer-' + (next - 2)).attr('data-action', 'previous');
                    }
                    if (($(window).width() * 0.8 - ((count - 1) * image_width) - 80) > 0 &&
                        next === list_image.length) {
                    }
                    else {
                        $('#image-viewer-' + (next - 1)).attr('data-action', 'next');
                    }
                    next += count - 2;
                }
                let width = count * image_width;
                if (list_image.length < count) {
                    width = list_image.length * image_width;
                }
                $('#image-viewer-list').css({
                    width: width,
                    left: 0
                });
                scrollImageList($($('#image-viewer-list img.active')[0]).attr('data-image'), 0);
                // openViewer($('#image-viewer-list img'), $('#image-viewer-list img.active')[0]);
            });
        }
        
        function scrollImageList(image_selected, time) {
            let count = parseInt(($(window).width() * 8 / 10) / image_width);
            let next = count;
            let width = 0;
            while (next <= image_selected) {
                if (next !== image_selected || $('#image-viewer-' + image_selected).attr('data-action') === 'next') {
                    width += image_width * (count - 1);
                    next += (count - 1);
                }
                else {
                    break;
                }
            }
            if (width !== 0) {
                let image_list = $('#image-viewer-list');
                $(image_list).css({
                    width: "+=" + width
                });
                $(image_list).animate({
                    left: - width
                }, time);
                if (next !== image_selected) {
                    next -= count - 1;
                }
                else {
                    next = image_selected;
                }
                $('#image-viewer-' + next).attr('data-next', 'active');
            }
        }

        function openViewer(list_image, image_selected) {
            $('body').css('overflow', 'hidden');
            initImageViewer(list_image, image_selected);

            $('#image-viewer').removeClass('hide');
            setMiddle($('#image-viewer-main'));
            $(window).resize(function () {
                setMiddle($('#image-viewer-main'))
            });
            if ($('#image-viewer-list img').length > 1) {
                $('#image-view-next').removeClass('hide');
            }
            if (image_selected === list_image.length - 1) {
                $('#image-view-next').addClass('hide');
            }
            if (image_selected === 0) {
                $('#image-view-previous').addClass('hide');
            }
            sizeChange();
        }
        
        function viewImage(image) {
            let data_image = parseInt($(image).attr('data-image'));
            let image_next = $('#image-view-next');
            let image_previous = $('#image-view-previous');
            let image_total = $('.image-viewer-list img').length;
            $('#image-viewer-main').attr('src', $(image).attr('src'));
            $('#image-viewer-list .active').removeClass('active');
            $(image).addClass('active');
            $(image_next).attr('data-image', 'image-viewer-' + (data_image + 1));
            $(image_previous).attr('data-image', 'image-viewer-' + (data_image -1));
            if ($(image).attr('data-action') === 'next') {
                nextImageList(image);
            }
            if ($(image).attr('data-action') === 'previous') {
                previousImageList(image);
            }
            if (data_image > 0 && data_image < image_total - 1) {
                $(image_next).removeClass('hide');
                $(image_previous).removeClass('hide');
            }
            else {
                if (data_image === 0) {
                    $(image_previous).addClass('hide');
                }
                else {
                    $(image_next).addClass('hide');
                }
            }
        }
        
        function nextImageList(image_selected) {
            let count = parseInt((($(window).width()) * 8 / 10) / image_width);
            let image_list_length = $('#image-viewer-list img').length;
            if (image_list_length >= count - 1) {
                if ($(image_selected).attr('data-next') !== 'active') {
                    let image_list = $('#image-viewer-list');
                    $(image_list).css({
                        width: "+=" + (image_width * (count - 1))
                    });
                    $(image_list).animate({
                        'left' : "-=" + (image_width * (count - 1))
                    }, 750);
                    $(image_selected).attr('data-next', 'active');
                    // if ($(image_selected).attr('data-last') === 'inactive') {
                    //     $(image_selected).attr('data-last', 'active');
                    // }
                }
            }
        }

        function previousImageList(image_selected) {
            let count = parseInt(($(window).width() * 8 / 10) / image_width);
            if ($('#image-viewer-list').width() > (count + 1) * image_width) {
                let image_last = $('#image-viewer-' + (parseInt($(image_selected).attr('data-image')) + 1));
                if ($(image_last).attr('data-next') === 'active') {
                    let image_list = $('#image-viewer-list');
                    $(image_list).animate({
                        'left' : "+=" + (image_width * (count - 1))
                    }, 750, function () {
                        $(image_list).css({
                            width: "-=" + (image_width * (count - 1))
                        });
                    });
                    // if ($(image_last).attr('data-last') === 'active') {
                    //     image_last.attr('data-last', 'inactive');
                    // }
                    if ($('#image-viewer-list').width() > (count + 1) * image_width) {
                        $('#image-viewer-' + (parseInt($(image_last).attr('data-image')) - (count - 1))).attr('data-next', 'active');
                        $(image_last).removeAttr('data-next');
                    }
                }
            }
        }

        function setMiddle(image) {
            let top = ($(window).height() - $(image).height() - 100) / 2;
            let left = ($(window).width() - $(image).width()) / 2;
            $(image).css({
                top: top,
                left: left
            });
            // let count = ($('#image-viewer-list').width() + 5) / 85;
        }
        
        function closeViewer() {
            $('#image-viewer').addClass('hide');
            $('#image-viewer-list').empty();
            $('body').css('overflow', 'auto');
        }
    </script>
@endpush