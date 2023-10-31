@extends('layouts.app')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <h1 class="display-4 fw-bold mb-4 text-primary">About Us</h1>
            </div>
        </div>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('assets/images/background/about.JPG') }}" alt="About Us Image" class="img-fluid" style="max-width: 100%; height: auto;">
            </div>
            <div class="col-md-8">
                <ul class="list-unstyled text-dark">
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Keripik baso goreng adalah makanan ringan asli dari Indonesia.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Dibuat dengan baso yang berkualitas tinggi dan bumbu rempah pilihan.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Memiliki cita rasa menggoda dan tekstur yang renyah.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Kami berkomitmen untuk memberikan pengalaman terbaik dalam menikmati makanan khas Indonesia ini.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Kami menghadirkan kepada Anda keripik baso goreng berkualitas tinggi yang siap memanjakan lidah Anda.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Selamat menikmati kelezatan yang hanya bisa ditemukan dalam setiap gigitan keripik baso goreng kami.</span></strong>
                    </li>
                </ul>
                <p class="larger-font text-dark">
                    <strong>Alamat: Jagapura wetan kecamatan Gegesik kabupaten Cirebon</strong>
                </p>
                <p class="larger-font text-dark">
                    <strong>Mengapa harus belanja di Zemilan:</strong>
                </p>
                <ul class="list-unstyled text-dark">
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Kualitas tinggi dalam setiap produk kami.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Penggunaan bahan-bahan terbaik untuk kelezatan sejati.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Pengalaman belanja yang aman dan nyaman.</span></strong>
                    </li>
                    <li>
                        <span class="badge-dot bg-warning me-2"></span>
                        <strong><span class="larger-font">Pelanggan kami adalah prioritas utama.</span></strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection


