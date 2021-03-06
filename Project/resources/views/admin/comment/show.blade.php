@extends('admin.layouts.master')
@section('title','Chi tiết bình luận | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a class="title" rel="tooltip" title="Trang quản lý nhập hàng" data-placement="bottom"
                           href="{{route('comments.index')}}">
                            <i class="fa fa-chevron-circle-left btn btn-info btn-round"></i>
                        </a>
                        <label for="" class="title text-black-50" style="font-size: 16px">CHI TIẾT BÌNH LUẬN </label>

                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="content">
                            <div class="card">
                                <div class="col-md-6 mr-auto ml-auto">
                                    <div class="card-header">
                                        <div class="card-header text-center title text-warning">
                                            {{App\Foody::find($id)->name}}
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img src="{{App\Foody::find($id)->avatar}}"
                                             alt="{{App\Foody::find($id)->name}}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <label for="" class="title text-comment">Bình luận
                                        ({{App\Comment::where('foody_id',$id)->count()}})</label>
                                </div>
                                <div class="div-comment">
                                    @foreach($comments as $comment)
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="text-left" style="padding-right: 50px;font-size: 20px">
                                                    <label class="text-success"
                                                           for="">{{App\Customer::find($comment->customer_id)->name}}</label>
                                                    <br><label class="text-gray">{{$comment->date}}</label>
                                                </div>
                                            </div>
                                            <div class="card-body">.
                                                {!! $comment->content !!}
                                                {{--<div class="gallery">--}}
                                                    {{--@php--}}
                                                    {{--@if ($idImagecmts = App\ImageComment::where('comment_id',$comment->id)->count() > 0)--}}
                                                        {{--{--}}
                                                        {{--@foreach ($idImagecmts as $idImagecmt ){--}}
                                                        {{--$imagecmt = App\Image::find($idImagecmt->image_id)->link;--}}
                                                        {{--echo '<img class="design_image" src="{{$imagecmt}}"--}}
                                                                   {{--alt="comment-images">';--}}
                                                        {{--}--}}
                                                        {{--@endforeach--}}
                                                        {{--}--}}
                                                    {{--@endif--}}
                                                    {{--@endphp--}}
                                                {{--</div>--}}
                                                @if($comment->is_approved == false)
                                                    <form action="{{route('admin.approved',[$comment->id])}}"
                                                          method="post">
                                                        {{ csrf_field() }}
                                                        <div class="float-right">
                                                            <button type="submit" rel="tooltip" data-placement="bottom"
                                                                    title="Duyệt"
                                                                    class="btn btn-success  btn-round "
                                                                    onclick="return confirm('Bạn chắc chắn muốn duyệt bài đăng này chứ?')">
                                                                <i class="fa fa-check-circle"></i> Duyệt
                                                            </button>
                                                        </div>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection