<!-- Modal change cost product-->
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
                        <div class="col-6">
                            <table>
                                <tr>
                                    <td class="title text-black-30">Loại thực đơn:</td>
                                    @foreach(App\ProductType::where('id',$pro->product_type_id)->get() as $nameType)
                                        <td>{{$nameType->name}}</td>
                                    @endforeach
                                </tr>
                                <tr>
                                    <td class="title text-black-30">Giá:</td>
                                    @foreach(App\Cost::where('product_id',$pro->id)->get() as $costPro)
                                        <td>{{number_format($costPro->cost).'đ'}}</td>
                                    @endforeach
                                    <td>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="title text-black-30">Đánh giá:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">

                            <div class="img-avatar">
                                <div class="title">
                                    <label class="text-center" for="img-avatar">Ảnh đại diện</label>
                                </div>
                                <div class="gallery">
                                    <img src="{{asset($pro->avatar)}}" alt="{{$pro->name}}">
                                </div>
                            </div>
                            <div class="img-product">
                                <div class="title">
                                    <label class="text-center" for="img-avatar">Ảnh chi tiết</label>
                                </div>
                                <div class="text-center my-3 content-slide-place">
                                    <div id="eatingCarousel" class="carousel slide w-100" data-ride="carousel">
                                        <div class="carousel-inner w-100" role="listbox">
                                            <div class="carousel-item row no-gutters active">
<<<<<<< HEAD
                                                @foreach (App\ImageProduct::where('product_id',$pro->id)->get() as $idImage)
                                                    @foreach (App\Image::where('id',$idImage->image_id)->get() as $id)
=======
                                                @foreach(App\ImageFoodyProduct::where('product_id',$pro->id) as $idImage)

                                                    @foreach(App\Image::where('id',$idImage->image_id) as $images)
>>>>>>> 746f3da5452cb7884b53b5f1011f41d8d2fd0963
                                                        <div class="col-4 float-left">
                                                            <div class="item-ct">
                                                                <a href="#"><img
                                                                            src="{{asset($id->link)}}"
                                                                            alt=""
                                                                            class="img-raised rounded img-fluid img-list">
                                                                </a>
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
    </div>
@endforeach
<!--End modal-->