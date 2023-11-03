@extends('layouts.app')



@section('content')
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link" href="{{ route('mainprofile') }}">Profil</a>
            <a class="nav-link active ms-0" href="{{ route('alamatprofile') }}">Alamat</a>
            <a class="nav-link" href="#">Pembayaran</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">

            <div class="col-xl-12 ">
                <div class="card mb-4">
                    <div class="card-header">Detail Alamat</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profileSave') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamatLengkap" rows="3">isinya disini</textarea>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1">Provisi</label>
                                    <select class="form-control form-select pb-3 pt-3" id="provinsi">
                                        <option selected>Silahkan pilih provinsi</option>
                                        <option value="Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1">Kota</label>
                                    <select class="form-control form-select pb-3 pt-3" id="kota">
                                        <option selected>Silahkan pilih kota</option>
                                        <option value="Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1">Kode Pos</label>
                                    <input class="form-control" id="kodePos" type="text"
                                        placeholder="" value="">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1">Detail Lainnya</label>
                                    <input class="form-control" id="detailLainnya" type="text" 
                                        placeholder="" value="">
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
