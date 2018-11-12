@if($logged == 'true')
    <div id="foody-rating-modal" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h5 class="modal-header center-align">Đánh giá</h5>
            <div id="rating-content">
                @if($voted == 'true')
                    @php
                        $vote_detail = \App\VoteDetail::where('foody_id', $foody->id)
                        ->where('customer_id', Auth::guard('customer')->user()->id)->first();
                        $describe = ['', 'Rất tệ', 'Tệ', 'Trung bình', 'Tốt', 'Rất tốt'];
                        $color = ['', 'red-text', 'grey-text', '', 'green-text', 'purple-text'];
                    @endphp
                    <div class="rating-row">
                        <span class="til">Giá cả</span>
                        <span class="rate rating-vote">
                            @for($i=1; $i<=5; $i++)
                                @if($i <= (int)$vote_detail->cost)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </span>
                        <span class="describe">
                            <span class="{{ $color[(int)$vote_detail->cost] }}">{{ number_format($vote_detail->cost, 1) }}</span>
                            <small>({{ $describe[(int)$vote_detail->cost] }})</small>
                        </span>
                    </div>
                    <div class="rating-row">
                        <span class="til">Phục vụ</span>
                        <span class="rate rating-vote">
                            @for($i=1; $i<=5; $i++)
                                @if($i <= (int)$vote_detail->attitude)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </span>
                        <span class="describe">
                            <span class="{{ $color[(int)$vote_detail->attitude] }}">{{ number_format($vote_detail->attitude, 1) }}</span>
                            <small>({{ $describe[(int)$vote_detail->attitude] }})</small>
                        </span>
                    </div>
                    <div class="rating-row">
                        <span class="til">Chất lượng</span>
                        <span class="rate rating-vote">
                            @for($i=1; $i<=5; $i++)
                                @if($i <= (int)$vote_detail->quality)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </span>
                        <span class="describe">
                            <span class="{{ $color[(int)$vote_detail->quality] }}">{{ number_format($vote_detail->quality, 1) }}</span>
                            <small>({{ $describe[(int)$vote_detail->quality] }})</small>
                        </span>
                    </div>
                @else
                    <div class="rating-row">
                        <span class="til">Giá cả</span>
                        <span class="rate rating-vote">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="describe">
                            3.0 <small>(Trung bình)</small>
                        </span>
                    </div>
                    <div class="rating-row">
                        <span class="til">Phục vụ</span>
                        <span class="rate rating-vote">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="describe">
                            3.0 <small>(Trung bình)</small>
                        </span>
                    </div>
                    <div class="rating-row">
                        <span class="til">Chất lượng</span>
                        <span class="rate rating-vote">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                        <span class="describe">
                            3.0 <small>(Trung bình)</small>
                        </span>
                    </div>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <a style="width: 73px" class="modal-close waves-effect waves-light red lighten-2 btn">Thoát</a>
            <a id="send-rating" class="waves-effect waves-light btn">Xác nhận</a>
        </div>
    </div>

    @include('customer.foody.vote.style')
@endif