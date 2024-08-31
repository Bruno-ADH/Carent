<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Car Rental</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield('csrf')


    <!-- Favicon -->
    <link href="/assets/fontawesome/svgs/solid/carent.svg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    {{-- <link href="{{ asset('/assets/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet"> --}}
    <link href="/assets/fontawesome/css/all.min.css" rel="stylesheet">
    <link href="/assets/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    {{-- <link href="{{ asset('/assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet"> --}}
    <link href="/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="/assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    {{-- <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet"> --}}
    <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    @include('parts.topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('parts.navbar')
    <!-- Navbar End -->


    @yield('header')

    @yield('content')


    <!-- Footer Start -->
    @include('parts.footer')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('/assets/fontawesome/js/all.min.js')}}"></script>
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/assets/lib/lightbox/js/lightbox.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>
