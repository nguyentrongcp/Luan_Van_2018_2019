<!-- Modal show detail product-->
@foreach($products as $pro)
    <div class="modal fade" id="modal-info-pro-{{$pro->id}}" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top modal-info-product" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title text-black-50" id="exampleModalCenterTitle">{{$pro->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row col-12">
                        <div class="col-4">
                            <table>
                                <tr>
                                    <td>Loại thực đơn:</td>
                                    <td>Nước uống</td>
                                </tr>
                                <tr>
                                    <td>Giá:</td>
                                    <td>12000</td>
                                </tr>
                                <tr>
                                    <td>Đánh giá:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-8">

                            <div class="img-avatar">
                                <div class="title">
                                    <label class="text-center" for="img-avatar">Ảnh đại diện</label>
                                </div>
                                <div class="gallery">
                                    <img src="{{asset($pro->avatar)}}" alt="{{$pro->name}}">
                                </div>

                            </div>
                            <div class="img-product">
                                {{--<div class="title">--}}
                                {{--<label class="text-center" for="img-avatar">Chi tiết ảnh</label>--}}
                                {{--</div>--}}
                                {{--<div class="gallery">--}}
                                {{--<img class="img-list" src="{{asset($pro->avatar)}}" alt="{{$pro->name}}">--}}
                                {{--</div>--}}

                                <div class="text-center my-3 content-slide-place">
                                    <div id="eatingCarousel" class="carousel slide w-100" data-ride="carousel">
                                        <div class="carousel-inner w-100" role="listbox">
                                            <div class="carousel-item row no-gutters active">
                                                @foreach(App\ImageFoodyProduct::where('product_id',$pro->id) as $idImage)

                                                    @foreach(App\Image::where('id',$idImage->image_id) as $images)
                                                        <div class="col-4 float-left">
                                                            <div class="item-lq">
                                                                <a href="#"><img src="{{asset($images->link)}}"
                                                                                 alt="{{$pro->name}}"
                                                                                 class="img-raised rounded img-fluid"></a>
                                                                <h4 class="h4-ct"><a href="#">{{$pro->name}}</a></h4>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endforeach

                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#eatingCarousel" role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#eatingCarousel" role="button"
                                           data-slide="next"><span class="carousel-control-next-icon"
                                                                   aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!--End modal-->