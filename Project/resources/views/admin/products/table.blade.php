<div class="tables">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-left th-prot" >
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="check-all" type="checkbox"
                               onclick="eventCheckBox()">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </th>
            <th class="text-center th-prot">STT</th>
            <th class="text-center th-prot">Ảnh đại diện</th>
            <th class="th-prot text-center">Tên thực đơn</th>
            <th class="th-prot text-center">Thuộc loại</th>
            <th class="th-prot text-center">Giá</th>
            <th class="text-right th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $stt => $pro)
            <tr>
                <td class="text-left th-prot">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="product-id[]" value="{{$pro->id}}" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot">{{$stt + 1}}</td>
                <td class="text-center td-prot">
                    <img class="img-tb" src="{{asset($pro->avatar)}}" alt="{{$pro->name}}">
                </td>
                <td class="td-prot" id="th-name-type">{{$pro->name}}</td>

                @foreach(App\FoodyType::where('id',$pro->product_type_id)->get() as $nameType)
                <td class="td-prot text-center">{{$nameType->name}}</td>
                @endforeach
                @foreach(App\Cost::where('product_id',$pro->id)->get() as $cost)
                    <td class="td-prot text-center">{{number_format($cost->cost).' đ'}}</td>
                @endforeach

                <td class="td-actions text-right td-prot">
                    <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon"
                            onclick="$('#modal-info-pro-{{$pro->id}}').modal('show')">
                        <i class="now-ui-icons travel_info"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"
                            onclick="$('#modal-update-pro-{{$pro->id}}').modal('show')">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon"
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