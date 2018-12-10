<div class="ui bottom attached tab segment active" data-tab="first">
    {{ csrf_field() }}
    <div class="ui padded stackable grid">
        <div class="ten wide column">

            <div class="inline required field">
                <label class="label-fixed">Tên món ăn</label>
                <input type="text" name="foody-name" id="foody-name" placeholder="Tên món ăn"
                value="Bánh trán trộn">
            </div>
            <span id="foody-name-error" class="error-text"></span>
            <div class="inline required field">
                <label class="label-fixed">Loại món ăn</label>
                <select name="foody-type-name" id="foody-type" class="ui search dropdown">
                    @foreach($foodyTypes as $foodyType)
                        <option value="{{ $foodyType->id }}">
                            {{ $foodyType->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="inline required field">
                <label class="label-fixed">Giá</label>
                <input type="number" name="foody-cost" value="0" id="foody-cost"
                       placeholder="Giá thành">
            </div>
            <span id="foody-cost-error" class="error-text"></span>
        </div>

        <div class="six wide column">
            <div class="required field">
                <label>Ảnh đại diện</label>
                <span id="btn-upload" class="ui blue tiny button">Chọn một ảnh</span>
                <input type="file" name="foody-avatar" id="foody-avatar" style="display: none;"
                       onchange="readURL(this)"
                       accept=".jpg, .png, .jpeg">
            </div>
            <img id="image-preview" class="ui small image" src="">
            <span id="foody-avatar-error" style="color: red; position: relative; font-size: 12px"></span>
            <div class="ui divider">
            </div>
        </div>
        <div class="row">
            <div class="sixteen wide column">
                <a id="submit" class="ui blue button">
                    <i class="save fitted icon"></i>
                    Lưu lại
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .error-text {
        position: relative;
        color: red;
        font-size: 12px;
        top: -15px;
    }
</style>

@push('script')
    <script>
        $('#foody-name-error').css('left', 'calc(' + $('#foody-name').position().left + 'px - 1em)');
        $('#foody-cost-error').css('left', 'calc(' + $('#foody-cost').position().left + 'px - 1em)');
        $('#submit').on('click', function () {
            let empty = false;
            if($('#foody-name').val() === '') {
                $('#foody-name-error').text('Tên ẩm thực không dược bỏ trống!');
                empty = true;
            }
            if($('#foody-cost').val() === '') {
                $('#foody-cost-error').text('Giá ẩm thực không dược bỏ trống!');
                empty = true;
            }
            if($('#foody-avatar').val() === '') {
                $('#foody-avatar-error').text('Bạn cần phải thêm ảnh đại diện cho món ăn!');
                empty = true;
            }
            if (!empty) {
                $.ajax({
                    type: 'post',
                    url: '{{ route('foodies.store') }}',
                    data: {
                        name: $('#foody-name').val(),
                        type: $('#foody-type').val(),
                        cost: $('#foody-cost').val(),
                        avatar: $('#image-preview').attr('src'),
                        description: $('#description').val().replace(/\n/g, '<br>')
                    },
                    success: function (data) {
                        if (data.status === 'error') {
                            $.each(data.errors, function (key, value) {
                                $('#foody-' + key + '-error').text(value);
                            });
                        }
                        if (data.status === 'error-cost') {
                            $('#foody-cost-error').html(data.error);
                        }
                        if (data.status === 'error-name') {
                            $('#foody-name-error').html(data.error);
                        }
                        if (data.status === 'success') {
                            window.location.href = data.href;
                        }
                        if (data.status === 'test') {
                            console.log(data.text);
                        }
                    }
                })
            }
        });
        $('input').on('input', function () {
            $('#' + this.id + '-error').text('');
        });

        $('#btn-upload').on('click', function () {
            $('#foody-avatar').click();
        });
        function readURL(input) {

            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#preview-avatar").change(function() {
            readURL(this);
        });
    </script>
@endpush