<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="select-all">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing center aligned">STT</th>
            <th>Tên đơn vị tính</th>
            <th class="center aligned">Ký hiệu</th>
            <th class="collapsing">Sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($units as $stt => $unit)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="unit-ids[]" value="{{$unit->id}}">
                    </div>

                </td>
                <td class="center aligned">{{$stt + 1}}</td>
                <td>
                    {{ $unit->name }}
                </td>
                <td class="center aligned">
                    {{ $unit->unit }}
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label a-decoration"
                       onclick="$('{{ "#edit-unit-modal-" . $unit->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($units, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $units->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>