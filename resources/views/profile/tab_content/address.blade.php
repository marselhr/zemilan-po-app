<div class="col-xl-12 ">
    <div class="card mb-4">
        <div class="card-header">Detail Alamat</div>
        <div class="card-body">
            <form method="POST" action="{{ route('alamatSave') }}">
                @csrf

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1">Provinsi</label>
                        <select class="form-control form-select pb-3 pt-3" name="provinsi" id="provinsi">
                            <option value="{{ Auth::user()->address->province ?? null }}">
                                {{ Auth::user()->address->province ?? null }}
                            </option>
                        </select>
                        <input type="hidden" id="selectedProvinsiName" name="selectedProvinsiName" value="">


                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1">Kota</label>
                        <select class="form-control form-select pb-3 pt-3" name="kota" id="kota">
                            <option value="{{ Auth::user()->address->city ?? null }}">
                                {{ Auth::user()->address->city ?? null }}</option>
                        </select>
                    </div>
                </div>

                <div class="row gx-3 mb-3">
                    <div class="col-md-6">
                        <label class="small mb-1">Kode Pos</label>
                        <input class="form-control" name="kodePos" id="kodePos" type="text" placeholder=""
                            value="{{ Auth::user()->address->post_code ?? null }}">
                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1">Detail Lainnya</label>
                        <input class="form-control" name="detail" id="detail" type="text" placeholder=""
                            value="{{ Auth::user()->address->detail ?? null }}">
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>

        </div>
    </div>
</div>
