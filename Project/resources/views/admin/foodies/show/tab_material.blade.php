<div class="ui bottom attached tab segment" data-tab="third">
    <table class="ui table very compact striped celled selectable unstackable">
        <thead>
        <tr>
            <th class="collapsing">STT</th>
            <th class="collapsing">Thành phần</th>
            <th>Giá trị</th>

        </tr>.
        </thead>
        <tbody>
        @foreach($materialFoodys as $stt => $materialFoody)
            <tr>
                <td>{{$stt + 1}}</td>
                {{--@php $name = \App\Material::find($materialFoody->material_id)->name;--}}
                        {{--$unit = \App\CalculationUnit::find($materialFoody->calculation_unit_id)->name;--}}
                {{--@endphp--}}
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
    @if (method_exists($materialFoodys, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $materialFoodys->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>