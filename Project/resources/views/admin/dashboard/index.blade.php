@extends('admin.layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="ui two column padded stackable grid">
        <div class="sixteen wide column">
            <h2 class="ui header dividing">Tổng quan</h2>
        </div>
        <div class="sixteen wide column">
            @include('admin.dashboard.general')
        </div>
        <div class="column">
            @include('admin.dashboard.order')

        </div>
        <div class="column">
            @include('admin.dashboard.foody_type')
        </div>

        <div class="sixteen wide column">
            @include('admin.dashboard.history')
        </div>

    </div>
@endsection