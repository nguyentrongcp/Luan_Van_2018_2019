
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
            <th class="th-prot text-center" id="th-name-type">Tên loại</th>
            <th class="th-prot text-center">Trạng thái</th>
            <th class="text-right th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productTypes as $stt => $prot)
            <tr>
                <td class="text-left td-prot">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="product-type-id[]" value="{{$prot->id}}" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot">{{$stt + 1}}</td>
                <td class="td-prot" id="th-name-type">
                    <a href="{{route('admin.addType',[$prot->id])}}">{{$prot->name}}</a>
                </td>
                <td class="text-center td-prot">
                    @if($prot->is_deleted == 1)
                        <a class="title text-warning" href="{{route('loai_thuc_don.changeStatus',[$prot->id])}}" onclick="return confirm('Bạn chắc chắn muốn thay đổi?')" >Phục hồi</a>
                    @else
                        <p class="title text-success" href="">Tồn tại</p>
                    @endif

                </td>
                <td class="td-actions text-right td-prot">
                    <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon"
                            onclick="$('#modal-info-prot-{{$prot->id}}').modal('show')">
                        <i class="now-ui-icons travel_info"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"
                            onclick="$('#modal-update-prot-{{$prot->id}}').modal('show')">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                    <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon"
                            onclick="$('#modal-del-prot-{{$prot->id}}').modal('show')">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="div-pagination">
        {{$productTypes->links()}}
    </div>

</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('product-type-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>