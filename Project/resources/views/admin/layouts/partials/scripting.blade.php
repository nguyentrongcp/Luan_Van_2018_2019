<!--   Core JS Files   -->
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script src="{{asset('admin/assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{asset('admin/assets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('admin/assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('admin/assets/js/now-ui-dashboard.min.js?v=1.1.0')}}" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('admin/assets/demo/demo.js')}}"></script>
<!-- JS plugin itoast -->
<script src="{{asset('admin/assets/plugin/jq-toast/jquery.toast.min.js')}}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    CKEDITOR.replace('des');
</script>
<script>
    $(function() {
        var imagesPreview = function(input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#gallery-avatar-image').on('change', function() {
            imagesPreview(this, 'div.gallery-avatar-image');
        });
        $('#gallery-product-image').on('change', function() {
            imagesPreview(this, 'div.gallery-product-image');
        });
    });
</script>

<!-- javascript for init -->
<script>
    $('.date-picker').each(function(){
        $(this).datepicker({
            templates:{
                leftArrow: '<i class="now-ui-icons arrows-1_minimal-left"></i>',
                rightArrow: '<i class="now-ui-icons arrows-1_minimal-right"></i>'
            }
        }).on('show', function() {
            $('.datepicker').addClass('open');

            datepicker_color = $(this).data('datepicker-color');
            if( datepicker_color.length != 0){
                $('.datepicker').addClass('datepicker-'+ datepicker_color +'');
            }
        }).on('hide', function() {
            $('.datepicker').removeClass('open');
        });
    });
</script>
<!-- JS Datatables-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('admin/assets/js/datatables.js')}}"></script>
<script>
    // var tableId = $('table').attr('id');
    //       bindDatatable(tableId);

</script>

<!-- JS dropzone -->
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
{{--<script>--}}
    {{--$(document).ready(function() {--}}
        {{--// Javascript method's body can be found in assets/js/demos.js--}}
        {{--demo.initDashboardPageCharts();--}}

    {{--});--}}
{{--</script>--}}


