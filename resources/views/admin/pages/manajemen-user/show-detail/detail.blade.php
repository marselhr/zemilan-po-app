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
                    <img src="{{ $user->avatar ? asset('images/' . $user->avatar) : asset('assets/images/avatar/avatar-dummy.png') }}"
                        id="img-uploaded" class="avatar-xl rounded-circle" alt="avatar" />
                </div>
            </div>
            <hr class="my-5" />
            <div class=" row gx-4">
                <!-- First name -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="fname">Nama Depan</label>
                    <p>
                        {{ $user->first_name }}
                    </p>
                </div>
                <!-- Last name -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="lname">Nama belakang</label>
                    <p>
                        {{ $user->last_name }}
                    </p>
                </div>
                <!-- Phone -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="phone">Nomor Telpon</label>
                    <p>0812345678</p>
                </div>
                <!-- Address -->
                <hr class="my-5" />
                <h4 class="mb-3">Alamat</h4>
                <div class="mb-3 col-12 col-md-6">
                    <h5>Provinsi</h5>
                    <p>{{ $user->address->province }}</p>
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <h5>Kota</h5>
                    <p>{{ $user->address->city }}</p>
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <h5>Kode Pos</h5>
                    <p>{{ $user->address->post_code }}</p>
                </div>
                <div class="mb-3 col-12 col-md-6">
                    <h5>Detail</h5>
                    <p>{{ $user->address->detail }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
