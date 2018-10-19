<div class="ui bottom attached tab segment active" data-tab="first">
    {{ csrf_field() }}
    <div class="ui padded stackable grid">
        <div class="ten wide column">

            <div class="inline required field">
                <label class="label-fixed">Tên thực đơn</label>
                <input type="text" name="foody-name" id="foody-name" placeholder="Tên thực đơn">
            </div>

            <div class="inline required field">
                <label class="label-fixed">Loại thực đơn</label>
                <select name="loai-san-pham" class="ui search dropdown">
                    @foreach($foodyTypes as $foodyType)
                        <option value="{{ $foodyType->id }}">
                            {{ $foodyType->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="inline required field">
                <label class="label-fixed">Giá</label>
                <input type="text" name="foody-cost" value="0" id="foody-cost" placeholder="Giá thành">
            </div>

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
                    <label for="avatar">
                        <span class="ui blue compact label">Chọn một ảnh</span>
                        <span id="foody-avatar-name"></span>
                    </label>
                    <input type="file" name="foody-avatar" id="foody-avatar"
                           accept="image/x-png,image/jpeg">
            </div>

            <div class="ui divider">
                <img id="preview-avatar" src="#" alt="your image" />
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
    {{--<script>--}}
        {{--function readURL(input) {--}}

            {{--if (input.files && input.files[0]) {--}}
                {{--var reader = new FileReader();--}}

                {{--reader.onloa.d = function(e) {--}}
                    {{--$('#preview-avatar').attr('src', e.target.result);--}}
                {{--}--}}

                {{--reader.readAsDataURL(input.files[0]);--}}
            {{--}--}}
        {{--}--}}

        {{--$("#foody-avatar").change(function() {--}}
            {{--readURL(this);--}}
        {{--});--}}
    {{--</script>--}}
    <script>

        $('#form-them-san-pham').form({
            fields: {
                ma_sp: {
                    rules: [{type: 'empty', prompt: 'Mã sản phẩm không được bỏ trống'}]
                },
                ten_sp: {
                    rules: [{type: 'empty', prompt: 'Tên sản phẩm không được bỏ trống '}]
                },
                gia: {
                    identifier: 'gia',
                    rules: [
                        {type: 'empty', prompt: 'Giá không được bỏ trống'},
                        {type: 'regExp[/^[,.\s0-9]+$/igm]', prompt: 'Giá sai định dạng'}
                    ]
                },
                "anh-dai-dien": {
                    rules: [{type: 'empty', prompt: 'Hãy chọn ảnh đại diện'}]
                }
            },
            // inline:true
        })
    </script>
@endpush