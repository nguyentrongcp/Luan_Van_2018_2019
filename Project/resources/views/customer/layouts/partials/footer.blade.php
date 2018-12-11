{{--<footer>--}}
    {{--<div class="row blue-grey darken-4">--}}
        {{--<div class="container">--}}
            {{--<div class="col s12 m12 l4" style="padding: 20px 10px 20px 0">--}}
                {{--<iframe class="z-depth-1" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFastfoodyvn---}}
            {{--Th%25E1%25BB%25A9c-%25C4%2583n-nhanh-ngon-ti%25E1%25BB%2587n-l%25E1%25BB%25A3i-260893111234023%2F%3Fmodal%3--}}
            {{--Dadmin_todo_tour&tabs&width=340&height=196&small_header=false&adapt_container_width=true&hide_cover=false&s--}}
            {{--how_facepile=true&appId"--}}
                        {{--width="340" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0"--}}
                        {{--allowTransparency="true" allow="encrypted-media"></iframe>--}}
            {{--</div>--}}
            {{--<div class="col s12 m12 l4" style="padding: 20px 10px 20px 0">--}}
                {{--<iframe class="z-depth-1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d207443.7928317165!2d139.601--}}
                {{--29408485906!3d35.66938631031498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188b857628235d--}}
                {{--%3A0xcdd8aef709a2b520!2sTokyo%2C+Japan!5e0!3m2!1sen!2s!4v1538237936793" width="400" height="200"--}}
                        {{--frameborder="0" style="border:0" allowfullscreen></iframe>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}
<footer>

    <div id="footer-container" class="row blue-grey lighten-3">
        <div class="container">
            <div class="col s12 m12 l4">
                <div class="col s10 footer-col">
                    <div class="col s12 footer-title">
                        <b>Thông tin cửa hàng</b>
                    </div>
                    @foreach(\App\ShopInfo::all() as $info)
                        <div><b>Tên cửa hàng:</b> {{ $info->name }}</div>
                        <div><b>Địa chỉ:</b> {{ $info->address }}</div>
                        <div><b>Số điện thoại:</b> {{ $info->phone }}</div>
                        <div><b>Email:</b> {{ $info->email }}</div>
                    @endforeach
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="col s12 center-align footer-col">
                    <img class="responsive-img teal circle" src="{{ asset('/customer/image/logo-white.png') }}">
                </div>
                <div class="center-align">
                    © 2018 FastFoody - A Foody Corporation
                </div>
                <div style="margin-top: 10px" class="center-align">
                    Tham gia fanpage của chúng tôi:
                    <a style="color: unset" target="_blank" href="https://www.facebook.com/Fastfoodyvn-Th%E1%BB%A9c-%C4%83n-nhanh-giao-h%C3%A0ng-t%E1%BA%ADn-n%C6%A1i-1815873021872788/?modal=admin_todo_tour">
                        <i class="facebook large icon" style="vertical-align: sub"></i></a>
                </div>
            </div>
            <div class="col s12 m12 l4">
                <div class="col s10 right right-align footer-col">
                    <div class="col s12 footer-title">
                        <b>Chúng tôi cam kết</b>
                    </div>
                    <div>Thức ăn ngon, nhanh, giá rẻ...</div>
                    <div>Giao hàng tận nơi</div>
                    <div>Miễn phí với các đơn hàng trên 400k</div>
                    <div>Một món cũng giao hàng</div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    #footer-container {
        margin-top: 30px;
        padding-bottom: 30px;
        font-size: 14px;
    }
    .footer-col div {
        margin-bottom: 15px;
    }
    .footer-title {
        margin-top: 30px;
        font-size: 18px;
    }
    .footer-col img {
        height: 100px !important;
        width: 100px !important;
        margin: 30px 0 20px 0 !important;
    }
</style>

{{--<style>--}}
    {{--#footer-container {--}}
        {{--margin: 0;--}}
    {{--}--}}
{{--</style>--}}

    <script src="{{ asset('/customer/js/jquery-3.3.1.min.js') }}"></script>

    <!--JavaScript at end of body for optimized loading-->
    <script src="{{ asset('/customer/js/materialize.min.js') }}"></script>

    <script src="{{ asset('/customer/js/rating.min.js') }}"></script>
    <script src="{{ asset('/customer/js/countdown.min.js') }}"></script>
    <script src="{{ asset('/customer/semantic/dimmer.min.js') }}"></script>
    <script src="{{ asset('/customer/semantic/transition.min.js') }}"></script>
    <script src="{{ asset('/customer/js/md5.js') }}"></script>
    <script src="{{ asset('/customer/js/jquery.backDetect.min.js') }}"></script>
    {{--<script src="/customer/semantic/dropdown.min.js"></script>--}}
    <script src="{{ asset('/customer/js/numeral.js') }}"></script>

    <script src="{{ asset('/customer/js/custom.js') }}"></script>

    @stack('script')