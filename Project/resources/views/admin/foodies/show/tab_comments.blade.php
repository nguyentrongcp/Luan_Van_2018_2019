<div class="ui bottom attached tab segment" data-tab="fourth">
    <div class="ui comments">
        @foreach($foodies->backendComments as $comment)
            <div class="comment">

                <a class="avatar"><img src="{{ asset('admin/assets/img/mike.jpg') }}"></a>

                <div class="content">
                    <a class="author">{{ \App\Customer::find($comment->customer_id)->name }}</a>

                    <div class="metadata">
                        <div class="date">{{ $comment->date}}</div>
                        <div class="action">
                            <form action="{{ route('comments.update', [$comment->id]) }}" class="force-inline"
                                  method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="approve" value="{{ ($comment->is_approved + 1) % 2 }}">
                                @if ($comment->approved())
                                    {{--<button class="ui mini orange label pointer">Bỏ duyệt</button>--}}
                                @else
                                    <button class="ui mini green color-white label pointer" onclick="return confirm('Bạn chắc chắn muốn duyệt bình luận này?')">Duyệt</button>
                                @endif
                            </form>

                            <form action="{{ route('comments.destroy', [$comment->id]) }}" class="force-inline"
                                  method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="ui mini red label pointer text-white" onclick="return confirm('Bạn chắc chắn muốn xóa bình luận này?')">Xóa</button>
                            </form>
                        </div>
                    </div>
                    {{--<div class="title"><strong>{{$comment->title}}</strong></div>--}}
                    <div class="text">{!!  $comment->content !!}</div>
                    <div class="ui tiny images">
                        @foreach($comment->imageComments as $imagecoment)
                            @foreach(\App\Image::where('id',$imagecoment->image_id)->get() as $image)
                                <a href="#" onclick="$('{{ '#modal-view-' . $image->id }}').modal('show')">
                                <img class="ui image" src="{{asset($image->link)}}" alt="comment image">
                                </a>

                                <div class="ui basic modal" id="{{ "modal-view-" . $image->id }}">
                                    <i class="close icon" style="color: #fff !important;"></i>
                                    <div class="content">
                                        <img src="{{ asset($image->link) }}" class="ui centered image">
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                    @foreach($comment->miniComments as $child)
                        <div class="comment">
                            <a class="avatar"><img src="{{ asset(\App\Admin::find($child->admin_id)->avatar) }}"></a>
                            <div class="content">
                                @if($child->admin_id != '')
                                    <a class="author">{{ \App\Admin::find($child->admin_id)->name }}</a>
                                    <div class="metadata">
                                        <div class="date">{{$child->date}}</div>
                                        <div class="action">
                                            <form action="{{ route('comments.destroy', [$child->id]) }}"
                                                  class="force-inline" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="ui mini red label pointer text-white">Xóa
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="title"><strong>{{$child->title}}</strong></div>
                                    <div class="text">{{ $child->content }}</div>
                                @endif

                                @if($child->customer_id != '')
                                    <a class="author">{{ \App\Customer::find($child->customer_id)->name }}</a>
                                    <div class="metadata">
                                        <div class="date">{{$child->date}}</div>
                                        <div class="action">
                                            <form action="{{ route('comments.destroy', [$child->id]) }}"
                                                  class="force-inline" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="ui mini red label pointer text-white">Xóa</button>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="title"><strong>{{$child->title}}</strong></div>
                                    <div class="text">{{ $child->content }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach

                    <form class="ui reply tiny form" method="post" action="{{ route('comments.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment-id" value="{{ $comment->id }}">
                        <input type="hidden" name="foody-id" value="{{ $foodies->id }}">
                        {{--<div class="field">--}}
                        {{--<div class="ui right labeled input">--}}
                        {{--<input type="text" name="title" placeholder="Tiêu đề">--}}
                        {{--</div>--}}
                        {{--</div>--}}
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