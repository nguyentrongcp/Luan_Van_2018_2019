
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
            <th class="th-prot text-center">Mã đơn hàng</th>
            <th class="th-prot text-center">Người đặt hàng</th>
            <th class="th-prot text-center">SĐT</th>
            <th class="th-prot text-center">Ngày đặt hàng</th>
            <th class="text-center th-prot">Số SP</th>
            <th class="text-center th-prot">Tổng tiền</th>
            <th class="text-center th-prot">Tình trạng</th>
            <th class="text-center th-prot">Duyệt</th>
            <th class="text-center th-prot">Hủy</th>


        </tr>
        </thead>
        <tbody>
        {{--@foreach($employees as $stt => $emp)--}}
        <tr>
            <td class="text-left td-prot th-stt">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="employee-id[]" value="" type="checkbox">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </td>
            <td class="text-center td-prot th-stt">1</td>
            <td class="td-prot" id="">
                <a class="a-prot" href="">dSsS</a>
            </td>
            <td class="td-prot" id="">sSada

            </td>
            <td class="td-prot" id="">adadadadad

            </td>
            <td class="td-prot" id="">adadadadad

            </td>
            <td class="td-prot" id="">adadadadad

            </td>
            <td class="td-prot" id="">adadadadad

            </td>
            <td class="td-prot" id="">adadadadad

            </td>
            <td class="text-center td-prot">
                <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon"
                        onclick="$('#modal-edit-employees').modal('show')">
                    <i class="now-ui-icons ui-2_like"></i>
                </button>
            </td>
            <td class="text-right td-prot">
                <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon"
                        onclick="$('#modal-change-pwd').modal('show')">
                    <i class="now-ui-icons files_box"></i>
                </button>
            </td>
        </tr>
        {{--@endforeach--}}
        </tbody>
    </table>
    <div class="div-pagination">
        {{--{{$employees->links()}}--}}
        </div>

    </div>

    <script>
        function eventCheckBox() {
            let checkboxs = document.getElementsByName('employees-id[]');
            let checkAll = document.getElementById('check-all');
            for (let i = 0; i < checkboxs.length; i++) {
                checkboxs[i].checked = checkAll.checked;
            }
        }
    </script>