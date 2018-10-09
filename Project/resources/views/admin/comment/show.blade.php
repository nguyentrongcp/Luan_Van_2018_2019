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
                                    {{--<div class="card">--}}
                                        <div class="card-header">
                                            <div class="card-header text-center title text-warning">
                                                {{App\Foody::find($id)->name}}
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{App\Foody::find($id)->avatar}}"
                                                 alt="{{App\Foody::find($id)->name}}">
                                        </div>
                                    {{--</div>--}}
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
                                            <div class="card-body">
                                                {!! $comment->content !!}
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