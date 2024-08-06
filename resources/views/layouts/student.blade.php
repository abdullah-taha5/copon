<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocaleRegional() }}"
    class="light-style layout-navbar-fixed layout-menu-fixed "
    dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" data-theme="theme-default"
    data-assets-path="{{ asset('/assets') }}/" data-template="vertical-menu-template">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <title>{{ trans('panel.site_title') }} @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/') }}assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/vendor/libs/select2/select2.css') }}" rel="stylesheet" />

    @if (LaravelLocalization::getCurrentLocaleScript() == 'Latn')
        <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/core.css" />
        <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/theme-default.css" />
    @else
        <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/core.css" />
        <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/theme-default.css" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/demo.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="{{ asset('/') }}assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('/') }}assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/') }}assets/js/config.js"></script>
    <link rel="stylesheet" href="{{ asset('css/marketopia.css') }}" />
    @livewireStyles
    @stack('styles')
    
</head>

<body>


    <noscript>You need to enable JavaScript to run this app.</noscript>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <x-sidebar />
            <div class="layout-page">
                <x-nav />
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @if (session('success'))
                            <div class="alert alert-success mb-1" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger mb-1" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        @yield('content')
                    </div>
                    <x-footer />
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
        <div class="drag-target"></div>
    </div>


    @livewireScripts
    <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('/') }}assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('/') }}assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/') }}assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('/') }}assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/') }}assets/js/main.js"></script>

    @yield('scripts')
    @stack('scripts')

</body>

</html>
