@extends('admin.pages.manajemen-user.show-detail.index')


@section('card')
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
                <form class="row gx-3 needs-validation" novalidate action="{{ route('admin.user.update', $user) }}"
                    method="post">
                    @csrf
                    <!-- First name -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="fname">First Name</label>
                        <input type="text" id="fname" class="form-control" placeholder="First Name"
                            value="{{ $user->first_name }}" required name="first_name" />
                        <div class="invalid-feedback">Please enter first name.</div>
                    </div>
                    <!-- Last name -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="lname">Last Name</label>
                        <input type="text" id="lname"
                            class="form-control {{ $errors->has('last_name') ? 'invalid' : '' }}" placeholder="Last Name"
                            value="{{ $user->last_name }}" name="last_name" />
                        @error('last_name')
                            <div class="invalid-feedback">{{ $error->last_name }}</div>
                        @enderror
                    </div>
                    <!-- Phone -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" placeholder="Phone" name="phone_number"
                            value="{{ $user->phone_number }}" required />
                        <div class="invalid-feedback">Please enter phone number.</div>
                    </div>
                    {{-- <!-- Address -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="address">Address Line </label>
                        <input type="text" id="address" class="form-control" placeholder="Address" required />
                        <div class="invalid-feedback">Please enter address.</div>
                    </div> --}}
                    <div class="col-12">
                        <!-- Button -->
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
