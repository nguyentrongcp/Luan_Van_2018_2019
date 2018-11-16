<div href="" class="ui dropdown icon item" id="comment">
    <i class="comments icon"></i>
    @php $totalComment = \App\Dashboard::totalCommentNotApproved(); @endphp
    @if (!empty($totalComment))
        <span class="ui small floating red circular label" style="top:-0.168em!important; font-size: 0.659rem!important;">{{ $totalComment }}</span>
    @endif
    <div class=" ui list menu" >
        @foreach(\App\Comment::getUnapprovedComments() as $comment)
            <a href="{{ route('foodies.show', [$comment->foody_id]) }}" class="item">
                <span class="ui mini red label">Mới</span>{{ $comment->title }} vừa bình luận
            </a>
        @endforeach
    </div>
</div>

@push('script')
    <script>
        $('#comment').on('click',function () {
            $('.ui.list.menu').addClass('list-comment');
        })
    </script>
    @endpush
<style>
    .list-comment{
        position: absolute;
        z-index: 100;
        display: block;
        /*top: 236px;*/
        max-height: 500px !important;
        margin-bottom: 0 !important;
        background-color: white;
        overflow: scroll;
    }
</style>