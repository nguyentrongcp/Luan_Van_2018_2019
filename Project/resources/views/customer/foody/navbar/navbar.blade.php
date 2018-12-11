<div id="foody-scrollspy-container" class="col s2 hide-on-small-only foody-scrollspy-container">
    <ul class="section table-of-contents foody-scrollspy">
        <li><a href="#foody-info">Thông tin</a></li>
        @if(count($images) != 0)
            <li><a href="#foody-images-container">Hình ảnh</a></li>
        @endif
        @if($foody->comments()->count() > 0)
            <li><a href="#comment-container">Bình luận</a></li>
        @endif
        <li><a href="#involve-foody-container">Cùng loại</a></li>
    </ul>
    {{--<div class="slider-ads-portrait">--}}
        {{--<img src="/customer/image/slider-ads2.jpg">--}}
    {{--</div>--}}
</div>

@include('customer.foody.navbar.style')
@include('customer.foody.navbar.js')