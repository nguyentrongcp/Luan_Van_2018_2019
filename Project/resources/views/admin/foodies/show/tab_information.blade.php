<div class="ui bottom attached tab segment active" data-tab="first">
    <form action="" class="ui form static">
        <div class="ui padded grid">
            <div class="ten wide column">

                <div class="inline field">
                    <label class="label-fixed">Tên thực đơn</label>
                    <div class="static-input">{{ $nameFoody }}</div>
                </div>

                <div class="inline field">
                    <label class="label-fixed">Loại thực đơn</label>
                    <div class="static-input">{{ $typeFoody }}</div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Giá</label>
                    <div class="static-input"><strong>{{ number_format($foodies->currentCost()) }} đ</strong>

                        {{--ăn gian code --}}
                        <a class="ui label"
                           onclick="$('#cost-history').modal('show')">Lịch sử</a>

                        <a class="ui blue label"
                           onclick="$('#cost-update').modal('show')">Cập nhật</a>
                    </div>
                </div>
                <div class="inline field">
                    <label class="label-fixed">Tình trạng</label>
                    <div class="static-input">
                        <strong class="ui red label {{$foodies->getStatus() < 1 ? '': 'hidden'}}">Tạm hết</strong>
                        <strong class="ui green label {{$foodies->getStatus() > 0 ? '': 'hidden'}}">Đang bán</strong>
                    </div>
                </div>
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