<!-- Modal add sales offs-->
<div class="modal fade" id="modal-add-foody-sales" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-size">
            <div class="modal-header">
                <h5 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle">THÊM MỚI KHUYẾN MÃI</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sales_offs_details.store')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="sales-offs-id" value="{{$id}}">
                    <div class="form-group">
                        <label class="title">Chọn thực đơn khuyến mãi</label>
                        <select name="foody-id[]" multiple id="foody-id" class="form-control">
                            @foreach($foodies as $foodie)
                                <option value="{{ $foodie->id }}">{{ $foodie->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                        <span></span>
                        <button type="submit" class="btn btn-info btn-round">
                            LƯU LẠI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End modal-->

{{--<!-- Modal edit sales offs-->--}}
{{--@foreach($salesOffs as $sales)--}}
    {{--<div class="modal fade" id="modal-update-sales-{{$sales->id}}" tabindex="-1" role="dialog"--}}
         {{--aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
        {{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
            {{--<div class="modal-content modal-size" >--}}
                {{--<div class="modal-header">--}}
                    {{--<h3 class="modal-title title text-black-50 text-center" id="exampleModalCenterTitle"--}}
                        {{--style="font-size: 16px">CẬP NHẬT LẠI KHUYẾN MÃI</h3>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<form action="{{route('sales_offs.update',[$sales->id])}}" method="post">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('PUT') }}--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="bmd-label-floating">Tên khuyến mãi</label>--}}
                            {{--<input type="text" class="form-control" name="name-sales" id="name-sales"--}}
                                   {{--placeholder="Nhập tên loại..." value="{{$sales->name}}" minlength="5" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="title">Phần trăm được giảm</label>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-10">--}}
                                    {{--<input type="number" class="form-control" name="percent"  id="percent"--}}
                                           {{--value="{{$sales->percent}}" required>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-2">--}}
                                    {{--<label for="">%</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="bmd-label-floating">Ngày bắt đầu</label>--}}
                            {{--<input type="date" class="form-control" name="start-date" id="start-date"--}}
                                   {{--value="{{$sales->start_date}}" required>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label class="bmd-label-floating">Ngày kết thúc</label>--}}
                            {{--<input type="date" class="form-control" name="end-date" id="end-date"--}}
                                   {{--value="{{$sales->end_date}}" required>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>--}}
                            {{--<span></span>--}}
                            {{--<button type="submit" class="btn btn-info btn-round">LƯU LẠI--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endforeach--}}
{{--<!--  End Modal -->--}}

{{--<!--  Modal delete -->--}}
{{--@foreach($productTypes as $prot)--}}
{{--<div class="modal fade" id="modal-del-prot-{{$prot->id}}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">--}}
{{--<div class="modal-dialog" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h5 class="modal-title title " id="delete">Bạn chắc chắn muốn xóa phải không?</h5>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<p class="text-black-50">Các dữ liệu liên quan đến <strong> {{$prot->name}} </strong>sẽ bị xóa hoàn toàn. Bạn cần suy nghĩ trước khi xóa?</p>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<form action="{{route('product_type.destroy',[0])}}" method="post">--}}
{{--{{ method_field('DELETE') }}--}}
{{--{{ csrf_field() }}--}}
{{--<input type="hidden" name="product-type-id" value="{{ $prot->id }}">--}}
{{--<button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>--}}
{{--<button type="submit" class="btn btn-info btn-round">OK</button>--}}
{{--</form>--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--<!--  End Modal -->--}}