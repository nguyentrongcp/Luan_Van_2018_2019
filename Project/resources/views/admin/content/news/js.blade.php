@push('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

    <script type="text/javascript" src="{{ asset('/froala/js/froala_editor.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/draggable.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/emoticons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/entities.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/font_size.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/font_family.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/image.min.js') }}"></script>
    {{--<script type="text/javascript" src="{{ asset('/froala/js/plugins/image_manager.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/line_breaker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/inline_style.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/link.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/save.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/froala/js/plugins/url.min.js') }}"></script>

    <script>
        // $(function(){
        //     $('#edit')
        //         .on('froalaEditor.initialized', function (e, editor) {
        //             $('#edit').parents('form').on('submit', function () {
        //                 console.log($('#edit').val());
        //                 return false;
        //             })
        //         })
        //         .froalaEditor({enter: $.FroalaEditor.ENTER_P, placeholderText: null})
        // });

        $('#news-submit').on('click', function () {
            if ($('#news-title').val() === '') {
                // title trống
            }
            else if ($('#news-content').val() === '') {
                // content trống
            }
            else {
                $.ajax({
                    type: 'post',
                    url: '{{ route('news.store') }}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        title: $('#news-title').val(),
                        content: $('#news-content').val(),
                    },
                    success: function (data) {
                        if (data.status === 'success') {
                            window.location.href = '{{ route('news.index') }}';
                        }
                    }
                });
            }
        });

        let image = null;

        $(function() {
            $('#news-content')
                .froalaEditor({
                    // Set max image size to 5MB.
                    imageMaxSize: 5 * 1024 * 1024,

                    // Allow to upload PNG and JPG.
                    imageAllowedTypes: ['jpeg', 'jpg', 'png']
                })
                .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
                    image = images[0];
                })
                .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
                    getBase64(image, $img[0]);
                })
                // .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
                //     console.log('fdsfs');
                // })
                .on('froalaEditor.image.error', function (e, editor, error, response) {
                    // Bad link.
                    if (error.code === 1) { console.log('1') }

                    // No link in upload response.
                    else if (error.code === 2) { console.log('2') }

                    // Error during image upload.
                    else if (error.code === 3) { console.log('3') }

                    // Parsing response failed.
                    else if (error.code === 4) { console.log('4') }

                    // Image too text-large.
                    else if (error.code === 5) { console.log('5') }

                    // Invalid image type.
                    else if (error.code === 6) { console.log('6') }

                    // Image can be uploaded only to same domain in IE 8 and IE 9.
                    else if (error.code === 7) { console.log('7') }

                    // Response contains the original server response to the request if available.
                });
        });

        function getBase64(file, image) {
            let reader = new FileReader();
            $(reader).on('load', function (e) {
                $(image).attr('src', e.target.result);
            });
            reader.readAsDataURL(file);
        }
    </script>
@endpush