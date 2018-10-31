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
    @include('customer.layouts.components.modal.style')
    @include('customer.layouts.components.modal.js')

</body>