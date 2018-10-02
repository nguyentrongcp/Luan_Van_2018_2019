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
            <th class="text-center th-prot">Người nhập hàng</th>
            <th class="th-prot text-center">Ngày nhập</th>
            <th class="th-prot text-center">Số sản phẩm</th>
            <th class="th-prot text-center">Tình trạng</th>
            <th class="text-center th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
{{--        @foreach($products as $stt => $pro)--}}
            <tr>
                <td class="text-left th-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="goods-id[]" value="" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot">1</td>
                <td class="text-center td-prot">2</td>
                <td class="text-center td-prot">3</td>
                <td class="text-center td-prot">4</td>
                <td class="text-center td-prot">
                    <label class="title text-success">
                        <i class="fa fa-calendar-check-o"></i> Đã cập nhật vào kho</label>
                </td>

                <td class="td-actions text-center td-prot">
                    <a rel="tooltip" title="Xem chi tiết phiếu nhập" data-placement="bottom" class="btn btn-info btn-sm btn-round btn-icon text-white"
                       href="{{route('goods_receipt_detail.index')}}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <button type="button" rel="tooltip" title="Sửa" data-placement="bottom" class="btn btn-success btn-sm btn-round btn-icon"
                            onclick="$('#modal-update-goods').modal('show')">
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
        let checkboxs = document.getElementsByName('goods-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>