<table class="ui table very compact striped celled selectable" id="form-goods-receipt-notes">
    <thead>
    <tr>
        <th class="collapsing">
            <div class="ui checkbox" id="select-all">
                <input type="checkbox" class="hidden">
            </div>
        </th>
        <th class="collapsing">STT</th>
        <th>Tên nguyên liệu</th>
        <th class="right-aligned">Số lượng</th>
        {{--<th class="center aligned">Xóa</th>--}}
    </tr>
    </thead>
    <tbody>
    @foreach($materials as $stt => $material)
        <tr>
            <td class="collapsing">
                <div class="ui child checkbox">
                    <input type="checkbox" class="hidden" name="material-ids[]" value="{{ $material->id }}">
                </div>
            </td>

            <td>{{ $stt + 1 }}</td>
            <td>{{ $material->name }}</td>
            @php
                $unit = \App\CalculationUnit::find($material->calculation_unit_id)->unit;
            @endphp
            <td class="text-center">{{ $material->value .' '. $unit }}</td>
            {{--<td class="center aligned">--}}
                {{--<form action="{{route('material_restore.destroy',[$material->id])}}" method="post">--}}
                    {{--{{ method_field('DELETE') }}--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<a  href="{{route('material_restore.destroy',[$material->id])}}" onclick="return confirm('Xác nhận xóa?')" class="ui tiny red icon label">--}}
                        {{--<i class="remove icon fitted"></i>--}}
                    {{--</a>--}}
                {{--</form>--}}

            {{--</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>

@if (method_exists($materials, 'render'))
    <div class="ui basic segment center aligned no-padding">
        {{ $materials->render('admin.layouts.components.pagination.smui')}}
    </div>
@endif

@push('script')
    <script>
        bindSelectAll('material-ids[]');
    </script>
@endpush