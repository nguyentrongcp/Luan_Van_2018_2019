@extends('admin.layouts.master')
@section('title','ADMIN | Tin tức')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{--@foreach($news as $news)--}}
                    <div class="card-header">
                        <a class="btn btn-round btn-info text-white" href="{{route('news.index')}}">
                            <i class="fa fa-arrow-circle-left" style="font-size: 18px"></i>TRỞ VỀ</a>
                        <div class=" col-md-4 ml-auto mr-auto">
                            <div class="row">
                                <h5 class="title text-center">{{$news->title}}</h5>
                                <a href="{{route('news.edit',[$news->id])}}" class="btn btn-round btn-success btn-icon text-white">
                                    <i class="now-ui-icons ui-2_settings-90"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @foreach(App\Admin::where('id',$news->admin_id)->get() as $writer)
                            <label for="person">{{$writer->name}}</label>
                            @endforeach
                                <label for="" style="width: 50px"></label>
                            <label for="date">{{$news->date}}</label>
                        </div>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="wrapper-prot">
                                {!! $news->content !!}
                            </div>
                        </div>
                    </div>
                    {{--@endforeach--}}

                </div>

            </div>
        </div>
    </div>
@endsection