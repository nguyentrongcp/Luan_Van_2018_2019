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

        <div class="ui form">

            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="field">
                        <label>Tiêu đề</label>
                        <input id="news-title" type="text" class="hidden" required name="title" placeholder="Tiêu đề"
                               value="Ẩm thực Việt Nam">
                    </div>
                </div>
            </div>
            <div class="sixteen wide column">
                <div class="field">
                    <label for="content">Nội dung</label>
                </div>
                <div id="editor">
                    <textarea id='news-content' name="content" placeholder="Nội dung bài viết">

                      </textarea>
                </div>
                <div class="field">
                    <button id="news-submit" class="ui blue button"><i class="save icon"></i>Lưu bài</button>
                </div>
            </div>

        </div>
    </div>
    @include('admin.news.modal')

    @include('admin.news.style')
    @include('admin.news.js')
@endsection


