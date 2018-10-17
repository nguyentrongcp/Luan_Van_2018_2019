<div class="tables">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="text-center th-prot th-stt">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" id="check-all" type="checkbox"
                               onclick="eventCheckBox()">
                        <span class="form-check-sign"></span>
                    </label>
                </div>
            </th>
            <th class="text-center th-prot th-stt">STT</th>
            <th class="text-center th-prot">Ảnh đại diện</th>
            <th class="th-prot text-center">Tên thực đơn</th>
            <th class="th-prot text-center">Thuộc loại</th>
            <th class="th-prot text-center">Giá</th>
            <th class="th-prot text-center">Trạng thái</th>
            <th class="text-center th-prot">Xem</th>
        </tr>
        </thead>
        <tbody>
        @foreach($foodies as $stt => $fd)
            <tr>
                <td class="text-center th-prot th-stt">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" name="foody-id[]" value="{{$fd->id}}" type="checkbox">
                            <span class="form-check-sign"></span>
                        </label>
                    </div>
                </td>
                <td class="text-center td-prot th-stt">{{$stt + 1}}</td>
                <td class="text-center td-prot">
                    <img class="img-tb" src="{{asset($fd->avatar)}}" alt="{{$fd->name}}">
                </td>
                <td class="td-prot" id="th-name-type">{{$fd->name}}</td>

                @foreach(App\FoodyType::where('id',$fd->foody_type_id)->get() as $nameType)
                    <td class="td-prot text-center">{{$nameType->name}}</td>
                @endforeach

                <td class="td-prot text-center">{{number_format($fd->currentCost()).' đ'}}</td>
                @foreach(App\FoodyStatus::where('foody_id',$fd->id)->get() as $foodyStatus)
                    @if($foodyStatus->status == 0)
                        <td class="td-prot text-center text-danger title"><i class="fa fa-close"></i>Tạm hết</td>
                    @else
                        <td class="td-prot text-center text-success title"><i class="fa fa-check"></i>Đang bán</td>
                    @endif
                @endforeach
                <td class="text-center td-prot">
                    <a rel="tooltip" title="Xem chi tiết" data-placement="bottom"
                       class="btn btn-info btn-sm btn-round btn-icon text-white"
                       href="{{route('foodies.show',[$fd->id])}}">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="div-pagination">
        {{$foodies->links()}}
    </div>
</div>

<script>
    function eventCheckBox() {
        let checkboxs = document.getElementsByName('foody-id[]');
        let checkAll = document.getElementById('check-all');
        for (let i = 0; i < checkboxs.length; i++) {
            checkboxs[i].checked = checkAll.checked;
        }
    }
</script>