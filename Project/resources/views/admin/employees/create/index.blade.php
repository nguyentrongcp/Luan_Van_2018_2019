@extends('admin.layouts.master')

@section('title', 'Thêm mới nhân viên ')

@section('content')
    @include('admin.layouts.components.errors_msg')
    @include('admin.layouts.components.success_msg')

    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('employees.index') }}" class="need-popup a-decoration" data-content="Danh sách nhân viên">
                <i class="small angle double left circular fitted icon"></i></a>
            Thêm mới nhân viên
        </h3>
        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data"
              class="ui form static" id="create-employee-form">
            {{ csrf_field() }}
            @include('admin.employees.create.tab_information')
        </form>
    </div>
@endsection