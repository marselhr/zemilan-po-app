<script>
    $(document).ready(() => {
        $('body').on('click', '#order-history', (e) => {
            e.preventDefault()
            $.ajax({
                type: "GET",
                url: "{{ route('buyer.order.history') }}",
                success: (data) => {
                    $('#tab-content').html(data.content)
                    $('#order-history').addClass('active')
                    $('#address').removeClass('active')
                    $('#profile-tab').removeClass('active')
                }
            })
        });
        $('body').on('click', '#address', (e) => {
            e.preventDefault()
            const url = $('#address').data('url-address')
            $.ajax({
                type: "GET",
                url: url,
                success: (data) => {
                    $('#tab-content').html(data.content)
                    $('#address').addClass('active')
                    $('#order-history').removeClass('active')
                    $('#profile-tab').removeClass('active')
                }
            })
        })
    })

    const provinsiDropdown = document.getElementById('provinsi');
    const kotaDropdown = document.getElementById('kota');
    var selectedProvinsiNameInput = document.getElementById('selectedProvinsiName');

    // Mengambil data provinsi dari rute yang telah Anda buat
    axios.get('/get-provinces')
        .then(function(response) {
            // Iterasi melalui data dan tambahkan setiap provinsi ke dropdown pertama
            response.data.forEach(province => {
                const option = document.createElement('option');
                option.value = province.id;
                option.text = province.name;
                provinsiDropdown.appendChild(option);
            });
            // selectedProvinsiNameInput.value = response.data[0].name;

            // console.log("ini "+selectedProvinsiNameInput);

            // Menambahkan event listener untuk perubahan pada dropdown provinsi
            provinsiDropdown.addEventListener('change', function() {
                const selectedProvinsiId = provinsiDropdown.value;
                selectedProvinsiNameInput.value = provinsiDropdown.options[provinsiDropdown.selectedIndex]
                    .text; // Ambil nama provinsi dari option yang terpilih


                // Menghapus semua opsi sebelumnya dari dropdown kota
                kotaDropdown.innerHTML = '<option value="" disabled selected>Loading...</option>';

                // Mengambil data kota dari API berdasarkan ID provinsi yang dipilih
                axios.get(`/get-regencies/${selectedProvinsiId}`)
                    .then(function(kotaResponse) {
                        // Menghapus opsi "Loading..."
                        kotaDropdown.removeChild(kotaDropdown.querySelector('option[disabled]'));

                        // Iterasi melalui data kota dan tambahkan setiap kota ke dropdown kedua
                        kotaResponse.data.forEach(regency => {
                            const option = document.createElement('option');
                            option.value = regency.name;
                            option.text = regency.name;
                            kotaDropdown.appendChild(option);
                        });
                    })
                    .catch(function(error) {
                        console.error('Error:', error);
                    });
            });
        })
        .catch(function(error) {
            console.error('Error:', error);
        });

    document.getElementById('profileImage').addEventListener('click', function() {
        document.getElementById('uploadImage').click();
    });

    document.getElementById('uploadImage').addEventListener('change', function() {
        var input = this;
        var image = document.getElementById('previewImage');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    });
</script>
