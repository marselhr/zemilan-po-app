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

<script>
    var selectedProvinsiNameInput = document.getElementById('selectedProvinsiName');

    $(document).ready(function() {
        // Fetch data for the province dropdown
        $.ajax({
            url: "https://api.goapi.io/regional/provinsi",
            type: "GET",
            headers: {
                "X-API-KEY": "e876ce45-47d9-5fa2-66e4-19eeea69"
            },
            success: function(response) {
                if (response.status === "success") {
                    var provinsiSelect = $("#provinsi");

                    // Populate the province dropdown
                    $.each(response.data, function(index, province) {
                        provinsiSelect.append("<option value='" + province.id + "'>" +
                            province.name + "</option>");
                    });

                    // Add event listener for change event on the province dropdown
                    provinsiSelect.on('change', function() {
                        var selectedProvinceId = $(this).val();
                        var selectedProvinceValue = $(this).find(":selected").text();

                        // Update the hidden input value with the selected province name
                        selectedProvinsiNameInput.value = selectedProvinceValue;

                        // Fetch data for the city dropdown based on the selected province
                        $.ajax({
                            url: "https://api.goapi.io/regional/kota?provinsi_id=" +
                                selectedProvinceId,
                            type: "GET",
                            headers: {
                                "X-API-KEY": "e876ce45-47d9-5fa2-66e4-19eeea69"
                            },
                            success: function(cityResponse) {
                                if (cityResponse.status === "success") {
                                    var kotaSelect = $("#kota");

                                    // Clear existing options in the city dropdown
                                    kotaSelect.empty();

                                    // Populate the city dropdown
                                    $.each(cityResponse.data, function(index,
                                        city) {
                                        kotaSelect.append(
                                            "<option value='" + city
                                            .name + "'>" + city
                                            .name + "</option>");
                                    });
                                } else {
                                    console.error("API returned an error:",
                                        cityResponse.message);
                                }
                            },
                            error: function(cityError) {
                                console.error("Error fetching city data:",
                                    cityError);
                            }
                        });
                    });
                } else {
                    console.error("API returned an error:", response.message);
                }
            },
            error: function(error) {
                console.error("Error fetching province data:", error);
            }
        });
    });
</script>
