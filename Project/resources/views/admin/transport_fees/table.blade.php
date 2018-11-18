<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="select-all">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th>Quận/Huyện</th>
            <th class="collapsing">Xem</th>
            <th class="collapsing">Sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($districts as $stt => $district)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="transport-fees-id[]" value="{{$district->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td>
                    {{$district->district}}
                </td>
                <td class="center aligned">
                    <a href="{{route('transport_fees.show',[$district->id])}}" class="ui tiny blue label">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label a-decoration"
                       onclick="$('{{ "#update-district-modal-". $district->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($districts, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $districts->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>
@push('script')
    <script>
        // bindSelectAll('sales-offs-id[]');
    </script>
@endpush