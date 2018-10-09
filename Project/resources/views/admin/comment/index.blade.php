@extends('admin.layouts.master')
@section('title','Bình luận | Fast Foody Shop')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="" method="post">
                        <div class="card-header">
                            <h5 class="title text-center">QUẢN LÝ BÌNH LUẬN</h5>
                            <hr>
                            <div class="dropdown">
                                <a class="btn btn-info btn-round dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Bộ lọc <i class="fa fa-filter"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Chọn ngày</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body all-icons">
                            <div class="row">
                                <div class="wrapper-prot">
                                    @include('admin.comment.table')
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection