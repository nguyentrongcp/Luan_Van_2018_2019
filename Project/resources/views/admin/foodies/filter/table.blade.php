<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="check-all">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th class="collapsing">Ảnh đại diện</th>
            <th>Tên thực đơn</th>
            <th class="collapsing">Loại thực đơn</th>
            <th class="collapsing">Đơn giá</th>
            <th class="collapsing">Tình trạng</th>
            <th class="collapsing">Xem</th>
        </tr>.
        </thead>
        <tbody>
        @foreach($foodies as $stt => $foody)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="foody-id[]" value="{{$foody->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td class="collapsing">
                    <div class="gallery">
                        <img class="img-tb" src="{{$foody->avatar}}" alt="{{$foody->name}}">
                    </div>
                </td>
                <td>
                    {{$foody->name}}
                </td>
                <td class="collapsing">
                    {{$foody->getNameType()}}
                </td>
                <td class="collapsing">
                    {{number_format($foody->currentCost()).' đ'}}
                </td>
                <td class="collapsing">
                    @if($foody->getStatus()== 0)
                        <label class="ui red label" for="">Tạm hết</label>
                    @else
                        <label class="ui green label" for="">Đang bán</label>
                    @endif
                </td>
                <td class="center aligned">
                    <a href="{{route('filter',[$foody->id])}}" class="ui tiny blue icon label">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($foodies, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $foodies->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>