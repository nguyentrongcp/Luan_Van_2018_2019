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
            <th>Phường/Xã</th>
            <th>Phí (vnđ) </th>
            <th class="collapsing">Sửa</th>
            <th class="collapsing">Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transportFees as $stt => $transportFee)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="transport-fees-id[]" value="{{$transportFee->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td>
                    {{$transportFee->ward}}
                </td>
                <td>
                    {{number_format($transportFee->cost). 'đ'}}
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label a-decoration"
                       onclick="$('{{ "#update-transport-fees-modal-". $transportFee->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
                <td class="center aligned">
                    <a href="{{route('transport_fees.destroy',[$transportFee->id])}}" class="ui tiny red label">
                        <i class="remove icon fitted"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($transportFees, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $transportFees->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>
@push('script')
    <script>
        // bindSelectAll('sales-offs-id[]');
    </script>
@endpush