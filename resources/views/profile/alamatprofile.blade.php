@extends('layouts.app')



@section('content')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function fillProvinces() {
            axios.get('/get-provinces')
                .then(function(response) {
                    const provinsiDropdown = document.getElementById('provisi');
                    const selectedValue = provinsiDropdown.value;
                    provinsiDropdown.innerHTML = '';
                    const uniqueProvinces = {};
                    uniqueProvinces[selectedValue] = true;

                    response.data.forEach(function(province) {
                        uniqueProvinces[province.name] = true;
                    });
                    Object.keys(uniqueProvinces).forEach(function(provinceName) {
                        const option = document.createElement('option');
                        option.value = provinceName;
                        option.text = provinceName;
                        provinsiDropdown.appendChild(option);
                    });
                    provinsiDropdown.value = selectedValue;
                    provinsiDropdown.removeAttribute('disabled');
                    fillCities(selectedValue);
                })
                .catch(function(error) {
                    console.error(error);
                });
        }
        fillProvinces();
    </script>
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
                        <form method="POST" action="{{ route('alamatSave') }}">
                            @csrf

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1">Provisi</label>
                                    <select class="form-control form-select pb-3 pt-3" name="provisi" id="provisi">
                                        <option value="{{ Auth::user()->address->province }}">
                                            {{ Auth::user()->address->province }}</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1">Kota</label>
                                    <input class="form-control" name="kota" id="kota" type="text" placeholder=""
                                        value="{{ Auth::user()->address->city }}">
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1">Kode Pos</label>
                                    <input class="form-control" name="kodePos" type="text" placeholder=""
                                        value="{{ Auth::user()->address->post_code }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="small mb-1">Detail Lainnya</label>
                                    <input class="form-control" name="detail" type="text" placeholder=""
                                        value="{{ Auth::user()->address->detail }}">
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
