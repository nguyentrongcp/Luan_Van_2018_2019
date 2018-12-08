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
            <th>Tên nguyên liệu</th>
            <th class="right aligned">Số lượng</th>
            <th class="collapsing">Sửa</th>
            <th class="collapsing">Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($materials as $stt => $material)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="material-ids[]" value="{{$material->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td>
                    {{$material->name}}
                </td>
                @php $unit = \App\CalculationUnit::find($material->calculation_unit_id)->unit @endphp
                <td class="right aligned">
                    {{$material->value .' '.$unit}}
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label a-decoration"
                       onclick="$('{{ "#edit-material-modal-" . $material->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="ui tiny red icon label"
                       onclick="$('{{"#delete-material-modal-" . $material->id}}').modal('show')">
                        <i class="remove icon fitted"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($materials, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $materials->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>