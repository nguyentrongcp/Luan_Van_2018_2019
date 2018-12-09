<div class="ui bottom attached tab segment" data-tab="third">
    <div class="field">
        <button class="ui small red delete button need-popup"
                data-content="Xóa các mục vừa chọn"
                onclick="return confirmDelete()">
            <i class="delete fitted icon"></i>
            <strong>Xóa </strong>
        </button>
        <button type="button" class="ui small blue button" onclick="$('#create-material-foody-modal').modal('show')">
            <i class="add fitted icon"></i>
            <strong>Thêm mới </strong>
        </button>
    </div>
    <form action="">
        <table class="ui table very compact striped celled selectable unstackable">
            <thead>
            <tr>
                <th class="collapsing">
                    <div class="ui checkbox" id="select-all">
                        <input type="checkbox">
                    </div>
                </th>
                <th class="collapsing">STT</th>
                <th class="collapsing">Thành phần</th>
                <th>Giá trị</th>

            </tr>.
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
                    <td class="collapsing">
                        {{ $materialFoody->value .' '.$materialFoody->material->calculationUnit->unit }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>

    @if (method_exists($materialFoodys, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $materialFoodys->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>
@include('admin.foodies.update.modal')