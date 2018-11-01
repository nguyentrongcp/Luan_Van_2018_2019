<div class="news-nav white">
    <div class="til truncate">
                    <span>
                        Tin hot nhất
                    </span>
    </div>
    <div class="divider"></div>
    <div class="news-nav-content">
        @for($i=1; $i<=5; $i++)
            <div class="news-nav-row row">
                <img class="news-nav-image" src="{{ asset('/customer/image/slider4.jpg') }}">
                <div class="news-nav-row-content">
                    <div class="til truncate">
                        Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                    </div>
                    <div class="cont truncate-twolines">
                        Dưới những tán cây đang vơi dần lá, có phiến đá đầy rêu xanh. Hàng ngày đón nắng một cách vô tri bầu trời có mưa cũng chẳng lạnh. Vì đó là đá.
                    </div>
                    <div class="time">
                        {{ date('d-m-Y H:i:s') }}
                    </div>
                </div>
            </div>
            @if($i != 5)
                <div class="divider"></div>
            @endif
        @endfor
    </div>
</div>

@include('customer.news.navbar.style')