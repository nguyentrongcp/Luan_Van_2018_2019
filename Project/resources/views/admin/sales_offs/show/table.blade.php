
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
            <th class="th-prot text-center" id="th-name-type">Tên thực đơn</th>
            <th class="th-prot text-center">Loại thực đơn</th>
            <th class="th-prot text-center">Ưu đãi (%)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesOffsDetails as $stt => $salesOffsDetail)

            <tr>
                <td class="text-left td-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="sales-offs-details-id[]" value="{{$salesOffsDetail->id}}" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot th-stt">{{$stt+1}}</td>
                <td class="td-prot">
                        {{App\Foody::find($salesOffsDetail->foody_id)->name}}
                </td>
                @php
                    $idtypes = App\Foody::where('id',$salesOffsDetail->foody_id)->get();
                    foreach ($idtypes as $idtype){
                        $nametype = App\FoodyType::find($idtype->foody_type_id)->name;
                    }
                @endphp
                <td class="text-center td-prot">{{$nametype}}</td>
                <td class="text-center td-prot">{{App\SalesOff::find($salesOffsDetail->sales_off_id)->percent}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="div-pagination">
        {{$salesOffsDetails->links()}}
    </div>

</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('sales-offs-details-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>