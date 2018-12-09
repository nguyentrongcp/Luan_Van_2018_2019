<div class="ui small input right aligned icon">
    <input type="text" class="need-remove" name="key-search" id="search_order" placeholder="Tìm kiếm"
           value="">
    <i class="search icon"></i>
</div>
<div class="ui list results " id="search-result">



</div>

@push('script')
    <script>

        $('.ui.input').on('input', function () {
            var key_search = $('#search_order').val();
            if (key_search == '') {
                $('#search-result').removeClass('results');
                $('#search-result').empty();
            }
            else {
                $.ajax({
                    url: 'order_search',
                    type: 'get',
                    data: {
                        key: key_search
                    },
                    success: function (data) {
                        $('#search-result').addClass('results');
                        $('.results').html(data);
                    }
                })
            }

        });

    </script>
@endpush
<style>

    .results {
        position: absolute;
        z-index: 1000;
        display: block;
        /*top: 236px;*/
        max-height: 500px !important;
        margin-bottom: 0 !important;
        background-color: white;
        overflow: scroll;
    }

    .result-content {
        padding-top: 15px !important;
    }

    .result-img {
        width: 40px;
    }
</style>