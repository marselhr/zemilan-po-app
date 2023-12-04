<!DOCTYPE html>
<html lang="id">

<head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Group-3-capstone">

    <script>
        // Render blocking JS:
        if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
    </script>


    <!-- Libs CSS -->
    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('customCss')
    <style>
        #navbar {
            transition: top 0.75s ease-in-out;
            /* Animasi perubahan posisi */
            position: sticky;
            top: 0;
            /* Sembunyikan navbar ke atas */
            width: 100%;
            z-index: 1000;
            /* Z-index untuk memastikan navbar muncul di atas konten lain */
        }

        .spinner-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: all 0.3s;
        }
    </style>


    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
    <title>Home</title>
</head>

<body style="margin-top: 0px;">
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container px-0">
            <a href="#" class="navbar-brand fw-bold fs-3">Zemilan</a>

            <div class="ms-auto d-flex align-items-center order-lg-3 gap-1">
                <div>
                    <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </a>
                </div>


                @auth
                    <div class="dropdown d-inline-block stopevent">
                        <div class="dropdown ms-2">
                            <a class="rounded-circle" href="#" role="button" id="dropdownUser"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    @if (Auth::user()->avatar == null)
                                        <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-dummy.png') }}"
                                            class="rounded-circle">
                                    @else
                                        <img alt="avatar" src="{{ asset('profile-pictures/' . Auth::user()->avatar) }}"
                                            class="rounded-circle">
                                    @endif
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                <div class="dropdown-item">
                                    <div class="d-flex">
                                        <div class="avatar avatar-md avatar-indicators avatar-online">
                                            @if (Auth::user()->avatar == null)
                                                <img alt="avatar"
                                                    src="{{ asset('assets/images/avatar/avatar-dummy.png') }}"
                                                    class="rounded-circle">
                                            @else
                                                <img alt="avatar"
                                                    src="{{ asset('profile-pictures/' . Auth::user()->avatar) }}"
                                                    class="rounded-circle">
                                            @endif
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class="mb-1">{{ Auth::user()->first_name }}</h5>
                                            <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <ul class="list-unstyled">
                                    
                                </ul>
                                <div class="dropdown-divider"></div>
                                <ul class="list-unstyled">
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="fe fe-power me-2"></i>Keluar
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <div>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar top-bar mt-0"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>

            
        </div>

    </nav>
    <div class="container mb-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                <!-- Card -->
                <div class="card shadow ">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <div class="mb-4">
                            <h1 class="mb-1  fw-bold">Ubah Password</h1>
                        </div>
                        <!-- Form -->
                        <form class="needs-validation" novalidate method="POST"
                            action="{{ route('changePWpost') }}">
                            @csrf

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ Auth::user()->email }}" disabled autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Lama -->
                            <div class="mb-3">
                                <label for="passwordlamaform" class="form-label">Kata Sandi Lama</label>
                                <input id="passwordlamaform" type="password" required class="form-control"
                                    name="passwordlamaform" placeholder="Kata Sandi Lama" required>
                                <div class="invalid-feedback">
                                    Silakhan masukan password lama anda
                                </div>
                            </div>

                            <!-- Password Baru -->
                            <div class="mb-3">
                                <label for="passwordBaru" class="form-label">Kata Sandi Baru</label>
                                <input id="passwordBaru" type="password" class="form-control" name="passwordBaru"
                                    placeholder="Kata Sandi Baru" required>
                                <div class="invalid-feedback">
                                    Silakhan masukan password baru anda
                                </div>
                            </div>

                            <!-- Checkbox -->

                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit"
                                        class="btn btn-primary ">{{ __('Update Password') }}</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('layouts.partials.footer')
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>


</body>

</html>
