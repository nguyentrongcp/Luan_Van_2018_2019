<div class="ui bottom attached tab segment" data-tab="third">
    <div class="ui comments">
        @foreach($foodies->backendComments as $comment)
            <div class="comment">

                <a class="avatar"><img src="{{ asset('admin/assets/img/mike.jpg') }}"></a>

                <div class="content">
                    <a class="author">{{ \App\Customer::find($comment->customer_id)->name }}</a>

                    <div class="metadata">
                        <div class="date">{{ $comment->date}}</div>
                        <div class="action">
                            <form action="{{ route('comments.update', [$comment->id]) }}" class="force-inline" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="approve" value="{{ ($comment->is_approved + 1) % 2 }}">
                                @if ($comment->approved())
                                    <button class="ui mini orange label pointer">Bỏ duyệt</button>
                                @else
                                    <button class="ui mini green color-white label pointer">Duyệt</button>
                                @endif
                            </form>

                            <form action="{{ route('comments.destroy', [$comment->id]) }}" class="force-inline" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="ui mini red label pointer text-white">Xóa</button>
                            </form>
                        </div>
                    </div>
                    <div class="title"><strong>{{$comment->title}}</strong></div>
                    <div class="text">{{ $comment->content }}</div>
                    <div class="card-image">
                        @foreach(\App\Image::where($comment->image_id) as $image)
                        <img src="{{asset($image->link)}}" alt="comment image">
                            @endforeach
                    </div>
                    @foreach($comment->children as $child)
                        <div class="comment">
                            <a class="avatar"><img src="{{ asset('assets/images/uploaded/avt/dolphin.png') }}"></a>
                            <div class="content">
                                <a class="author">{{ $child->name }}</a>

                                <div class="metadata">
                                    <div class="date">{{$child->date}}</div>
                                    <div class="action">
                                        <form action="{{ route('comments.destroy', [$child->id]) }}" class="force-inline" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="ui mini red label pointer text-white">Xóa</button>

                                        </form>
                                    </div>
                                </div>
                                <div class="title"><strong>{{$child->title}}</strong></div>
                                <div class="text">{{ $child->content }}</div>
                            </div>
                        </div>
                    @endforeach

                    <form class="ui reply tiny form" method="post" action="{{ route('comments.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="parent" value="{{ $comment->id }}">
                        <input type="hidden" name="foody-id" value="{{ $foodies->id }}">
                        <div class="field">
                            <div class="ui right labeled input">
                                <input type="text" name="title" placeholder="Tiêu đề">
                            </div>
                        </div>
                        <div class="field right">
                            <textarea name="content" placeholder="Nội dung"></textarea>
                        </div>
                        <button type="submit" class="ui mini blue right icon button">
                            <i class="icon edit"></i> Trả lời
                        </button>
                    </form>
                </div>
            </div>
            <div class="ui divider small-td-margin"></div>
        @endforeach
    </div>
</div>