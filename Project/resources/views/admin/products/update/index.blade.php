@extends('admin.layouts.master')
@section('title','ADMIN | Loại sản phẩm')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-round btn-info text-white" href="{{route('products.index')}}">&blacktriangleleft;&blacktriangleleft;TRỞ VỀ</a>
                        <h4 class="card-title title text-center">THÔNG TIN CHI TIẾT THỰC ĐƠN</h4>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="col-md-12 row">
                                <div class="col-md-5 card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <table>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="name">Tên thực
                                                        đơn: </label>
                                                </td>
                                                <td>
                                                    <label class="lb-info">{{$namePro}}</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="type">Thuộc
                                                        loại: </label>
                                                </td>
                                                <td>
                                                    <label class="lb-info">{{$nameTypePro}}</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="cost">Giá: </label>
                                                </td>
                                                <td>
                                                    <label class="lb-info">{{number_format($cost).'đ'}}</label>
                                                    <button type="button" class="btn btn-info btn-round"
                                                            onclick="$('#modal-change-cost').modal('show')">Thay đổi
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label class="title text-black-40 lb-info" for="type">Đánh
                                                        giá: </label>
                                                </td>
                                                <td>
                                                    <label for="star">
                                                        <img src="{{asset('admin/assets/images/star/star-on.png')}}"
                                                             alt="">
                                                        <img src="{{asset('admin/assets/images/star/star-on.png')}}"
                                                             alt="">
                                                        <img src="{{asset('admin/assets/images/star/star-half.png')}}"
                                                             alt="">
                                                        <img src="{{asset('admin/assets/images/star/star-half.png')}}"
                                                             alt="">
                                                        <img src="{{asset('admin/assets/images/star/star-off.png')}}"
                                                             alt="">
                                                    </label>
                                                    <a class="text-info" href="">&nbsp;&nbsp;Chi tiết</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                        <div class="img-avatar">
                                            <div class="card-header bg-info">
                                                <label class="text-center title text-white lb-info" for="img-avatar">Hình ảnh
                                                    đại
                                                    diện</label>
                                            </div>
                                            <div class="gallery">
                                                <img src="{{asset($avatarPro)}}" alt="{{$namePro}}">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-info btn-round"
                                                onclick="$('#modal-change-avatar').modal('show')">Thay đổi
                                        </button>
                                        <div class="img-product">
                                            <form action="" class="form-product-image" method="post">
                                                <div class="card-header bg-info">
                                                    <label class="text-center title text-white lb-info" for="img-avatar">Hình ảnh
                                                        chi
                                                        tiết</label>
                                                </div>
                                                <div class="gallery form-group">
                                                    @foreach (App\ImageProduct::where('product_id',$id)->get() as $idImage)
                                                        @foreach (App\Image::where('id',$idImage->image_id)->get() as $image)
                                                            <div class="col-4 float-left">
                                                                <div class="item-ct">
                                                                    <a href="#">
                                                                        <div class="form-check">
                                                                            <label class="form-check-label">
                                                                                <input class="form-check-input"
                                                                                       name="image-id[]" type="checkbox"
                                                                                       onclick="">
                                                                                <span class="form-check-sign"></span>
                                                                                <img
                                                                                        src="{{asset($image->link)}}"
                                                                                        alt=""
                                                                                        class="img-raised rounded img-fluid img-list">
                                                                            </label>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div class="change-product-image">
                                                    <button type="submit"
                                                            class="btn btn-danger btn-fab btn-icon btn-round"
                                                            style="cursor: pointer">
                                                        <i class="now-ui-icons ui-1_simple-delete"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-fab btn-icon btn-round"
                                                            style="cursor: pointer"
                                                            onclick="$('#modal-change-multi-image').modal('show')">
                                                        <i class="now-ui-icons ui-1_simple-add"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="card-header bg-info">
                                        <label class="title text-white lb-info" for="des">Mô tả chi tiết</label>
                                    </div>
                                    <textarea rows="5" class="form-control"
                                              name="des">{!! $describe !!}</textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-round">QUAY LẠI
                                    </button>
                                    <button type="submit" class="btn btn-info btn-round">LƯU
                                        THAY
                                        ĐỔI
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.products.update.modal-change-cost')
    @include('admin.products.update.modal-change-avatar')
    @include('admin.products.update.modal-change-multi-image-detail')

@endsection
<script>
    var gallery = document.querySelector('.gallery');
    var galleryItems = document.querySelectorAll('.gallery-item');
    var numOfItems = gallery.children.length;
    var itemWidth = 23; // percent: as set in css

    var featured = document.querySelector('.featured-item');

    var leftBtn = document.querySelector('.move-btn.left');
    var rightBtn = document.querySelector('.move-btn.right');
    var leftInterval;
    var rightInterval;

    var scrollRate = 0.2;
    var left;

    function selectItem(e) {
        if (e.target.classList.contains('active')) return;

        featured.style.backgroundImage = e.target.style.backgroundImage;

        for (var i = 0; i < galleryItems.length; i++) {
            if (galleryItems[i].classList.contains('active'))
                galleryItems[i].classList.remove('active');
        }

        e.target.classList.add('active');
    }

    function galleryWrapLeft() {
        var first = gallery.children[0];
        gallery.removeChild(first);
        gallery.style.left = -itemWidth + '%';
        gallery.appendChild(first);
        gallery.style.left = '0%';
    }

    function galleryWrapRight() {
        var last = gallery.children[gallery.children.length - 1];
        gallery.removeChild(last);
        gallery.insertBefore(last, gallery.children[0]);
        gallery.style.left = '-23%';
    }

    function moveRight() {
        left = left || 0;

        leftInterval = setInterval(function () {
            gallery.style.left = left + '%';

            if (left > -itemWidth) {
                left -= scrollRate;
            } else {
                left = 0;
                galleryWrapLeft();
            }
        }, 1);
    }

    function moveLeft() {
        //Make sure there is element to the leftd
        if (left > -itemWidth && left < 0) {
            left = left - itemWidth;

            var last = gallery.children[gallery.children.length - 1];
            gallery.removeChild(last);
            gallery.style.left = left + '%';
            gallery.insertBefore(last, gallery.children[0]);
        }

        left = left || 0;

        leftInterval = setInterval(function () {
            gallery.style.left = left + '%';

            if (left < 0) {
                left += scrollRate;
            } else {
                left = -itemWidth;
                galleryWrapRight();
            }
        }, 1);
    }

    function stopMovement() {
        clearInterval(leftInterval);
        clearInterval(rightInterval);
    }

    leftBtn.addEventListener('mouseenter', moveLeft);
    leftBtn.addEventListener('mouseleave', stopMovement);
    rightBtn.addEventListener('mouseenter', moveRight);
    rightBtn.addEventListener('mouseleave', stopMovement);


    //Start this baby up
    (function init() {
        var images = [
            @foreach (App\ImageProduct::where('product_id',$id)->get() as $idImage)
                    @foreach (App\Image::where('id',$idImage->image_id)->get() as $image)
                '{{asset('$image->link')}}',
            @endforeach
            @endforeach
        ];

        //Set Initial Featured Image
        featured.style.backgroundImage = 'url(' + images[0] + ')';

        //Set Images for Gallery and Add Event Listeners
        for (var i = 0; i < galleryItems.length; i++) {
            galleryItems[i].style.backgroundImage = 'url(' + images[i] + ')';
            galleryItems[i].addEventListener('click', selectItem);
        }
    })();

    //slide
</script>
{{-- end slide image --}}