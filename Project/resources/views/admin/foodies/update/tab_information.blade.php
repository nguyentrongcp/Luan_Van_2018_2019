<div class="ui bottom attached tab segment active" data-tab="first">
    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <div class="ui padded stackable grid">

        <div class="ten wide column">

            <div class="inline field">
                <label class="label-fixed">Tên thực đơn:</label>
                <input type="text" name="foody-name" value="{{ $nameFoody }}">
            </div>

            <div class="inline field">
                <label class="label-fixed">Loại thực đơn:</label>
                <select name="foody-type-name" class="ui search dropdown"
                        onchange="warningMessage('Cảnh báo', 'Tất cả các thông số kỹ thuật sẽ bị thay đổi')">
                    @foreach($foodyTypes as $foodyType)
                        <option value="{{ $foodyType->id }}"
                                {{ $foodyType->id == $foodies->foody_type_id ? 'selected': '' }}>
                            {{ $foodyType->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="inline field">
                <label class="label-fixed">Giá:</label>
                <input type="text" name="foody-cost" value="{{ number_format($foodies->currentCost()) }}">
            </div>

            <div class="inline field">
                <label class="label-fixed">Tình trạng:</label>
                <select name="status" class="ui dropdown">
                    <option value="1" {{ $foodies->getStatus() > 0 ? 'selected': '' }}>
                        Đang bán
                    </option>
                    <option value="0"{{ $foodies->getStatus() < 1 ? 'selected': '' }}>
                        Tạm hết
                    </option>
                </select>
            </div>
        </div>

        <div class="six wide column">

            <div class="field">
                <label>Ảnh đại diện:</label>
                <label for="anh-dai-dien">
                    <span class="ui blue compact label">Chọn file</span>
                    <span id="anh-dai-dien-name"></span>
                </label>
                <input type="file" name="anh-dai-dien" id="anh-dai-dien" style="display: none;"
                       onchange="$('#anh-dai-dien-name').text($('#anh-dai-dien')[0].files[0].name)">
                <img src="{{ asset($foodies->avatar) }}" class="ui small bordered image">
            </div>
        </div>

        <div class="row">
            <div class="sixteen wide column">
                <button class="ui blue button" type="submit">
                    <i class="save fitted icon"></i>
                    Lưu lại thay đổi
                </button>
            </div>
        </div>
    </div>
</div>