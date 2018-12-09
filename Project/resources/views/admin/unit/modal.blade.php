<div class="ui mini-40 vertical flip modal" id="create-unit-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới đơn vị tính</div>
    <div class="scrolling content">
        <form action="{{ route('unit.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-loai">Tên đơn vị tính</label>
                <input type="text" name="unit-name" required>
            </div>
            <div class="field">
                <label>Ký hiệu</label>
                <input type="text" name="unit-unit" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($units as $unit)
    <div class="ui mini-40 vertical flip modal" id="{{ "edit-unit-modal-" . $unit->id }}">
        <i class="close icon"></i>
        <div class="blue header">Cập nhật đơn vị tính</div>
        <div class="content">
            <form action="{{ route('unit.update', [$unit->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="ten-loai">Tên đơn vị tính</label>
                    <input type="text" name="unit-name" value="{{ $unit->name }}" required>
                </div>
                <div class="field">
                    <label>Ký hiệu</label>
                    <input type="text" name="unit-unit" value="{{ $unit->unit }}" required>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<!--  Modal delete -->
{{--@foreach($materials as $material)--}}
    {{--<div class="ui mini vertical flip modal" id="{{ "delete-material-modal-" . $material->id }}">--}}
        {{--<i class="close icon"></i>--}}
        {{--<div class="blue header">Bạn chắc chắn muốn xóa?</div>--}}
        {{--<div class="content">--}}
            {{--<form action="{{route('material.destroy',[0])}}" class="ui form" method="post">--}}

                {{--{{ method_field('DELETE') }}--}}
                {{--{{ csrf_field() }}--}}

                {{--<div class="field">--}}
                    {{--<label class="">Các dữ liệu liên quan đến <strong> {{$material->name}} </strong>sẽ bị xóa hoàn toàn. Bạn cần suy nghĩ trước khi xóa?</label>--}}

                {{--</div>--}}
                {{--<div class="field">--}}
                    {{--<input type="hidden" value="{{$material->id}}" name="material-ids">--}}
                    {{--<button class="ui blue fluid button"><strong>OK</strong></button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endforeach--}}
<!--  End Modal -->