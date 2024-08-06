<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>{{ trans('panel.site_title') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/fontawesome.css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/tabler-icons.css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/fonts/flag-icons.css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/css/demo.css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/node-waves/node-waves.css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.css" />
      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/libs/@form-validation/form-validation.css" />

      <link rel="stylesheet" href="{{ asset('/') }}assets/vendor/css/pages/page-auth.css" />
  
      <script src="{{ asset('/') }}assets/vendor/js/helpers.js"></script>
      <script src="{{ asset('/') }}assets/js/config.js"></script>
      @livewireStyles
    @stack('styles')
</head>

<body>

    <div class="container-xxl">
        @yield('content')
    </div>
  
    @livewireScripts
        <script src="{{ asset('/') }}assets/vendor/libs/jquery/jquery.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/popper/popper.js"></script>
        <script src="{{ asset('/') }}assets/vendor/js/bootstrap.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/hammer/hammer.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/i18n/i18n.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="{{ asset('/') }}assets/vendor/js/menu.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/@form-validation/popular.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/@form-validation/bootstrap5.js"></script>
        <script src="{{ asset('/') }}assets/vendor/libs/@form-validation/auto-focus.js"></script>
        <script src="{{ asset('/') }}assets/js/main.js"></script>
        @yield('scripts')
        @stack('scripts')

            
</body>

</html>