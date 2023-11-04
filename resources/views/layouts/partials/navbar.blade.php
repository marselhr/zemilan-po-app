<nav class="navbar navbar-expand-lg">
    <div class="container px-0">
        <a href="#" class="navbar-brand fw-bold fs-3">Zemilan</a>

        <!-- Mobile view nav wrap -->
        <div class="ms-auto d-flex align-items-center order-lg-3 gap-1">
            <!-- Theme toggle -->
            <div>
                <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </a>
            </div>
            <!-- Theme toggle -->
            @auth
                <!-- Profile dropdown for authenticated users -->
                <div class="dropdown d-inline-block stopevent position-static">
                    <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary" href="#"
                        role="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fe fe-user"> </i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
                        aria-labelledby="dropdownProfile">
                        <div>
                            <div class="d-flex border-bottom px-3 pb-3 align-items-center gap-4">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-dummy.png') }}"
                                        class="rounded-circle">
                                </div>
                                <div>
                                    <h5 class="mb-1">{{ Auth::user()->first_name }}</h5>
                                    <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-user me-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-settings me-2"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fe fe-power me-2"></i> Sign Out
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
            <!-- Hamburger Button -->
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse gap-5 flex justify-content-between" id="navbar-default">
            <!-- Your navigation links -->
            <ul class="navbar-nav d-flex gap-lg-6 justify-content-start">
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}"
                        class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}">About</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">FAQ</a>
                </li>
            </ul>
            <form class="mt-3 me-lg-5 mt-lg-0 ms-lg-3 d-flex align-items-center">
                <span class="position-absolute ps-3 search-icon">
                    <i class="fe fe-search"></i>
                </span>
                <input type="search" class="form-control ps-6" placeholder="Cari...">
            </form>
            @guest
                <!-- Link to sign up and sign in for guest users -->
                <div class="me-lg-2 d-lg-flex gap-3 mt-3 mt-lg-0">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary col-12 col-lg-auto">Sign in</a>
                    <a href="{{ route('register') }}" class="btn btn-primary col-12 col-lg-auto mt-2 mt-lg-0">Sign up</a>
                </div>
            @endguest
        </div>
    </div>
</nav>
