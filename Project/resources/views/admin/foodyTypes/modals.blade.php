<div class="ui mini vertical flip modal" id="create-foody-type-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới loại thực đơn</div>
    <div class="content">
        <form action="{{ route('foody_type.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-loai">Tên loại thực đơn</label>
                <input type="text" id="type-name" name="type-name" required>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($foodyTypes as $foodyType)
    <div class="ui mini vertical flip modal" id="{{ "edit-foody-type-modal-" . $foodyType->id }}">
        <i class="close icon"></i>
        <div class="blue header">Sửa tên loại thực đơn</div>
        <div class="content">
            <form action="{{ route('foody_type.update', [$foodyType->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="">Tên loại thực đơn</label>
                    <input type="text" value="{{ $foodyType->name }}" name="type-name" required>
                </div>

                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<!--  Modal delete -->
@foreach($foodyTypes as $foodyType)
    <div class="ui mini vertical flip modal" id="{{ "delete-foody-type-modal-" . $foodyType->id }}">
        <i class="close icon"></i>
        <div class="blue header">Bạn chắc chắn muốn xóa?</div>
        <div class="content">
            <form action="{{route('foody_type.destroy',[0])}}" class="ui form" method="post">

                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <div class="field">
                    <label class="">Các dữ liệu liên quan đến <strong> {{$foodyType->name}} </strong>sẽ bị xóa hoàn toàn. Bạn cần suy nghĩ trước khi xóa?</label>

                </div>
                <div class="field">
                    <input type="hidden" value="{{$foodyType->id}}" name="foody-type-id">
                    <button class="ui blue fluid button"><strong>OK</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
<!--  End Modal -->