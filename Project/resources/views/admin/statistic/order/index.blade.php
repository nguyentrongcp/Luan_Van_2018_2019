@extends('admin.layouts.master')

@section('title', 'Đơn hàng')

@section('content')
    <div class="ui blue raised segment">

        <h3 class="ui dividing header">Thống kê đơn hàng</h3>

        @include('admin.statistic.order.general')

        <div class="ui divider"></div>

        <h4 class="ui header">Biểu đồ thống kê

            <span class=" force-right pointer"
                  onclick="showExportMultiple(
                  '',
                  'Thong ke theo so luong don hang',
                  amountCols, amountRows,
                  'Thong ke theo gia tri don hang (DV: trieu dong)',
                  revCols, revRows
              )">
            <i class="file pdf outline red icon fitted"></i>
            PDF
        </span>
        </h4>
        <form class="ui tiny form">
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
                    <select name="month" id="month-start" onchange="beginMonthChanged()">
                        @for($i = 1; $i <= 12 ; $i++)
                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-month-end">
                    <select name="month" id="month-end">
                        @for($i = 1; $i <= 12 ; $i++)
                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-day-start">
                    <label>Từ ngày: </label>
                    <select name="month" id="day-start" onchange="beginChanged()">
                        @for($i = 1; $i <= 31 ; $i++)
                            <option value="{{ $i }}">Ngày {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="field select-hide hidden" id="select-day-end">
                    <label>Đến ngày: </label>
                    <select name="month" id="day-end">
                        @for($i = 1; $i <= 31 ; $i++)
                            <option value="{{ $i }}" {{ $i == 5 ? 'selected': '' }}>Ngày {{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="field" id="btn-view">
                    <a class="ui blue label" id="statistic-btn">OK</a>
                </div>
            </div>
        </form>

        <div class="ui grid">
            <div class="row">
                @include('admin.statistic.order.amount')
            </div>
            <div class="ui divider"></div>
            <div class="row">
                @include('admin.statistic.order.cost')
            </div>

        </div>
    </div>

    @include('admin.statistic.js')
    @include('admin.statistic.order.js')

@endsection
