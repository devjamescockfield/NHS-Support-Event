<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>EventCMS</title>
    <meta charset="utf-8">
    <meta name="description" content="Infinite Truckers, a Multiplayer experience for truckers for SCS Software's Euro Truck Simulator 2.">
    <meta name="keywords" content="Infinite Truckers, IFMP, ETS2, SCS, Euro Truck Simulator 2, MP">
    <meta name="author" content="Infinite Truckers Development Team">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('admin/js/jquery-autoResize.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700%7CHind+Madurai:400,500&amp;subset=latin-ext">
    <link href="{{ asset('admin/fontawesome/css/all.css') }}" rel="stylesheet"> <!--load all styles -->

    <!-- include summernote css/js -->
    <link href="{{ asset('admin/css/summernote.css') }}" rel="stylesheet">
    <script src="{{ asset('admin/js/summernote.js') }}"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/customIcons.css') }}" />
    @yield('styles')

    <script>
        $(document).ready(function () {
            $("#alert").fadeTo(6000, 500).slideUp(500, function () {
                $("#alert").slideUp(500);
            });
        });
    </script>
    <script>
        $(function() {
            $("body").niceScroll({
                cursorcolor: "#343a40",
                cursorwidth: "10px",
                cursorborder: "1px solid #828283",
                hwacceleration: true,
            });
        });
    </script>
    <script language="javascript" src="{{ asset('admin/js/jquery.nicescroll.js') }}"></script>
    @stack('styles')
</head>
<body>
<div id="app">

    @include('layouts.nav.admin-main-nav')
    <main class="py-4">
        @yield('content')
    </main>

    @include('layouts.footer.admin-footer')
</div>
</body>
</html>
