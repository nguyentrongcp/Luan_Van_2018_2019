@extends('admin.layouts.master')

@section('title', 'Slide quảng cáo')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui dividing header center aligned">Slide quảng cáo</h3>

        @include('admin.layouts.components.success_msg')

        @include('admin.layouts.components.errors_msg')

        <div id="dropzone-message" class="normal-td-margin"></div>

        <form action="{{ route('sliders.destroy', [0]) }}" method="post">

            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <button type="submit" class="ui small red delete button need-popup"
                    data-content="Xóa các mục vừa chọn"
                    onclick="return confirmDelete()"
            >
                <i class="delete fitted icon"></i>
                <strong>Xóa </strong>
            </button>

            <a href="#" class="ui small blue button" onclick="$('#add-image-slider-modal').modal('show')">
                <i class="add fitted icon"></i>
                <strong>Thêm mới </strong>
            </a>

            @include('admin.slider.table')

        </form>

        <div class="ui dividing header">Xem trước</div>

        <div class="ui basic segment center aligned">
            <div class="fotorama" data-autoplay="3s">
                @foreach($sliders as $slider)
                    <a href="{{ asset($slider->image) }}">
                        <img src="{{ asset($slider->image) }}">
                    </a>
                @endforeach
            </div>
        </div>

        @include('admin.slider.modal')
    </div>
@endsection

@push('script')
    <script>
        bindSelectAll('chon-het-slider');
    </script>
@endpush
