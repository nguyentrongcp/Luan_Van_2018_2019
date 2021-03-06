<div class="ui mini-40 vertical flip modal" id="create-material-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới nguyên liệu</div>
    <div class="scrolling content">
        <form action="{{ route('material.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-loai">Tên nguyên liệu</label>
                <input type="text" id="type-name" name="material-name" value="Salad" required>
            </div>
            <div class="field">
                <label for="amount">Số lượng</label>
                <input type="number" step="any" name="value" min="0">
            </div>
            <div class="field">
                <label>Đơn vị tính</label>
                <select class="ui dropdown" name="unit" id="unit">
                    @foreach(\App\CalculationUnit::all() as $unit)
                        <option class="item" value="{{$unit->id}}">
                            {{$unit->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($materials as $material)
    <div class="ui mini-40 vertical flip modal" id="{{ "edit-material-modal-" . $material->id }}">
        <i class="close icon"></i>
        <div class="blue header">Cập nhật nguyên liệu</div>
        <div class="content">
            <form action="{{ route('material.update', [$material->id]) }}" class="ui form" method="post">

                {{ csrf_field() }}

                {{ method_field('PUT') }}

                <div class="field">
                    <label for="">Tên nguyên liệu</label>
                    <input type="text" value="{{ $material->name }}" name="material-name" required>
                </div>
                <div class="field">
                    <label for="amount">Số lượng</label>
                    <input type="number" name="value" placeholder="Số lượng"
                           value="{{$material->value}}">
                </div>
                <div class="field">
                    <label>Đơn vị tính</label>
                    <select class="ui dropdown" name="unit">
                        @php
                            $name_unit = \App\CalculationUnit::find($material->calculation_unit_id)->name;
                        @endphp
                        @foreach(\App\CalculationUnit::all() as $unit)
                            <option class="item" value="{{$unit->id}}" {{$name_unit==$unit->name ? 'selected':''}}>
                                {{$unit->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach

<!--  Modal delete -->
@foreach($materials as $material)
    <div class="ui mini vertical flip modal" id="{{ "delete-material-modal-" . $material->id }}">
        <i class="close icon"></i>
        <div class="blue header">Bạn chắc chắn muốn xóa?</div>
        <div class="content">
            <form action="{{route('material.destroy',[0])}}" class="ui form" method="post">

                {{ method_field('DELETE') }}
                {{ csrf_field() }}

                <div class="field">
                    <label class="">Các dữ liệu liên quan đến <strong> {{$material->name}} </strong>sẽ bị xóa hoàn toàn. Bạn cần suy nghĩ trước khi xóa?</label>

                </div>
                <div class="field">
                    <input type="hidden" value="{{$material->id}}" name="material-ids">
                    <button class="ui blue fluid button"><strong>OK</strong></button>
                </div>
            </form>
        </div>
    </div>
@endforeach
<!--  End Modal -->