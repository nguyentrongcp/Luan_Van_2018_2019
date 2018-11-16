<div class="ui mini-40 flip modal" id="add-image-slider-modal">
    <div class="blue header">Thêm hình ảnh</div>
    <div class="ui content">
        <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
                <label for="slider-image">
                    <span class="ui blue compact label">Chọn các ảnh</span>
                    <ul class="ui list" id="list-slider-image"></ul>
                </label>
                <input type="file" multiple name="slider-image[]" max="5" id="slider-image" style="display: none;"
                       onchange="updateFileNames()" accept="image/x-png,image/jpeg">
            <div class="ui divider"></div>
            <div class="field">
                <button type="submit" class="ui blue fluid button"><strong>Lưu</strong></button>
            </div>
        </form>
    </div>
</div>

@foreach($sliders as $stt => $slider)
    <div class="ui basic modal" id="{{ "modal-view-" . $slider->id }}">
        <i class="close icon" style="color: #fff !important;"></i>
        <div class="content">
            <img src="{{ asset($slider->image) }}" class="ui centered image">
        </div>
    </div>
@endforeach

@push('script')
    <script>
        function updateFileNames() {
            let files = $('#slider-image')[0].files;
            if (files.length > 5) {
                $.toast({
                    heading: 'Lỗi', icon: 'error', text: 'Chỉ được chọn tối đa 5 file',
                    loader: false, position: 'bottom-right'
                });
                return;
            }

            let html = '';
            $.each(files, (idx, file) => {
                html += `<li>${file.name}</li>`;
            });

            $('#list-slider-image').html(html);
        }
    </script>
@endpush