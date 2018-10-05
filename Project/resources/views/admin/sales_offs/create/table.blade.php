
<div class="tables">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-left th-prot th-stt" >
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="check-all" type="checkbox"
                               onclick="eventCheckBox()">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </th>
            <th class="text-center th-prot th-stt">STT</th>
            <th class="th-prot text-center" id="th-name-type">Tên khuyến mãi</th>
            <th class="th-prot text-center">Phần trăm giảm (%)</th>
            <th class="th-prot text-center">Ngày bắt đầu</th>
            <th class="text-center th-prot">Ngày kết thúc</th>
            <th class="text-center th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesOffs as $stt => $sales)
            <tr>
                <td class="text-left td-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="sales-offs-id[]" value="{{$sales->id}}" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot th-stt">{{$stt+1}}</td>
                <td class="td-prot">
                        {{$sales->name}}
                </td>
                <td class="text-center td-prot">{{$sales->percent}}</td>
                <td class="text-center td-prot">{{$sales->start_date}}</td>
                <td class="text-center td-prot">{{$sales->end_date}}</td>

                <td class="td-actions text-center td-prot">
                    <button type="button" rel="tooltip" title="Sửa" data-placement="bottom" class=" btn btn-sm btn-icon btn-success btn-round"
                            onclick="$('#modal-update-sales-{{$sales->id}}').modal('show')">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="div-pagination">
        {{$salesOffs->links()}}
    </div>

</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('sales-offs-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>