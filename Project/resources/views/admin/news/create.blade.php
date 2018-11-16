@extends('admin.layouts.master')

@section('title', 'Sửa bài viết')
@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing">
            <a href="{{ route('news.index') }}" class="a-decoration"><i
                        class="double angle left circular fitted small icon"></i></a>
            Thêm bài viết mới</h3>

        @include('admin.layouts.components.errors_msg')

        @include('admin.layouts.components.success_msg')

        <div class="ui form">

            <div class="ui padded stackable grid">
                <form action="{{route('news.index')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="ten wide column">
                    <div class="field">
                        <label>Tiêu đề</label>
                        <input id="news-title" type="text" class="hidden" required name="title" placeholder="Tiêu đề"
                               value="Ẩm thực Việt Nam">
                    </div>
                    @if($errors->has('title'))
                        <div style="color: red; margin-top: 5px; font-size: 13px; padding-bottom: 5px">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="six wide column">
                    <div class="required field">
                        <label>Ảnh đại diện</label>
                        <label for="avatar-news">
                            <span class="ui blue compact label">Chọn một ảnh</span>
                            <span id="avatar-news-name"></span>
                        </label>
                        <input type="file" name="avatar-news" id="avatar-news" style="display: none;"
                               onchange="$('#avatar-news-name').text($('#avatar-news')[0].files[0].name)"
                               accept=".jpg, .png, .jpeg">
                    </div>
                    @if($errors->has('avatar-news'))
                        <div style="color: red; margin-top: 5px; font-size: 13px">
                            {{ $errors->first('avatar-news') }}
                        </div>
                    @endif
                    <div class="ui divider">
                    </div>
                </div>

                <div class="sixteen wide column">
                    <div class="field">
                        <label for="content">Nội dung</label>
                    </div>
                    <div id="editor">
                    <textarea id='news-content' name="content" placeholder="Nội dung bài viết" >
                            {{old('content')}}
                      </textarea>
                    </div>
                    <div class="field">
                        <button id="news-submit" class="ui blue button"><i class="save icon"></i>Lưu bài</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    @include('admin.news.modal')

    @include('admin.news.style')
    @include('admin.news.js')
@endsection


