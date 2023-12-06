@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col ">
                <div class="card">
                    <div class="card-header bg-primary text-white fw-bold"><i class="fa fa-envelope"></i> Masukan
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" aria-describedby="emailHelp"
                                    placeholder="Masukan Nama" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email </label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    placeholder="Masukan email" required>

                            </div>
                            <div class="form-group mb-3">
                                <label for="message">Pesan</label>
                                <textarea class="form-control" id="message" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right" id="submitbtn">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white fw-bold"><i class="fa fa-home"></i> Hubungi Kami
                    </div>
                    <div class="card-body">
                        <h4 class="pt-2">Alamat</h4>
                        <i class="fe fe-map"style="color:#000"></i> Jagapura wetan kecamatan Gegesik kabupaten Cirebon <br>
                        <h4 class="pt-2">Nomor Telepon</h4>
                        <i class="fe fe-phone" style="color:#000"></i> 123456 <br>
                        <i class="fe fe-phone" style="color:#000"></i> 123456 <br>
                        <h4 class="pt-2">Email</h4>
                        <i class="fe fe-mail" style="color:#000"></i> zemilanaja@gmail.com<br>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

