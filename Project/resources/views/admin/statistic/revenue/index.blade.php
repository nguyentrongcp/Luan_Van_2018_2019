@extends('admin.layouts.master')

@section('title', 'Thống kê thu chi')

@section('content')
    <div class="ui blue raised segment">

        <h3 class="ui dividing header">Thống kê thu chi</h3>

        @include('admin.statistic.revenue.today')

        <div class="ui divider"></div>

        <h4 class="ui header">Biểu đồ thống kê</h4>

        <form class="ui tiny form" onsubmit="renderChart(event)">
            <div class="inline fields">
                <div class="field" id="select-type">
                    <label>Xem theo: </label>
                    <select name="type" id="type">
                        <option value="year">Năm</option>
                        <option value="quarter">Quý</option>
                        <option value="month">Tháng</option>
                        <option value="day">Ngày</option>
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-year">
                    <select name="year" id="year" onchange="yearChanged()">
                        @for($i = date('Y'); $i >= 2014 ; $i--)
                            <option value="{{ $i }}">Năm {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-quarter">
                    <select name="quarter" id="quarter">
                        @for($i = 1; $i <= 4 ; $i++)
                            <option value="{{ $i }}">Quý {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-month">
                    <select name="month" id="month" onchange="monthChanged()">
                        @for($i = 1; $i <= 12 ; $i++)
                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-month-start">
                    <label>Từ: </label>
                    <select name="month" id="month-start" onchange="beginMonthChanged()">
                        @for($i = 1; $i <= 12 ; $i++)
                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-month-end">
                    <label>Đến: </label>
                    <select name="month" id="month-end">
                        @for($i = 1; $i <= 12 ; $i++)
                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-day-start">
                    <label>Từ: </label>
                    <select name="month" id="day-start" onchange="beginChanged()">
                        @for($i = 1; $i <= 31 ; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-day-end">
                    <label>Đến: </label>
                    <select name="month" id="day-end">
                        @for($i = 1; $i <= 31 ; $i++)
                            <option value="{{ $i }}" {{ $i == 5 ? 'selected': '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="field" id="btn-view">
                    <a class="ui blue label" id="statistic-btn">OK</a>
                </div>
            </div>
        </form>

        <div class="ui grid">
            @include('admin.statistic.revenue.chart')
        </div>
{{--        @include('admin.dashboard.account.export')--}}
    </div>

    @include('admin.statistic.js')
    @include('admin.statistic.revenue.js')
@endsection