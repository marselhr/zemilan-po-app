<!DOCTYPE html>
<html lang="en">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Codescandy">

    <script>
        // Render blocking JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
    </script>


    <!-- Libs CSS -->
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        #navbar {
            transition: top 0.3s ease;
            /* Animasi perubahan posisi */
            position: sticky;
            top: 0;
            /* Sembunyikan navbar ke atas */
            width: 100%;
            z-index: 1000;
            /* Z-index untuk memastikan navbar muncul di atas konten lain */
        }
    </style>


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <main>
        @if (
            !Request::routeIs('login') &&
                !Request::routeIs('register') &&
                !Request::routeIs('verification.notice') &&
                !Request::routeIs('password.request') &&
                !Request::routeIs('password.reset'))
            @include('layouts.partials.navbar')
        @endif


        @yield('content')
    </main>

    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>


    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>

    <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/tnsSlider.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/tooltip.js') }}"></script>
    <script>
        var prevScrollpos = window.pageYOffset; /* Mengambil posisi scroll sebelumnya */

        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0"; /* Munculkan navbar saat scroll ke atas */
            } else {
                document.getElementById("navbar").style.top =
                    "-100px"; /* Sembunyikan navbar ke atas saat scroll ke bawah */
            }
            prevScrollpos = currentScrollPos;
        };
    </script>

</body>

</html>
