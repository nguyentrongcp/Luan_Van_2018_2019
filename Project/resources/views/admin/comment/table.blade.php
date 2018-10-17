<div class="tables">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-left th-prot th-stt">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="check-all" type="checkbox"
                               onclick="eventCheckBox()">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </th>
            <th class="text-center th-prot th-stt">STT</th>
            <th class="th-prot ">Tiêu đề</th>
            <th class="th-prot text-center" id="th-name-type">Tên thực đơn</th>
            <th class=" th-prot text-center">Tình trạng</th>
            <th class="td-actions th-prot text-center">Xem bình luận</th>
            <th class="th-stt text-center th-prot">Duyệt</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $stt => $comment)
            <tr>
                <td class="text-left td-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="comment-id[]" value="{{$comment->id}}" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot th-stt">{{$stt + 1}}</td>
                <td class="td-prot">{{$comment->title}}</td>
                @php
                    $idFoodys = App\Foody::where('id',$comment->foody_id)->get();
                    foreach ($idFoodys as $idFoody){
                        $nameFoody = $idFoody->name;
                    }
                @endphp
                <td class="td-prot" id="th-name-type">
                    {{$nameFoody}}
                </td>
                <td class="td-prot text-center">
                    @if($comment->is_approved == false)
                        <span><i class="fa fa-spinner text-warning title lb-info">Chưa duyệt</i></span>
                    @else
                        <i class="fa fa-check-square-o text-success title lb-info">Đã duyệt</i>
                    @endif
                </td>
                <td class="td-actions text-center td-prot">
                    <a rel="tooltip" data-placement="bottom" title="Xem chi tiết"
                       class="btn btn-info btn-sm btn-round btn-icon"
                       href="{{route('comments.show',[$comment->foody_id])}}">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                <form action="{{route('admin.approved',[$comment->id])}}" method="post">
                    {{ csrf_field() }}
                    <td class="th-stt text-center td-prot">
                        <button type="submit" rel="tooltip" data-placement="bottom" title="Duyệt"
                                class="btn btn-success btn-sm btn-round btn-icon {{$comment->is_approved == true ?'disabled':''}}"
                                onclick="return confirm('Bạn chắc chắn muốn duyệt bài đăng này chứ?')">
                            <i class="fa fa-check-circle"></i>
                            </button>
                    </td>
                </form>

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
        let checkboxs = document.getElementsByName('comment-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>