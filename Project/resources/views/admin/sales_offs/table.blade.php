<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="select-all">
                    <input type="checkbox" >
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th>Tên khuyến mãi</th>
            <th class="text-center">Số ẩm thực</th>
            <th class="text-center">Ngày bắt đầu</th>
            <th class="text-center">Ngày kết thúc</th>
            <th class="collapsing">Xem</th>
            <th class="collapsing">Sửa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($salesOffs as $stt => $salesOff)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="sales-offs-id[]" value="{{$salesOff->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td>
                    <a class="a-decoration" href="{{route('admin.createSales',[$salesOff->id])}}">
                        {{$salesOff->name}}</a>
                </td>
                <td class="text-center">{{App\SalesOffDetail::where('sales_off_id',$salesOff->id)->count()}}</td>
                <td class="text-center">{{$salesOff->start_date}}</td>
                <td class="text-center">{{$salesOff->end_date}}</td>
                <td class="center aligned">
                    <a href="{{route('sales_offs.show',[$salesOff->id])}}" class="ui tiny blue label">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
                <td class="center aligned">
                    <a href="#" class="ui tiny green icon label a-decoration"
                       onclick="$('{{ "#update-sales-offs-modal-" . $salesOff->id }}').modal('show')">
                        <i class="pencil fitted icon"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($salesOffs, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $salesOffs->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>
@push('script')
    <script>
            bindSelectAll('sales-offs-id[]');
    </script>
@endpush