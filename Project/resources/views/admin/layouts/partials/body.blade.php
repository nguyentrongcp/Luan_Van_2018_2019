<body class="">
<div class="wrapper ">

    @include('admin.layouts.partials.sidebar')
    <div class="main-panel">

        @include('admin.layouts.partials.navbar')
        <div class="panel-header panel-header-sm">
            <canvas id="bigDashboardChart"></canvas>
        </div>
        @include('admin.layouts.components.success')
        @include('admin.layouts.components.error')
        @yield('content')
        @include('admin.layouts.partials.footer')
    </div>
</div>

@include('admin.layouts.partials.scripting')
</body>