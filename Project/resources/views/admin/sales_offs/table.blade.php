
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
            <th class="th-prot text-center">Ngày bắt đầu</th>
            <th class="text-center th-prot">Ngày kết thúc</th>
            <th class="text-center th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
{{--        @foreach($productTypes as $stt => $prot)--}}
            <tr>
                <td class="text-left td-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="sales-offs-id[]" value="" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot th-stt">1</td>
                <td class="text-center td-prot">adada</td>
                <td class="text-center td-prot">adad</td>
                <td class="text-center td-prot">adad</td>

                <td class="td-actions text-center td-prot">
                    <button type="button" rel="tooltip" title="Xem chi tiết" data-placement="bottom" class="btn btn-sm btn-icon btn-info btn-round "
                            onclick="$('#modal-show-Child').modal('show')">
                        <i class="fa fa-eye"></i>
                    </button>
                    <button type="button" rel="tooltip" title="Sửa" data-placement="bottom" class=" btn btn-sm btn-icon btn-success btn-round"
                            onclick="$('#modal-update-sales').modal('show')">
                        <i class="now-ui-icons ui-2_settings-90"></i>
                    </button>
                </td>
            </tr>
        {{--@endforeach--}}
        </tbody>
    </table>
    <div class="div-pagination">
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