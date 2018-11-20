<div class="row comment section scrollspy" id="comment-container">

    @foreach($foody->comments()->where('is_approved', 1)->get() as $stt => $comment)
        <div id="comment-row-{{ $comment->id }}" class="col s12 white content">
            <div class="row comment">
                <div class="row comment-title">
                    <span class="comment-avatar">
                        <img class="circle" src="{{ asset($comment->customer->avatar) }}">
                    </span>
                    <span class="comment-name">
                        <div class="col s12 comment-customer-name">{{ $comment->customer->name }}</div>
                        <div class="col s12 comment-time">
                            {{ date_format(date_create($comment->date), 'd-m-Y H:i') }}</div>
                    </span>
                        {{--<span class="comment-rate">--}}
                        {{--<span class="ui label">7.2</span>--}}
                    {{--</span>--}}
                    @if($logged == 'true')
                        @if($comment->customer->id == Auth::guard('customer')->user()->id)
                            <span class="right">
                                <i style="cursor: pointer" data-id="{{ $comment->id }}" data-type="comment"
                                   class="material-icons right comment-delete">delete_forever</i>
                            </span>
                        @endif
                    @endif
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
                        <img class="{{ $stt }}-comment-image" onclick="openViewer($('.{{ $stt }}-comment-image'), {{ $key }})"
                             style="width: {{ $width }}; margin: 0 0 2px {{ $margin }}" src="{{ $image->image->link }}">
                    @endforeach
                </div>
                <div class="row comment-footer-container">
                    @if($comment->miniComments()->count() > 0)
                        <div id="mini-comment-{{ $comment->id }}" style="display: inline-block">
                            @foreach($comment->miniComments as $comment_child)
                                <div class="col comment-comment-container">
                                <span class="comment-avatar">
                                    @if($comment_child->customer_id != null)
                                        <img class="circle" src="{{ asset($comment_child->customer->avatar) }}">
                                    @else
                                        <img class="circle" src="{{ asset($comment_child->admin->avatar) }}">
                                    @endif
                                </span>
                                    <div class="col comment-comment-content-container">
                                        @if($comment_child->customer_id != null)
                                            <span class="comment-comment-name"><b>{{ $comment_child->customer->name }}</b></span>
                                        @else
                                            <span class="comment-comment-name"><b>{{ $comment_child->admin->name }}
                                                    <span class="blue-text">Quản trị viên</span></b></span>
                                        @endif
                                        <span id="comment-comment-content">{{ $comment_child->content }}</span>
                                    </div>
                                    {{--<span class="right"><i class="material-icons right">delete_forever</i></span>--}}
                                    <span class="col comment-comment-time-container">
                                    {{ date_format(date_create($comment_child->date), 'd-m-Y H:i:s') }}
                                        @if($logged == 'true')
                                            @if($comment_child->customer_id == Auth::guard('customer')->user()->id)
                                                <span data-id="{{ $comment_child->id }}" class="delete-mini-comment"
                                                      style="cursor: pointer; margin-left: 10px;font-weight: 500">Xóa</span>
                                            @endif
                                        @endif
                                </span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if($logged == 'true')
                        <div class="col comment-comment-container" style="width: 100%">
                            <span class="comment-avatar">
                                <img class="circle" src="https://scontent.fsgn5-4.fna.fbcdn.net/v/t1.0-9/29244095_2127623837457107_1960178588228106477_n.jpg?_nc_cat=102&oh=2e5468930f3c7be683b7ed7428b9eaed&oe=5C5E95CB">
                            </span>
                            <div class="col comment-comment-content-container">
                                <div class="input-field col s12">
                                    <textarea style="margin-bottom: 0; font-size: 12px"
                                          class="materialize-textarea mini-comment" data-id="{{ $comment->id }}" placeholder="Bình luận..."></textarea>
                                    </div>
                            </div>
                        </div>
                    @else
                        <p style="font-size: 12px; display: inline-block"><i style="font-size: 17px" class="material-icons left">lock</i>
                            Hãy đăng nhập để tham gia bình luận cho bài viết này</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    @include('customer.layouts.components.modal.confirm-modal')
</div>