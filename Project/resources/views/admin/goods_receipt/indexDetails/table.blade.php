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
            <th class="text-center th-prot">Tên nguyên liệu</th>
            <th class="th-prot text-center">Số lượng</th>
            <th class="th-prot text-center">Đơn giá</th>
            <th class="th-prot text-center">Tổng tiền</th>
            <th class="th-prot text-center">Số lượng tồn</th>
            <th class="text-center th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        {{--        @foreach($products as $stt => $pro)--}}
        <tr>
            <td class="text-left th-prot th-stt">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="goods-detail-id[]" value="" type="checkbox">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </td>
            <td class="text-center td-prot th-stt">1</td>
            <td class="text-center td-prot ">2</td>
            <td class="text-center td-prot ">3</td>
            <td class="text-center td-prot ">4</td>
            <td class="text-center td-prot ">5</td>
            <td class="text-center td-prot ">5</td>
            <td class="text-center td-prot">
                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"
                        onclick="">
                    <i class="now-ui-icons ui-2_settings-90"></i>
                </button>
            </td>
        </tr>
        {{--@endforeach--}}
        </tbody>
    </table>
    <div class="pagination">
    </div>
</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('goods-detail-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>