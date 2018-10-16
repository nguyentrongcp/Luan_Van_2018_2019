@extends('admin.layouts.master')
@section('title','Bình luận | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('comments.destroy',[0])}}" method="post">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                        <div class="card-header">
                            <h5 class="title text-center">QUẢN LÝ BÌNH LUẬN</h5>
                            <hr>
                            <div class="dropdown">
                                <a class="btn btn-info btn-round dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Bộ lọc <i class="fa fa-filter"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('comments.index')}}">Tất cả</a>
                                    <a class="dropdown-item" href="{{route('admin_comment_filter',[0])}}">Chưa duyệt</a>
                                    <a class="dropdown-item" href="{{route('admin_comment_filter',[1])}}">Đã duyệt</a>
                                </div>
                                <button type="submit" class="btn btn-danger btn-round"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
                                    <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                                </button>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.comment.filter.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection