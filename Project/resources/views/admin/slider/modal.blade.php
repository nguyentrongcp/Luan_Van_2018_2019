@push('style')
    <link rel="stylesheet" href="{{ asset('admin/assets/plugin/dropzone/dropzone.min.css') }}">
    <style>
        #formUpload {
            border: 2px dashed #2185d0;
            border-radius: 10px;
        }
    </style>
@endpush

{{--script đặc biệt cần load trước khi form dropzone init--}}
<script src="{{ asset('admin/assets/plugin/dropzone/dropzone.min.js') }}"></script>

<div class="ui vertical flip modal" id="add-image-slider-modal">
    <div class="blue header">Thêm hình ảnh</div>
    <div class="scrolling content">
        <form action="{{ route('sliders.store') }}"
              method="post"
              class="dropzone"
              enctype="multipart/form-data"
              id="formUpload">
            <div class="dz-message" data-dz-message><span>
                    <strong>Chọn file để upload</strong>
                </span></div>
        </form>
    </div>
    <div class="actions">
        <button class="ui cancel blue button"><strong>Đóng</strong></button>
    </div>
</div>
@push('script')
    <script>

        Dropzone.options.formUpload = {
            url: '{{ route('sliders.store') }}',
            sending: function (file, xhr, formData) {
                let filename = file.name;
                formData.append("_token", '{{ csrf_token() }}');
                // formData.append("images",file.name);
                // $.ajax({
                //     type:'POST',
                //     data: {
                //        images: filename,
                //     }
                // })
                // console.log(filename);
                console.log(file);

            },
            success(file, res) {
                $('#dropzone-message')
                    .html("<div class='ui small info message'><strong>Tải lại trang để cập nhật</strong></div>");
                if(file.previewElement)
                    return file.previewElement.classList.add("dz-success");


            }

        }
    </script>
@endpush