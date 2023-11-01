@extends('layouts.app')



@section('content')
    <div class="container-xl px-4 mt-4">

        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" href="#" target="__blank">Profil</a>
            <a class="nav-link" href="#" target="__blank">Pembayaran</a>
            <a class="nav-link" href="#" target="__blank">Alamat</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">

            <div class="col-xl-12">

                <div class="card mb-4">
                    <div class="card-header">Detail Akun</div>
                    <div class="card-body">
                        <form>

                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Email</label>
                                <input class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" value="{{ Auth::user()->email }}" disabled>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Nama Awal</label>
                                    <input class="form-control" id="inputFirstName" type="text"
                                        placeholder="Enter your first name" value="{{ Auth::user()->first_name }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Nama Akhir</label>
                                    <input class="form-control" id="inputLastName" type="text"
                                        placeholder="Enter your last name" value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Jenis Kelamin</label>
                                    <select class="form-control form-select pb-3 pt-3" name="languages" id="lang">
                                        <option selected>Open this select menu</option>
                                        <option value="Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>

                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputBirthday">Tanggal Lahir</label>
                                    <input class="form-control" id="inputBirthday" type="text" name="birthday"
                                        placeholder="Enter your birthday" value="06/10/1988">
                                </div>
                            </div>



                            <div class="row gx-3 mb-3">

                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                                    <input class="form-control" id="inputPhone" type="tel"
                                        placeholder="Enter your phone number" value="012345678">
                                </div>


                            </div>

                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

</html>
