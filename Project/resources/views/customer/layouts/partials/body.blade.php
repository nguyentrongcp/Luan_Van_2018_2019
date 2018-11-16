<body>

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