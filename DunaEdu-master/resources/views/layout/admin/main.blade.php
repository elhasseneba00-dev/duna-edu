<!DOCTYPE html>
<html lang="en">
@include('layout.admin.head')

<body class="index-page">

    @include('layout.admin.header')

    <main class="main">

        @yield('content')

    </main>

    @include('layout.admin.footer')
    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.5/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.7/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.7/js/responsive.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/2.3.5/i18n/fr-FR.json"></script>
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        var table = new DataTable('#example', {
            language: {
                url: 'https:///cdn.datatables.net/plug-ins/2.3.5/i18n/fr-FR.json',
            },
            responsive: true
        });
    </script>
</body>

</html>
