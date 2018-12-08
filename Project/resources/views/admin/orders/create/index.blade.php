@extends('admin.layouts.master')

@section('title', 'Thêm mới đơn hàng')

@section('content')
    <div class="ui blue raised segment">
        <h3 class="ui dividing header">
            <a href="{{ route('orders.index') }}" class="need-popup a-decoration" data-content="Danh sách đơn hàng">
                <i class="blue small angle double left circular fitted icon"></i></a>
           Thêm mới đơn hàng
        </h3>

        @include('admin.layouts.components.success_msg')
        @include('admin.layouts.components.errors_msg')


        @include('admin.orders.create.tab_information')

    </div>
@endsection