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
            <i id="image-view-previous" onclick="viewImage($('#' + $(this).attr('data-image')))"
               class="material-icons hide">navigate_before</i>
        </div>
        <div class="image-view-next">
            <i data-image="image-viewer-1" onclick="viewImage($('#' + $(this).attr('data-image')))"
               id="image-view-next" class="material-icons hide">navigate_next</i>
        </div>
    </div>
    <div class="image-viewer-list">
        <div id="image-viewer-list">
            @foreach(\App\Image::all() as $key => $image)
                <img id="image-viewer-{{ $key }}" class="{{ $key==0?'active':'' }}" style="margin-left: {{ $key==0?'0':'5px' }}"
                     src="{{ $image->link }}" onclick="viewImage(this)" data-image="{{ $key }}">
            @endforeach
        </div>
    </div>
</div>

<style>
    .image-viewer {
        opacity: 1;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        will-change: opacity;
        z-index: 1000;
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
        opacity: 0;
    }
    .image-view-action:hover {
        opacity: 1;
    }
    .image-view-action i {
        color: #666;
    }
    .image-view-action i:hover {
        color: #D7D0D0;
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
    .image-view-previous i {
        cursor: pointer;
    }
    .image-view-next {
        float: right;
        height: calc(100vh - 200px);
    }
    .image-view-next i {
        cursor: pointer;
    }
    #image-viewer-list {
        height: 100%;
        width: 100vw;
        position: relative;
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

        var previous, next;

        function openViewer() {
            $('#image-viewer').removeClass('hide');
            setMiddle($('#image-viewer-main'));
            $('body').css('overflow', 'hidden');
            $(window).resize(function () {
                setMiddle($('#image-viewer-main'))
            });
            if ($('#image-viewer-list img').length > 1) {
                $('#image-view-next').removeClass('hide');
            }
            next = parseInt(($(window).width() * 8 / 10) / 85);
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
            if (data_image > 0 && data_image < image_total - 1) {
                $(image_next).removeClass('hide');
                $(image_previous).removeClass('hide');
                if (data_image === next) {
                    nextImageList();
                }
                if (data_image === previous) {
                    previousImageList();
                }
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
        
        function nextImageList() {
            let count = parseInt(($(window).width() * 8 / 10) / 85);
            let image_list = $('#image-viewer-list');
            $(image_list).css({
                width: "+=" + (85 * (count - 1))
            });
            $(image_list).animate({
                'left' : "-=" + (85 * (count - 1))
            }, 750);
            previous = next - 1;
            next += count - 1;
        }

        function previousImageList() {
            let count = parseInt(($(window).width() * 8 / 10) / 85);
            let image_list = $('#image-viewer-list');
            $(image_list).animate({
                'left' : "+=" + (85 * (count - 1))
            }, 750, function () {
                $(image_list).css({
                    width: "-=" + (85 * (count - 1))
                });
            });
            next -= count - 1;
            previous -= count - 1;
            if ($(image_list).offset().left === 0) {
                previous = -1;
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

        setMiddle($('#image-viewer-main'));
        
        function closeViewer() {
            $('#image-viewer').addClass('hide');
            $('#image-viewer-list').empty();
            $('body').css('overflow', 'auto');
        }
    </script>
@endpush