<div class="ui bottom attached tab segment active" data-tab="first">
    {{ csrf_field() }}
    <div class="ui padded stackable grid">
        <div class="ten wide column">

            <div class="inline  field">
                <label class="label-fixed">Tên ẩm thực</label>
                <input type="text" name="foody-name" id="foody_name" placeholder="Tên thực đơn"
                value="{{old('foody-name')}}">
            </div>
            @if($errors->has('foody-name'))
                <div style="color: red; margin-top: 5px; font-size: 13px">
                    {{ $errors->first('foody-name') }}
                </div>
            @endif
            <div class="inline required field">
                <label class="label-fixed">Loại ẩm thực</label>
                <select name="foody-type-name" class="ui search dropdown">
                    @foreach($foodyTypes as $foodyType)
                        <option value="{{ $foodyType->id }}">
                            {{ $foodyType->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="inline required field">
                <label class="label-fixed">Giá</label>
                <input type="number" name="foody-cost" value="{{old('foody-cost')}}" id="foody_cost"
                       placeholder="Giá thành">
            </div>
            @if($errors->has('foody-cost'))
                <div style="color: red; margin-top: 5px; font-size: 13px">
                    {{ $errors->first('foody-cost') }}
                </div>
            @endif
            <div class="inline required field">
                <label class="label-fixed">Tình trạng</label>
                <select name="status" class="ui dropdown">
                    <option value="1">
                        Đang bán
                    </option>
                    <option value="0">
                        Tạm hết
                    </option>
                </select>
            </div>

            <div class="ui error message">
            </div>
        </div>

        <div class="six wide column">
            <div class="required field">
                <label>Ảnh đại diện</label>
                <label for="foody-avatar">
                    <span class="ui blue compact label">Chọn một ảnh</span>
                    <span id="foody-avatar-name"></span>
                </label>
                <input type="file" name="foody-avatar" id="foody-avatar" style="display: none;"
                       onchange="$('#foody-avatar-name').text($('#foody-avatar')[0].files[0].name)"
                       accept=".jpg, .png, .jpeg">
            </div>
            @if($errors->has('foody-avatar'))
                <div style="color: red; margin-top: 5px; font-size: 13px">
                    {{ $errors->first('foody-avatar') }}
                </div>
            @endif
            <div class="ui divider">
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <button class="ui blue button" type="submit">
                    <i class="save fitted icon"></i>
                    Lưu lại
                </button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#anh-dai-dien').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview-avatar").change(function() {
            readURL(this);
        });
    </script>
@endpush