@extends('admin.layouts.master')

@section('title', 'Sửa bài viết')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing">
            <a href="{{ route('news.index') }}" class="a-decoration"><i class="double angle left circular fitted small icon"></i></a>
            Cập nhật bài viết</h3>

        @include('admin.layouts.components.errors_msg')

        @include('admin.layouts.components.success_msg')

        <form action="{{ route('news.update', [$news->id]) }}" method="post" class="ui form">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="ui stackable grid">
                <div class="eleven wide column">
                    <div class="field">
                        <label>Tiêu đề</label>
                        <input type="text"  name="title" placeholder="Tiêu đề" value="{{ $news->title }}" required>
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

