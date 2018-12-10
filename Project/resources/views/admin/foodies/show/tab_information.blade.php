<div class="ui bottom attached tab segment active" data-tab="first">
    <form action="" class="ui form static">
        <div class="ui padded grid">
            <div class="ten wide column">
                <div class="inline field">
                    <label class="label-fixed">Tên món ăn</label>
                    <div class="static-input">{{ $foodies->name }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Loại món ăn</label>
                    <div class="static-input">{{ $typeFoody }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Giá</label>
                    <div class="static-input">
                        @if($foodies->isSalesOff())
                            <strike><strong>{{ number_format($foodies->currentCost()) }} đ</strong></strike>-
                            <span style="color: red"><strong>{{ number_format(($foodies->currentCost())*(1-($foodies->getSalePercent())/100)) }} đ</strong></span>
                        @else
                            <strong>{{ number_format($foodies->currentCost()) }} đ</strong>
                        @endif
                        <a href="#" class="ui label a-decoration"
                           onclick="$('#cost-history-modal').modal('show')">Lịch sử</a>

                        <a href="#" class="ui blue label a-decoration"
                           onclick="$('#cost-update-modal').modal('show')">Cập nhật</a>
                    </div>
                </div>
                @if($foodies->isSalesOff())
                    <div class="inline field">
                        <label class="label-fixed">Khuyến mãi</label>
                        <div class="static-input">
                            <span class="ui red label pulse">{{$foodies->getSalePercent() .' %'}}</span>

                        </div>
                    </div>
                @endif
            </div>


            <div class="six wide column">
                <div class="inline field">
                    <label for="">Điểm đánh giá:</label>
                    <div class="static-input">
                        <label for="">Giá thành:&nbsp;&nbsp;</label>
                        @component('admin.layouts.components.star_rating')
                            {{number_format((float)$foodies->getCostVotes(),2,'.','')}}
                        @endcomponent
                        &nbsp;&nbsp;&nbsp;<strong>{{number_format((float)$foodies->getCostVotes(),2,'.',''). '/5  sao'}}</strong>
                    </div>
                    <div class="static-input">
                        <label for="">Chất lượng:&nbsp;&nbsp;</label>
                        @component('admin.layouts.components.star_rating')
                            {{number_format((float)$foodies->getQualityVotes(),2,'.','')}}
                        @endcomponent
                        &nbsp;&nbsp;&nbsp;<strong>{{number_format((float)$foodies->getQualityVotes(),2,'.',''). '/5  sao'}}</strong>
                    </div>
                    <div class="static-input">
                        <label for="">Hài lòng:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        @component('admin.layouts.components.star_rating')
                            {{number_format((float)$foodies->getAttitudeVotes(),2,'.','')}}
                        @endcomponent
                        &nbsp;&nbsp;&nbsp;<strong>{{number_format((float)$foodies->getAttitudeVotes(),2,'.',''). '/5  sao'}}</strong>
                    </div>

                </div>

                <div class="field">
                    <label for="">Ảnh đại diện</label>
                    <img src="{{ asset($foodies->avatar) }}" class="ui bordered small image">
                </div>

            </div>
        </div>
    </form>
</div>
@include('admin.foodies.show.modals')

<style>
    .pulse {
        overflow: visible;
        position: relative;
    }

    .pulse::before {
        content: '';
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: inherit;
        border-radius: inherit;
        -webkit-transition: opacity .3s, -webkit-transform .3s;
        transition: opacity .3s, -webkit-transform .3s;
        transition: opacity .3s, transform .3s;
        transition: opacity .3s, transform .3s, -webkit-transform .3s;
        -webkit-animation: pulse-animation 1s cubic-bezier(0.24, 0, 0.38, 1) infinite;
        animation: pulse-animation 1s cubic-bezier(0.24, 0, 0.38, 1) infinite;
        z-index: -1;
    }
</style>





