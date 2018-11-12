@php
$totalOrderUncheck = \App\Statistic::getTotalOrderNotApproved();
@endphp
<div href="" class="ui dropdown icon item">
    <i class="bell icon"></i>
    {!! $totalOrderUncheck > 0 ? '<span class="ui small floating red circular label">1</span>' : '' !!}
    <div class="menu">
        @if (!empty($totalOrderUncheck))
            <a class="item" href="{{route('orders_filter',[0]) }}">
                <span class="ui blue label">{{ $totalOrderUncheck }}</span>đơn hàng chưa duyệt
            </a>
        @endif
    </div>
</div>