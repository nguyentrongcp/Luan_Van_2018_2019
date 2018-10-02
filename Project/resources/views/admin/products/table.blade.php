<div class="tables">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center th-prot th-stt" >
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="check-all" type="checkbox"
                               onclick="eventCheckBox()">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </th>
            <th class="text-center th-prot th-stt">STT</th>
            <th class="text-center th-prot">Ảnh đại diện</th>
            <th class="th-prot text-center">Tên thực đơn</th>
            <th class="th-prot text-center">Thuộc loại</th>
            <th class="th-prot text-center">Giá</th>
            <th class="text-center th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $stt => $pro)
            <tr>
                <td class="text-center th-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="product-id[]" value="{{$pro->id}}" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot th-stt">{{$stt + 1}}</td>
                <td class="text-center td-prot">
                    <img class="img-tb" src="{{asset($pro->avatar)}}" alt="{{$pro->name}}">
                </td>
                <td class="td-prot" id="th-name-type">{{$pro->name}}</td>

                @foreach(App\ProductType::where('id',$pro->product_type_id)->get() as $nameType)
                <td class="td-prot text-center">{{$nameType->name}}</td>
                @endforeach
                {{--@foreach(App\Cost::where('product_id',$pro->id)->get() as $cost)--}}

                    <td class="td-prot text-center">{{number_format($pro->currentCost()).' đ'}}</td>
                {{--@endforeach--}}

                <td class="text-center td-prot">
                    <a rel="tooltip" title="Xem chi tiết" data-placement="bottom" class="btn btn-info btn-sm btn-round btn-icon text-white"
                            href="{{route('products.show',[$pro->id])}}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <button type="button" rel="tooltip" title="Sửa" data-placement="bottom" class="btn btn-success btn-sm btn-round btn-icon"
                            onclick="$('#modal-update-pro-{{$pro->id}}').modal('show')">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                    <button type="button" rel="tooltip" title="Xóa" data-placement="bottom" class="btn btn-danger btn-sm btn-round btn-icon"
                            onclick="$('#modal-del-pro-{{$pro->id}}').modal('show')">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{$products->links()}}
    </div>
</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('product-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>