<!-- Modal create goods receipt note detail-->
<div class="ui mini-40 modal" id="create-material-foody-modal">
    <div class="blue header">Thêm nguyên liệu cho món ăn</div>
    <div class="scrolling content">
        <form action="{{ route('foodies_material')}}" class="ui form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="material-foody-id" value="{{$id}}">
            <div class="field">
                <label for="material-name">Tên nguyên liệu</label>
                <select class="ui dropdown material-name" name="material" id="material">
                    @foreach(\App\Material::all() as $material)
                        <option class="item" value="{{$material->id}}">
                            {{$material->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="amount">Số lượng</label>
                <div class="ui right labeled input">
                    <input type="number" step="any" name="value" id="value" placeholder="Số lượng" min="0">
                </div>
            </div>
            <div class="field">
                <button class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>
