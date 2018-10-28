<script type="text/javascript" src="{{ asset('admin/assets/js/core/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>

{{--Semantic JS--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
<script type="text/javascript" src="{{asset('/customer/semantic/search.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/customer/semantic/checkbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/customer/semantic/tab.min.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('/customer/semantic/modal.min.js')}}"></script>--}}

<script src="{{ asset('admin/assets/plugin/jq-toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugin/fotorama/fotorama.js') }}"></script>
<script src="{{ asset('admin/assets/plugin/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/assets/js/admin-script.js') }}"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
                reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#gallery-avatar-image").change(function() {
        readURL(this);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(
        function () {
            $('.ui.checkbox').checkbox();
            $('.tabular.menu .item').tab();
            $('.ui.dropdown.button').dropdown();
            $('#multi-select').dropdown();
            $('.ui.accordion').accordion();
            $('.ui.dropdown').dropdown();
        });
</script>
<script>
    let prefix = 'fm';
    let options = {
        filebrowserImageBrowseUrl: `/${prefix}?type=Images`,
        filebrowserImageUploadUrl: `/${prefix}/upload?type=Images&_token=`,
        filebrowserBrowseUrl: `/${prefix}?type=Files`,
        filebrowserUploadUrl: `/${prefix}/upload?type=Files&_token=`
    };
    CKEDITOR.config.height = 400;
    CKEDITOR.replace('ckeditor', options);
</script>

