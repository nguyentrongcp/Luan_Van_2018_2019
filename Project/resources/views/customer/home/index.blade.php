@extends('customer.layouts.master')

@section('title', 'fastfoody.vn - Thức ăn nhanh, ngon, tiện lợi')

@section('content')

    <div class="row">
        @include('customer.home.navbar')

        @include('customer.home.show')
    </div>

    @push('script')
        <script>
            $('.foody-type').on('click', function () {
                slug = this.id;
                $.ajax({
                    type: 'GET',
                    url: '/type/' + slug,
                    success: function (data) {
                        $('.foody-type').removeClass('active');
                        $('#' + slug).addClass("active");
                        $('#show-foody').empty();
                        $('#show-foody').append(data);
                    }
                });
                // $.get('/type/' + slug, function (data) {
                //     $('#show-foody').empty();
                //     $('#show-foody').append(data);
                // });
            });
        </script>
    @endpush

@endsection