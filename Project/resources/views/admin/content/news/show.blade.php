@extends('admin.layouts.master')

@section('title', 'Xem bài viết')

@section('content')
    <div class="ui blue segment">
        <h3 class="ui header dividing">
            <a href="{{ route('news.index') }}"><i class="double angle left circular fitted small icon"></i></a>
            {{ $news->title }}
            <a href="{{ route('news.edit', [$news->id]) }}" class="ui small label blue a-decoration">
                <i class="edit icon"></i>Cập nhật
            </a>
            <span class="sub header small-td-margin">
                <i class="user fitted icon"></i> {{ \App\Admin::find($news->admin_id)->name }}
                <span class="short-space"></span>
                <i class="calendar outline fitted icon"></i> {{ $news->date }}
            </span>
        </h3>
        <div class="field">
            <img src="{{asset($news->avatar)}}" class="ui img-tb" alt="{{$news->title}}">
        </div>
        {!! $news->content !!}
    </div>
@endsection