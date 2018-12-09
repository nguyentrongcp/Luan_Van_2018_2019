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
            <th>Tên ẩm thực</th>
            <th>Loại ẩm thực</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesOffsDetails as $stt => $salesOffsDetail)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="sales-offs-details-id[]" value="{{$salesOffsDetail->id}}">
                    </div>

                </td>
                <td class="center aligned">{{$stt + 1}}</td>
                <td>
                    <a class="a-decoration" href="{{route('foodies.show',[$salesOffsDetail->foody_id])}}">
                        {{App\Foody::find($salesOffsDetail->foody_id)->name}}</a>
                </td>
                @php
                    $idtypes = App\Foody::where('id',$salesOffsDetail->foody_id)->get();
                    foreach ($idtypes as $idtype){
                        $nametype = App\FoodyType::find($idtype->foody_type_id)->name;
                    }
                @endphp
                <td>{{$nametype}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($salesOffsDetails, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $salesOffsDetails->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>
@push('script')
    <script>
        bindSelectAll('sales-offs-details-id[]');
    </script>
@endpush