@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.user.index') }}">User</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail User</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <!-- Bg -->
            <div class="rounded-top"
                style="background: url({{ asset('assets/images/background/profile-bg.jpg') }}) no-repeat; background-size: cover; height: 100px">
            </div>
            <div class="card px-4 pt-2 pb-4 shadow-sm rounded-top-0 rounded-bottom-0 rounded-bottom-md-2">
                <div class="d-flex align-items-end justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
                            <img src="{{ asset('assets/images/avatar/avatar-dummy.png') }}"
                                class="avatar-xl rounded-circle border border-4 border-white" alt="avatar" />
                        </div>
                        <div class="lh-1">
                            <h2 class="mb-0">
                                {{ $user->first_name . ' ' . $user->last_name }}
                                <a href="#" class="" data-bs-toggle="tooltip" data-placement="top"
                                    title="Beginner">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE">
                                        </rect>
                                        <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9">
                                        </rect>
                                        <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9">
                                        </rect>
                                    </svg>
                                </a>
                            </h2>
                            <p class="mb-0 d-block">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-0 mt-md-4">
        <div class="col-lg-3 col-md-4 col-12">
            <!-- Side navbar -->
            <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
                <!-- Menu -->
                <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
                <!-- Button -->
                <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
                    data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fe fe-menu"></span>
                </button>
                <!-- Collapse navbar -->
                <div class="collapse navbar-collapse" id="sidenav">
                    <div class="navbar-nav flex-column">
                        <span class="navbar-header">Account Settings</span>
                        <!-- List -->
                        <ul class="list-unstyled ms-n2 mb-0">
                            <!-- Nav item -->
                            <li class="nav-item {{ Request::routeIs('admin.user.show') ? 'active' : '' }}">
                                <a class="nav-link " href="profile-edit.html">
                                    <i class="fe fe-user nav-icon"></i>
                                    Detail Profile
                                </a>
                            </li>
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="profile-edit.html">
                                    <i class="fe fe-settings nav-icon"></i>
                                    Edit Profil
                                </a>
                            </li>
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="delete-profile.html">
                                    <i class="fe fe-trash nav-icon"></i>
                                    Delete Profile
                                </a>
                            </li>
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="linked-accounts.html">
                                    <i class="fe fe-user nav-icon"></i>
                                    Linked Accounts
                                </a>
                            </li>
                        </ul>
                        <span class="navbar-header">Pembayaran</span>
                        <!-- List -->
                        <ul class="list-unstyled ms-n2 mb-4">
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link" href="payment-method.html">
                                    <i class="fe fe-credit-card nav-icon"></i>
                                    Payment
                                </a>
                            </li>
                            <!-- Nav item -->
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('admin.user.show.invoice', $user) }}">
                                    <i class="fe fe-clipboard nav-icon"></i>
                                    Invoice
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-9 col-md-8 col-12">
            <!-- Card -->

            @yield('card')

        </div>
    </div>
@endsection
