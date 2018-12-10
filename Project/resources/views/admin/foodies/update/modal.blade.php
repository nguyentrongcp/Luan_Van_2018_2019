<!-- Modal create goods receipt note detail-->
<div class="ui mini-40 vertical modal" id="create-material-foody-modal">
    <div class="blue header">Thêm nguyên liệu cho món ănc</div>
    <div class="content">
        <form action="{{ route('foodies_material')}}" class="ui form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="material-foody-id" value="{{$id}}">
            <div class="field">
                <label>Tên nguyên liệu</label>
                <select class="ui dropdown" name="material">
                    @foreach(\App\Material::all() as $material)
                        <option value="{{$material->id}}">
                            {{$material->name.' ('.$material->calculationUnit->unit.')'}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label>Số lượng</label>
                <input type="number" step="any" name="value" id="value" placeholder="Số lượng" min="0">
            </div>
            <div class="field">
                <button class="ui fluid blue button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>
