<div class="row rating white">
    <div class="col s12 rating-header">
                    <span style="line-height: 50px; font-size: 17px; font-weight: 400">
                        <b>{{ $foody->voteDetails()->count() }}</b> lượt đánh giá</span>
        <div class="divider"></div>
    </div>
    @php
        $great = 0; $good = 0; $normal = 0; $bad = 0; $very_bad = 0;
        foreach($foody->voteDetails()->get() as $vote) {
            $avg = ($vote->cost + $vote->attitude + $vote->quality) / 3;
            if ($avg >= 4.5) $great++;
            elseif($avg >= 3.5) $good++;
            elseif($avg >= 2.5) $normal++;
            elseif($avg >= 2) $bad++;
            else $very_bad++;
        }
    @endphp
    <div class="col s12 rating-content">
        <div class="row"><span class="purple-text col rate-detail-number">{{ $great }} </span><span>Tuyệt vời</span></div>
        <div class="row"><span class="green-text col rate-detail-number">{{ $good }} </span><span>Tốt</span></div>
        <div class="row"><span class="col rate-detail-number">{{ $normal }} </span><span>Trung bình</span></div>
        <div class="row"><span class="grey-text col rate-detail-number">{{ $bad }} </span><span>Tệ</span></div>
        <div class="row"><span class="red-text col rate-detail-number">{{ $very_bad }} </span><span>Rất tệ</span></div>
        <div class="row"><div class="divider"></div></div>
    </div>
    <div class="col s12" style="margin-top: 20px">
        @if($votes != null)
            <div class="col s12 foody-rating center-align foody-rating-detail">
                <span class="rate-title">Ngon</span>
                @for($i=1; $i<=5; $i++)
                    @if($i <= $votes->quality)
                        <i class="fas fa-star"></i>
                    @elseif(number_format($votes->quality) == $i)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
                <span class="rate-number-avg">{{ number_format($votes->quality, 1) }}</span>
            </div>
            <div class="col s12 foody-rating center-align foody-rating-detail">
                <span class="rate-title">Giá cả</span>
                @for($i=1; $i<=5; $i++)
                    @if($i <= $votes->cost)
                        <i class="fas fa-star"></i>
                    @elseif(number_format($votes->cost) == $i)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
                <span class="rate-number-avg">{{ number_format($votes->cost, 1) }}</span>
            </div>
            <div class="col s12 foody-rating center-align foody-rating-detail">
                <span class="rate-title">Phục vụ</span>
                @for($i=1; $i<=5; $i++)
                    @if($i <= $votes->attitude)
                        <i class="fas fa-star"></i>
                    @elseif(number_format($votes->attitude) == $i)
                        <i class="fas fa-star-half-alt"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
                <span class="rate-number-avg">{{ number_format($votes->attitude, 1) }}</span>
            </div>
        @else
            <div class="col s12 foody-rating center-align foody-rating-detail">
                Chưa có đánh giá nào
            </div>
        @endif
        <div class="col s12 divider" style="margin-top: 10px"></div>
    </div>
    <div class="col s12 rating-footer center-align">
        <span class="rate-avg">{{ number_format($votes->average, 1) }}</span>
        <i class="fas fa-star"></i>
        <span style="margin: 0 4px"> - </span>
        <span style="font-weight: 500">
            @if($votes->average >= 4.5)
                Tuyệt vời
            @elseif($votes->average > 3.5)
                Tốt
            @elseif($votes->average > 2.5)
                Trung bình
            @elseif($votes->average > 2)
                Tệ
            @else
                Rất tệ
            @endif
        </span>
    </div>
    <div class="foody-action navbar col s12">
        <nav class="grey darken-2">
            <div class="nav-wrapper">
                <ul>
                    <li class="col s6 text-center waves-effect waves-light">
                        <a class="foody-comment-show">
                            <i class="comment icon"></i>
                            Bình luận
                        </a>
                    </li>
                    <li class="col s6 waves-effect waves-light">
                        <a class="foody-rating-modal-show">
                            <i class="star icon"></i>
                            Đánh giá
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

@include('customer.foody.rating.style')
@include('customer.foody.rating.js')