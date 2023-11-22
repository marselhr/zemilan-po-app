@extends('layouts.app')

@push('customJs')
    @include('generals.scripts.produc-card-script')
@endpush
@section('content')
    <!-- carousel template -->
    @include('layouts.partials.carousel')

    <section class="py-lg-16 py-8">
        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row align-items-center">
                <!-- col -->
                <div class="col-lg-6 mb-6 mb-lg-0">
                    <div class="">
                        <!-- heading -->
                        <h5 class="text-dark mb-4"><i
                                class="fe fe-check icon-xxs icon-shape  text-success rounded-circle me-2"></i>Zemilan
                            Keripik Baso Goreng</h5>
                        <!-- heading -->
                        <h1 class="display-3 fw-bold mb-3">Zemilan Keripik Baso Goreng</h1>
                        <!-- para -->
                        <p class="pe-lg-10 mb-5">Selamat Datang di Zemilan Keripik Baso Goreng! Rasakan Sensasi Nikmat
                            Keripik Baso Goreng Kami Kualitas Terbaik, Harga Terjangkau.</p>
                        <!-- btn -->
                        <a href="{{ route('catalog') }}" class="btn btn-primary">See Product</a>
                    </div>
                </div>
                <!-- col -->
                <div class="col-lg-6 d-flex justify-content-center justify-content-md-end">
                    <!-- images -->
                    <div class=" col-12 col-md-9">
                        <img src="{{ asset('assets/images/background/coba1.JPG') }}" alt=""
                            class="rounded-circle img-fluid">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <h4>Produk Favorit</h4>
                <div class="d-flex flex-wrap col-12">
                    @foreach ($products as $product)
                        <!-- card -->
                        @include('layouts.partials.product-card')
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
