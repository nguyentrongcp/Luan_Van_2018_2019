<div class="ui small input right icon">
    {{--@if (!empty())--}}
        {{--<i class="remove-input remove red icon pointer"--}}
           {{--onclick="{{ route('foodies.index') }}"></i>--}}
    {{--@endif--}}
    <input type="text" class="need-remove" name="key-search" id="search_foody" placeholder="Tìm kiếm"
           value="">
    <i class="search icon"></i>
</div>
<div class="results" id="search-result">

</div>

@push('script')
    <script>

        $('.ui.input').on('input', function () {
            var key_search = $('#search_foody').val();
            if (key_search == '') {
                $('#search-result').removeClass('.results');
                $('#search-result').empty();
            }
            else {
                $.ajax({
                    url: 'search',
                    type: 'get',
                    data: {
                        key: key_search
                    },
                    success: function (data) {
                        $('#search-result').addClass('.results');
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
        height: auto;
        margin-bottom: 0 !important;
        background-color: white;
    }

    .result-content {
        padding-top: 15px !important;
    }

    .result-img {
        width: 40px;
    }
</style>