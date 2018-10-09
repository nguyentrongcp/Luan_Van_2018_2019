
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
            <th class="th-prot text-center">Số lượt bình luận</th>
            <th class="text-center th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $stt => $comment)
            <tr>
                <td class="text-left td-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="cmt-id[]" value="" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot th-stt">{{$stt + 1}}</td>
                @php
                    $idFoodys = App\Foody::where('id',$comment->foody_id)->get();
                    foreach ($idFoodys as $idFoody){
                        $nameFoody = $idFoody->name;
                    }
                @endphp
                <td class="td-prot" id="th-name-type">
                    {{$nameFoody}}
                </td>
                <td class="td-prot text-center" id="th-name-type">
                    {{App\Comment::where('foody_id',$comment->foody_id)->count()}}
                </td>
                <td class="td-actions text-center td-prot">
                    <a rel="tooltip" data-placement="bottom" title="Xem chi tiết" class="btn btn-info btn-sm btn-round btn-icon"
                       href="{{route('comments.show',[$comment->foody_id])}}">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="div-pagination">
        {{$comments->links()}}
    </div>

</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('cmt-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>