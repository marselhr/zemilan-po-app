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
                                {{ $user->first_name . $user->last_name }}
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
        <div class="col-12">
            <!-- Card -->
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <h3 class="mb-0">Detail Profil Pengguna</h3>
                    <p class="mb-0">Anda sepenuhnya memiliki kendali atas pengaturan akun pengguna.</p>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                            <img src="{{ asset('assets/images/avatar/avatar-dummy.png') }}" id="img-uploaded"
                                class="avatar-xl rounded-circle" alt="avatar" />
                            <div class="ms-3">
                                <h4 class="mb-0">Your avatar</h4>
                                <p class="mb-0">PNG or JPG no bigger than 800px wide and tall.</p>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="btn btn-outline-secondary btn-sm">Update</a>
                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                        </div>
                    </div>
                    <hr class="my-5" />
                    <div>
                        <h4 class="mb-0">Personal Details</h4>
                        <p class="mb-4">Edit your personal information and address.</p>
                        <!-- Form -->
                        <form class="row gx-3 needs-validation" novalidate>
                            <!-- First name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control" placeholder="First Name"
                                    value="{{ $user->first_name }}" required />
                                <div class="invalid-feedback">Please enter first name.</div>
                            </div>
                            <!-- Last name -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control" placeholder="Last Name"
                                    value="{{ $user->last_name }}" required />
                                <div class="invalid-feedback">Please enter last name.</div>
                            </div>
                            <!-- Phone -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control" placeholder="Phone" required />
                                <div class="invalid-feedback">Please enter phone number.</div>
                            </div>
                            <!-- Address -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="address">Address Line </label>
                                <input type="text" id="address" class="form-control" placeholder="Address"
                                    required />
                                <div class="invalid-feedback">Please enter address.</div>
                            </div>
                            <div class="col-12">
                                <!-- Button -->
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
