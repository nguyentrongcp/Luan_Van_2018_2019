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
            <th class="collapsing">Ảnh đại diện</th>
            <th>Tên ẩm thực</th>
            <th class="collapsing">Loại ẩm thực</th>
            <th class="collapsing">Đơn giá</th>

        </tr>.
        </thead>
        <tbody>
        @foreach($foodies as $stt => $foody)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="foody-ids[]" value="{{$foody->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td class="collapsing">
                    <div class="gallery">
                        <img class="img-tb" src="{{asset($foody->avatar)}}" alt="{{$foody->name}}">
                    </div>
                </td>
                <td>
                    {{$foody->name}}
                </td>
                <td class="collapsing">
                    {{$foody->getNameType()}}
                </td>
                <td class="collapsing">
                    {{number_format($foody->currentCost()).' đ'}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($foodies, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $foodies->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>
@push('script')
    <script>
        bindSelectAll('foody-ids[]');
    </script>
@endpush