<div class="ui mini-40 vertical flip modal" id="create-material-foody-modal">
    <i class="close icon"></i>
    <div class="blue header">Thêm mới nguyên liệu</div>
    <div class="content">
        <form action="{{ route('material.store') }}" class="ui form" method="post">

            {{ csrf_field() }}

            <div class="field">
                <label for="ten-loai">Tên nguyên liệu</label>
                <input type="text" id="type-name" name="material-name" required>
            </div>
            <div class="field">
                <label for="amount">Số lượng</label>
                <div class="ui right labeled input">
                    <input type="text" name="value"  placeholder="Số lượng" value="0">
                    <select class="ui dropdown label" name="unit" id="unit">
                        <option value="">Chọn đơn vị tính</option>
                        @foreach(\App\CalculationUnit::all() as $unit)
                            <option class="item" value="{{$unit->id}}">
                                {{$unit->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>