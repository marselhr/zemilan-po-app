<nav class="navbar navbar-expand-lg">
    <div class="container px-0">
        <a href="#" class="navbar-brand fw-bold fs-3">Zemilan</a>
        
        <!-- Mobile view nav wrap -->
        <div class="ms-auto d-flex align-items-center  order-lg-3">

            <!-- Theme toggle -->
            <div>
                <a href="#" class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </a>
            </div>
            <!-- Theme toggle -->

            @auth
                <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
                    <li class="dropdown d-inline-block stopevent position-static">
                        <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
                            href="#" role="button" id="dropdownNotificationSecond" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fe fe-bell"> </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
                            aria-labelledby="dropdownNotificationSecond">
                            <div>
                                <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                    <span class="h4 mb-0">Notifications</span>
                                    <a href="# " class="text-muted">
                                        <span class="align-middle">
                                            <i class="fe fe-settings me-1"></i>
                                        </span>
                                    </a>
                                </div>
                                <!-- List group -->
                                <ul class="list-group list-group-flush" data-simplebar style="max-height: 300px;">
                                    <li class="list-group-item bg-light">
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-body" href="#">
                                                    <div class="d-flex">
                                                        <div class="ms-3">
                                                            <h5 class="fw-bold mb-1">Promo</h5>
                                                            <p class="mb-3">
                                                                Wow ada promo untuk keripik udang
                                                            </p>
                                                            <span class="fs-6 text-muted">2
                                                                jam yang lalu,</span>
                                                            <span class="ms-1">2:19 PM</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-auto text-center me-2">
                                                <a href="#" class="badge-dot bg-info" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Mark as read">
                                                </a>
                                                <div>
                                                    <a href="#" class="bg-transparent" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Remove">
                                                        <i class="fe fe-x text-muted"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item bg-light">
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-body" href="#">
                                                    <div class="d-flex">
                                                        <div class="ms-3">
                                                            <h5 class="fw-bold mb-1">Dalam Perjalanan</h5>
                                                            <p class="mb-3">
                                                                Pesanan keripik udangmu sudah diserahkan ke kurir
                                                            </p>
                                                            <span class="fs-6 text-muted">2
                                                                jam yang lalu,</span>
                                                            <span class="ms-1">2:19 PM</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-auto text-center me-2">
                                                <a href="#" class="badge-dot bg-info" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Mark as read">
                                                </a>
                                                <div>
                                                    <a href="#" class="bg-transparent" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Remove">
                                                        <i class="fe fe-x text-muted"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="border-top px-3 pt-3 pb-0">
                                    <a href="#" class="text-link fw-semibold">
                                        Lihat Semua
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- Component Show if user auth -->
                    <li class="dropdown ms-2">
                        <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-dummy.png') }}"
                                    class="rounded-circle">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img alt="avatar" src="{{ asset('assets/images/avatar/avatar-dummy.png') }}"
                                            class="rounded-circle">
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1">{{ Auth::user()->first_name }}</h5>
                                        <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
                                    </div>
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
                            </ul>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">

                                            <i class="fe fe-power me-2"></i>Sign Out
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
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
            <ul class="navbar-nav  d-flex gap-lg-6 justify-content-start">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
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

            <div class="me-lg-2 d-lg-flex gap-3 mt-3 mt-lg-0">
                <a href="{{ route('login') }}" class="btn btn-outline-primary col-12 col-lg-auto">Sign in</a>
                <a href="{{ route('register') }}" class="btn btn-primary col-12 col-lg-auto mt-2 mt-lg-0">Sign up</a>
            </div>
        </div>


    </div>
</nav>
