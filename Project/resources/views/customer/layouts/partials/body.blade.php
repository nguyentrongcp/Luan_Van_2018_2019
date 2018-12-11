<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="1815873021872788"
     logged_in_greeting="Xin chào! Chúng tôi có thể giúp gì cho bạn?"
     logged_out_greeting="Xin chào! Chúng tôi có thể giúp gì cho bạn?">
</div>

    @php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Request;
        use Gloudemans\Shoppingcart\Facades\Cart;
    header("Cache-Control: no-cache, no-store, must-revalidate");
    @endphp

    @include('customer.layouts.partials.navbar.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('customer.layouts.components.modal.login-modal')
    @if(Auth::guard('customer')->check())
        @include('customer.layouts.components.modal.profile-modal')
    @endif
    @include('customer.layouts.components.modal.style')
    @include('customer.layouts.components.modal.js')

</body>