<div class="ui bottom attached tab segment" data-tab="third">
        <table class="ui table very compact striped celled selectable unstackable">
            <thead>
            <tr>
                <th class="collapsing center aligned">STT</th>
                <th>Thành phần</th>
                <th class="center aligned">Giá trị</th>
            </tr>
            </thead>
            <tbody>
            @foreach($materialFoodys as $stt => $materialFoody)
                <tr>
                    <td>{{$stt + 1}}</td>
                    <td>
                        {{ $materialFoody->material->name }}
                    </td>
                    <td class="center aligned">
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

@push('script')

@endpush