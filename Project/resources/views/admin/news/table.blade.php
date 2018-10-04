
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
            <th class="th-prot text-center" id="th-name-type">Tiêu đề</th>
            <th class="th-prot text-center" id="th-name-type">Ngày đăng</th>
            <th class="text-center th-prot">Thao tác</th>
        </tr>
        </thead>
        <tbody>
        @foreach($news as $stt => $new)
        <tr>
            <td class="text-left td-prot th-stt">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" name="news-id[]" value="{{$new->id}}" type="checkbox">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </td>
            <td class="text-center td-prot th-stt">{{$stt+1}}</td>
            <td class="text-left td-prot">{{$new->title}}</td>
            <td class="text-center td-prot">{{$new->date}}</td>

            <td class="td-actions text-center td-prot">
                <a rel="tooltip" title="xem chi tiết" data-placement="bottom" class=" btn btn-sm btn-icon btn-info btn-round"
                                 href="{{route('news.show',[$new->id])}}">
                    <i class="fa fa-eye"></i>
                </a>
                <a  rel="tooltip" title="Sửa" data-placement="bottom" class=" btn btn-sm btn-icon btn-success btn-round"
                        href="{{route('news.edit',[$new->id])}}">
                    <i class="now-ui-icons ui-2_settings-90"></i>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="div-pagination">
        {{$news->links()}}
    </div>

</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('news-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>