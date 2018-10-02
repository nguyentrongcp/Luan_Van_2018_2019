<!-- Modal edit products type-->
    <div class="modal fade" id="modal-change-cost" tabindex="-1" role="dialog"
         aria-labelledby="list-edit-prot" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title title text-black-50"
                        style="font-size: 16px">CẬP NHẬT GIÁ THỰC ĐƠN</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product_change_cost',[$id])}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="bmd-label-floating">Giá thay đổi</label>
                            <input type="text" class="form-control" name="cost-pro" id="cost-pro"
                                   value="{{old('cost')}}" minlength="5" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Lịch sử giá thực đơn</label>
                            <select name="product-cost-history" class="form-control" style="border-radius: 30px">
                                @foreach(App\Cost::where('product_id',$id)->get() as $costs)
                                    <option name="product-cost-history">
                                        {{$costs->cost . 'đ - ('.$costs->cost_updated_at.')'}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <span style="margin-top: 10px">
                            <strong>Lưu ý:</strong>
                            Giá tiền <strong>không vượt quá</strong> 100,000,000<sup>đ</sup> hoặc
                                <strong>nhỏ hơn</strong> 1,000<sup>đ</sup>.
                        </span>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">ĐÓNG</button>
                            <span></span>
                            <button type="submit" class="btn btn-info btn-round">LƯU LẠI
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--  End Modal -->