@extends('layouts.app')



@section('content')
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="{{ route('mainprofile') }}" >Profil</a>
            <a class="nav-link" href="{{ route('alamatprofile') }}" >Alamat</a>
            <a class="nav-link" href="#" >Pembayaran</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">

            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">Detail Akun</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profileSave') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1">Email</label>
                                <input class="form-control" id="email" type="text" placeholder="Enter your username"
                                    value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1">Nama Awal</label>
                                    <input class="form-control" name="namaAwal" id="namaAwal" type="text"
                                        placeholder="Enter your first name" value="{{ Auth::user()->first_name }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1">Nama Akhir</label>
                                    <input class="form-control" name="namaAkhir" id="namaAkhir" type="text"
                                        placeholder="Enter your last name" value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1">Jenis Kelamin</label>
                                    <select class="form-control form-select pb-3 pt-3" name="languages" id="jKelamin">
                                        <option selected>Open this select menu</option>
                                        <option value="Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Tanggal Lahir</label>
                                    <input class="form-control" id="tglLahir" type="text" name="birthday"
                                        placeholder="Enter your birthday" value="06/10/1988">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                                    <input class="form-control" name="no_telp" id="noTelp" type="text"
                                        placeholder="Enter your phone number" value="012345678">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

</html>
