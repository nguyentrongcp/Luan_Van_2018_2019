@extends('admin.layouts.master')

@section('title', 'Sửa bài viết')
@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing">
            <a href="{{ route('news.index') }}" class="a-decoration"><i
                        class="double angle left circular fitted small icon"></i></a>
            Cập nhật bài viết</h3>

        @include('admin.layouts.components.error_msg')

        @include('admin.layouts.components.success_msg')

        <form action="{{ route('news.store')}}" method="post" class="ui form" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="field">
                        <label>Tiêu đề</label>
                        <input type="text" class="hidden" required name="title" placeholder="Tiêu đề"
                               value="Ẩm thực Việt Nam">
                    </div>

                    {{--@include('sharing.lfm_field', [--}}
                    {{--'label' => 'Ảnh hiển thị',--}}
                    {{--'thumb' => $news->thumb,--}}
                    {{--'needThumb' => 0--}}
                    {{--])--}}
                    <div class="field">
                        <label for="">Hình ảnh</label>
                    </div>
                    <div class="field">
                        <a href="#" class="ui tiny blue button" onclick="$('#add-image-news-modal').modal('show')">Chọn hình ảnh</a>
                    </div>
                </div>
            </div>
            <div class="sixteen wide column">
                <div class="field">
                    <label for="content">Nội dung</label>
                </div>
                <div class="field">
                    <textarea name="content" id="ckeditor" cols="30" rows="10">
                </textarea>
                </div>
                <div class="field">
                    <button class="ui blue button"><i class="save icon"></i>Lưu bài</button>
                </div>
            </div>

        </form>
    </div>
    @include('admin.news.modal')
@endsection


