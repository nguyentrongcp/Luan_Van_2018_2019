<div class="ui bottom attached tab segment active" data-tab="first">
    {{ csrf_field() }}

    {{ method_field('PUT') }}

    <div class="ui padded stackable grid">

        <div class="ten wide column">

            <div class="inline field">
                <label class="label-fixed">Tên ẩm thực:</label>
                <input type="text" name="foody-name" value="{{ $nameFoody }}" required>
            </div>
            @if($errors->has('foody-name'))
                <div style="color: red; margin-top: 5px; font-size: 13px">
                    {{ $errors->first('foody-name') }}
                </div>
            @endif
            <div class="inline field">
                <label class="label-fixed">Loại ẩm thực:</label>
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
            @if($errors->has('foody-cost'))
                <div style="color: red; margin-top: 5px; font-size: 13px">
                    {{ $errors->first('foody-cost') }}
                </div>
            @endif
        </div>

        <div class="six wide column">

            <div class="field">
                <label>Ảnh đại diện:</label>
                <label for="foody-avatar">
                    <span class="ui blue compact label">Chọn file</span>
                    <span id="foody-avatar-name"></span>
                </label>
                <input type="file" name="foody-avatar" id="foody-avatar" style="display: none;"
                       onchange="$('#foody-avatar-name').text($('#foody-avatar')[0].files[0].name)">
                <img src="{{ asset($foodies->avatar) }}" class="ui small bordered image">
            </div>
        </div>
        @if($errors->has('foody-avatar'))
            <div style="color: red; margin-top: 5px; font-size: 13px">
                {{ $errors->first('foody-avatar') }}
            </div>
        @endif
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