@php
$totalOrderUncheck = \App\Statistic::getTotalOrderNotApproved();
$totalMaterial = \App\Material::getTotalGoodsReceiptMaterial();
@endphp
<div href="" class="ui dropdown icon item">
    <i class="bell icon"></i>
    {!! $totalOrderUncheck > 0 ? '<span class="ui small floating red circular label " style="top:-0.168em!important; font-size: 0.659rem!important;">1</span>' : '' !!}
    {!! $totalMaterial > 0 ? '<span class="ui small floating red circular label " style="top:-0.168em!important; font-size: 0.659rem!important;">1</span>' : '' !!}

    <div class="menu">
        @if (!empty($totalOrderUncheck))
            <a class="item" href="{{route('orders_filter',[0]) }}">
                <span class="ui blue label">{{ $totalOrderUncheck }}</span>đơn hàng chưa duyệt
            </a>
        @endif
            {{--@if (!empty($totalMaterial))--}}
                {{--<a class="item" href="{{route('admin.material') }}">--}}
                    {{--<span class="ui blue label">{{ $totalMaterial }}</span> nguyên liệu cần nhập hàng--}}
                {{--</a>--}}
            {{--@endif--}}
    </div>

</div>