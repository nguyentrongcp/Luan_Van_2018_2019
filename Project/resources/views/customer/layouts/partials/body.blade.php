<body>

    @php
        use Illuminate\Support\Facades\Auth;
        use Illuminate\Support\Facades\Request;
    @endphp

    @include('customer.layouts.components.login')
    @include('customer.layouts.partials.navbar')

    <div class="container">
        @yield('content')
    </div>

</body>