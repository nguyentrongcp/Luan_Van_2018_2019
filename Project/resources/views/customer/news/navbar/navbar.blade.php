<div id="news-nav" class="news-nav white">
    <div class="til truncate">
                    <span>
                        Tin hot nhất
                    </span>
    </div>
    <div class="divider"></div>
    <div class="news-nav-content">
        @foreach(\App\Functions::getHotNews() as $key => $news)
            <div class="news-nav-row row">
                <img class="news-nav-image" src="{{ asset($news->avatar) }}">
                <div class="news-nav-row-content">
                    <div class="til truncate">
                        {{ $news->title }}
                    </div>
                    <div class="cont truncate-twolines">
                        @php
                            $news_content = $news->content;
                                        do {
                                            $length = strpos($news_content, '</p>') - strpos($news_content, '<p>') - 3;
                                            $content = substr($news_content, strpos($news_content, '<p>') + 3, $length);
                                            $news_content = substr($news_content, strpos($news_content, $content) + 4 + strlen($content));
                                        }
                                        while(strpos($content, '<img') === 0);
                        @endphp
                        {!! $content !!}
                    </div>
                    <div class="time">
                        {{ date_format(date_create($news->date), 'd-m-Y H:i:s') }}
                    </div>
                </div>
            </div>
            @if($key != 4)
                <div class="divider"></div>
            @endif
            @if($key == 4)
                @break
            @endif
        @endforeach
    </div>
</div>

@include('customer.news.navbar.style')
@include('customer.news.navbar.js')