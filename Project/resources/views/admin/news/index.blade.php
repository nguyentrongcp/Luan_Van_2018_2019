@extends('admin.layouts.master')
@section('title','Tin tức | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('news.destroy',[0])}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <div class="card-header">
                            <h5 class="title text-center">QUẢN LÝ TIN TỨC</h5>
                            <hr>
                            <div class="add-productType">
                                <a class="btn btn-info btn-round" href="{{route('news.create')}}">
                                    <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                                </a>
                                <button type="submit" class="btn btn-danger btn-round"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.news.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection