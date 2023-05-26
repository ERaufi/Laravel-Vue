<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dashboard - Atrana</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-5.1.3/css/bootstrap.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome6.1.1/css/all.css') }}">
    <!-- Boxicons CSS-->
    <link rel="stylesheet" href="{{ asset('assets/modules/boxicons/css/boxicons.min.css') }}">
    <!-- Apexcharts  CSS -->
    <link rel="stylesheet" href="{{ asset('assets/modules/apexcharts/apexcharts.css') }}">
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        @if (Request::path() === 'register' || Request::path() === 'login')
            @yield('content')
        @else
            <!--Topbar -->
            @include('layouts.Navbar')

            <!--Sidebar-->
            @include('layouts.Sidebar')
            <!-- End Sidebar-->


            <div class="sidebar-overlay"></div>


            <!--Content Start-->
            <div class="content-start transition">
                @yield('content')
            </div>


            <!-- Footer -->
            @include('layouts.Footer')


            <!-- Preloader -->
            <div class="loader">
                <div class="spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        @endif
    </div>
    <!-- Loader -->
    <div class="loader-overlay"></div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/atrana.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper/popper.min.js') }}"></script>

    <!-- Chart Js -->
    {{-- <script src="{{ asset('assets/modules/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/ui-apexcharts.js') }}"></script> --}}

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
