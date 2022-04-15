<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('seo-meta')
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="{{ asset('assets/css/css2.css?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap') }}" rel="stylesheet">
    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/tiny-slider/tiny-slider.css') }}">
    <!-- Theme CSS -->
    <link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    @yield('custom-style')
</head>

<body>

<!-- =======================
Header START -->
@include('template.includes.header')
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>
    @yield('content')
</main>
<!-- **************** MAIN CONTENT END **************** -->
<!-- ======================= Footer START ======================= -->
@include('template.includes.footer')
<!-- ======================= Footer END ======================= -->
<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>
<!-- ======================= JS libraries, plugins and custom scripts ======================= -->
<!-- Bootstrap JS -->
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- Vendors -->
<script src="{{ asset('assets/vendor/tiny-slider/tiny-slider.js') }}"></script>
<!-- Template Functions -->
<script src="{{ asset('assets/js/functions.js') }}"></script>
@yield('custom-script')
</body>

</html>
