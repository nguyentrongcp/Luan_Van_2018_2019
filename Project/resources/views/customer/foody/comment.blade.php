<div class="row comment">

    @foreach($foody->comments as $comment)
        <div class="col s12 white content">
            <div class="row comment">
                <div class="row comment-title">
                <span class="comment-avatar">
                    <img class="circle" src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&oh=2e5468930f3c7be683b7ed7428b9eaed&oe=5C5E95CB">
                </span>
                    <span class="comment-name">
                    <div class="col s12 comment-customer-name">{{ $comment->customer->name }}</div>
                    <div class="col s12 comment-time">{{ $comment->date }}</div>
                </span>
                    <span class="comment-rate">
                    <span class="ui label">7.2</span>
                </span>
                </div>
                <div class="divider"></div>
                <div class="row comment-content">
                    <div class="comment-content-title">
                        {{ $comment->title }}
                    </div>
                    <div class="comment-content-content">
                        {!! $comment->content !!}
                    </div>
                </div>
                <div class="row comment-image">
                    @foreach($comment->imageComments as $key => $image)
                        @php
                            $count = $comment->imageComments()->count();
                            $margin = '2px';
                            if ($key == 0 || $key == 5) {
                                $margin = '0';
                            }
                            if ($count > 5) {
                                $count = (integer)($count / 2);
                            }
                            $width = 'calc((100% - '.($count - 1).' * 2px) / '.$count.')';
                                @endphp
                        <img onclick="openViewer()" style="width: {{ $width }}; margin: 0 0 2px {{ $margin }}" src="{{ $image->image->link }}">
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach

</div>