@extends('admin.layouts.master')

@section('title', 'Sửa bài viết')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing">
            <a href="{{ route('news.index') }}" class="a-decoration"><i class="double angle left circular fitted small icon"></i></a>
            Cập nhật bài viết</h3>

        @include('admin.layouts.components.errors_msg')

        @include('admin.layouts.components.success_msg')

        <form action="{{ route('news.update', [$news->id]) }}" method="post" class="ui form" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="ui stackable grid">
                <div class="ten wide column">
                    <div class="field">
                        <label>Tiêu đề</label>
                        <input type="text"  name="title" placeholder="Tiêu đề" value="{{ $news->title }}" required>
                    </div>
                </div>
                @if($errors->has('title'))
                    <div style="color: red; margin-top: 5px; font-size: 13px">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <div class="six wide column">
                    <div class="required field">
                        <label>Ảnh đại diện</label>
                        <img src="{{asset($news->avatar)}}" class="ui img-tb" alt="{{$news->title}}">
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
            </div>

            <div class="field">
                <label>Nội dung</label>
                <textarea name="content" id="ckeditor" cols="30" rows="10">
                {!! $news->content !!}
                </textarea>
            </div>
            <div class="field">
                <button class="ui blue button"><i class="save icon"></i>Lưu bài</button>
            </div>
        </form>
    </div>
@endsection

