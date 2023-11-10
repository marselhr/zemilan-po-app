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
            @auth
                <div class="dropdown " aria-labelledby="dropdownCart">
                    <a href="{{ route('buyer.cart') }}" class="btn btn-icon btn-light rounded-circle"><i
                            class="fe fe-shopping-cart align-middle"></i><span
                            class="badge bg-info">{{ \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count() }}
                        </span></a>

                    <div class="dropdown-menu dropdown-menu-end" style="min-width: 300px;">
                        <div class="col-12 p-4">
                            <ul class="list-unstyled col-12">
                                @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                    <li class="d-flex flex-wrap">
                                        <div class=" col-9">
                                            <h5 class="">{{ $item->name }} </h5>
                                            <p>{{ $item->qty }} x <span class="price">Rp
                                                    {{ number_format($item->price, 0, ',', '.') }}</span></p>
                                        </div>

                                        <div class="d-flex justify-content-end col-3">

                                            <button class="btn  delete-button" type="button" data-id="{{ $item->rowId }}">
                                                <i class="fe fe-trash-2"></i>
                                            </button>
                                        </div>
                                    </li>
                                    <div class="dropdown-divider"></div>
                                @endforeach
                            </ul>
                            <div>
                                <div class="d-flex justify-content-between">
                                    <p>Total: </p>
                                    <p>Rp {{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</p>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap">

                                <div class="col-6 p-1">
                                    <a href="{{ route('buyer.cart') }}" class=" btn btn-info col-12">Keranjang</a>
                                </div>

                                <div class=" col-6 p-1">
                                    <button class="btn btn-primary col-12">Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
            <!-- Theme toggle -->
            @auth
                <!-- Profile dropdown for authenticated users -->
                <div class="dropdown d-inline-block stopevent ">

                    <div class="dropdown ms-2">
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
                                    <a class="dropdown-item" href="{{ route('mainprofile') }}">
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
