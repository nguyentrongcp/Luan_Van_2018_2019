<div href="" class="ui dropdown icon item scrolling">
    <i class="comments icon"></i>
    @php $totalComment = \App\Dashboard::totalCommentNotApproved(); @endphp
    @if (!empty($totalComment))
        <span class="ui small floating red circular label">{{ $totalComment }}</span>
    @endif
    <div class="menu ">
        @foreach(\App\Comment::getUnapprovedComments() as $comment)
            <a href="{{ route('foodies.show', [$comment->foody_id]) }}" class="item">
                <span class="ui mini red label">Mới</span>{{ $comment->title }} vừa bình luận
            </a>
        @endforeach
    </div>
</div>