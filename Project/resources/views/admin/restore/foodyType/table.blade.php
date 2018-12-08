<div class="ui basic segment no-padding no-margin table-responsive">
    <table class="ui table very compact striped celled selectable unstackable" id="bang-loai-sp">
        <thead>
        <tr>
            <th class="collapsing">
                <div class="ui checkbox" id="select-all">
                    <input type="checkbox">
                </div>
            </th>
            <th class="collapsing">STT</th>
            <th>Tên loại ẩm thực</th>
        </tr>
        </thead>
        <tbody>
        @foreach($foodyTypes as $stt => $foodyType)
            <tr>
                <td>
                    <div class="ui child checkbox">
                        <input type="checkbox" name="foody-type-ids[]" value="{{$foodyType->id}}">
                    </div>

                </td>
                <td>{{$stt + 1}}</td>
                <td>
                    {{$foodyType->name}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @if (method_exists($foodyTypes, 'render'))
        <div class="ui basic segment center aligned no-padding">
            {{ $foodyTypes->render('admin.layouts.components.pagination.smui')}}
        </div>
    @endif
</div>