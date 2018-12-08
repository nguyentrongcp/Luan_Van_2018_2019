<script type="text/javascript" src="{{ asset('admin/assets/js/core/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>

{{--Semantic JS--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.3/semantic.min.js"></script>
<script type="text/javascript" src="{{asset('/customer/semantic/search.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/customer/semantic/checkbox.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/customer/semantic/tab.min.js')}}"></script>


<script src="{{ asset('admin/assets/plugin/jq-toast/jquery.toast.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugin/fotorama/fotorama.js') }}"></script>
<script src="{{ asset('admin/assets/plugin/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('admin/assets/js/admin-script.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="{{asset('admin/assets/plugin/chartjs/Chart.PieceLabel.min.js')}}"></script>
<script src="{{ asset('/customer/js/numeral.js') }}"></script>
{{--Color--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.7.0/d3.min.js"></script>
<script src="https://d3js.org/d3.v4.min.js"></script>
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
<script>

    function buildChart(id, type, dataSource, name, customColors = null) {
        let ctx = document.getElementById(id).getContext('2d');
        let colors = customColors || ['#36A2EB', '#4BC0C0', '#FFCD56', '#FF9F40', '#FF6384','#f57f17','#1565c0', '#004d40', '#827717'];
        // let colors = customColors || ['#56E289', '#E2CF56', '#E256AE', '#56AEE2', '#E28956','#f57f17','#1565c0', '#004d40', '#827717'];
        let dataVals = [], labels = [], bgColors = [];
        dataSource.forEach(function(datum, idx) {
            bgColors.push(colors[idx]);
            dataVals.push(datum.total);
            labels.push(datum[name]);
        });
        let data = {
            datasets: [{
                data: dataVals,
                backgroundColor: bgColors
            }],
            labels: labels
        };
        new Chart(ctx, {
            type: type,
            data: data,
            options: {
                pieceLabel: {
                    render: 'percentage',
                    frontColor: ['black'],
                    precision: 2
                }
            }
        });
    }
</script>

