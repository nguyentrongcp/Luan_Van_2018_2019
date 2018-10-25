@extends('admin.layouts.master')

@section('title', 'Thông tin chi tiết nhân viên ')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('employees.index') }}" class="need-popup a-decoration" data-content="Danh sách nhân viên">
                <i class="blue small angle double left circular fitted icon"></i></a>
            {{ $employee->name }}
            <a href="{{ route('employees.edit', [$employee->id]) }}" class="ui blue label a-decoration">
                <i class="edit fitted icon"></i> Cập nhật
            </a>
        </h3>

        @include('admin.employees.show.tab_information')
    </div>
@endsection