<div class="ui bottom attached tab segment" data-tab="third">
    <div class="field">
        <button type="submit" class="ui small red delete button need-popup"
                data-content="Xóa các mục vừa chọn"
                onclick="return confirmDelete()" id="btn-delete">
            <i class="delete fitted icon"></i>
            <strong>Xóa </strong>
        </button>
        <button type="button" class="ui small blue button" onclick="$('#create-material-foody-modal').modal('show')">
            <i class="add fitted icon"></i>
            <strong>Thêm mới </strong>
        </button>
    </div>

        <table class="ui table very compact striped celled selectable unstackable">
            <thead>
            <tr>
                <th class="collapsing">
                    <div class="ui checkbox" id="select-all">
                        <input type="checkbox">
                    </div>
                </th>
                <th class="collapsing center aligned">STT</th>
                <th>Thành phần</th>
                <th class="center aligned">Giá trị</th>
                <th>Xóa</th>
            </tr>
            </thead>
            <tbody>
            @foreach($materialFoodys as $stt => $materialFoody)
                <tr>
                    <td>
                        <div class="ui child checkbox">
                            <input type="checkbox" name="material-id[]" value="{{$materialFoody->id}}">
                        </div>

                    </td>
                    <td>{{$stt + 1}}</td>
                    <td>
                        {{ $materialFoody->material->name }}
                    </td>
                    <td class="center aligned">
                        {{ $materialFoody->value .' '.$materialFoody->material->calculationUnit->unit }}
                    </td>
                    <td>
                        <a href="{{route('foodies_material_delete',[$materialFoody->id])}}" class="ui tiny red icon label"
                           >
                            <i class="remove icon fitted"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @if (method_exists($materialFoodys, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $materialFoodys->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>

@push('script')

@endpush