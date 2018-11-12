<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable" id="bang-loai-sp">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="select-all">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th>Tên loại thực đơn</th>
            <th class="collapsing">Thực đơn</th>
            <th class="collapsing">Sửa</th>
            <th class="collapsing">Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($foodyTypes as $stt => $foodyType)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="foody-type-id[]" value="{{$foodyType->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td>
                    {{$foodyType->name}}
                </td>
                <td class="center aligned">
                    <a href="{{route('foody_slug_type',[$foodyType->slug])}}" class="ui tiny blue label">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label a-decoration"
                       onclick="$('{{ "#edit-foody-type-modal-" . $foodyType->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="ui tiny red icon label"
                       onclick="$('{{ "#delete-foody-type-modal-" . $foodyType->id }}').modal('show')">
                        <i class="remove icon fitted"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($foodyTypes, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $foodyTypes->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>