@extends('admin.layouts.master')
@section('title','ADMIN | Thống kê')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Danh sách nhân viên của cửa hàng</h5>
                        <div class="add-product">
                            <button class="btn btn-info btn-round">
                                <i class="now-ui-icons ui-1_simple-add"></i> Thêm mới
                            </button>
                            <button class="btn btn-danger btn-round">
                                <i class="now-ui-icons ui-1_simple-remove"></i> Xóa nhiều
                            </button>
                        </div>
                    </div>
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="tables">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th>Name</th>
                                        <th>Job Position</th>
                                        <th>Since</th>
                                        <th class="text-right">Salary</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>John Doe</td>
                                        <td>Design</td>
                                        <td>2012</td>
                                        <td class="text-right">&euro; 89,241</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                                <i class="now-ui-icons travel_info"></i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection