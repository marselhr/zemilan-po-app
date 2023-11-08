@extends('layouts.app')

@section('content')
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
                                class="fe fe-check icon-xxs icon-shape bg-light-success text-success rounded-circle me-2"></i>Zemilan
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
                <div class="col-lg-6 d-flex justify-content-center">
                    <!-- images -->
                    <div class="position-relative text-center">
                        <img src="{{ asset('assets/images/background/coba1.JPG') }}" alt="" class="rounded-circle"
                            style="max-width: 450px; height: auto; margin-top: 35px;">
                    </div>
                </div>
            </div>

            <div class="py-4">
                <h4>Product Terlaris</h4>
                <div class="row row-cols-1 row-cols-md-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <!-- Medium-sized Card -->
                            <div class="card" style="width: 18rem; margin-right:1px;">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="card-img-top">
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <a href="#" class="fs-5"><i class="fe fe-heart align-middle"></i></a>
                                    </div>
                                    <h4 class="mb-2 text-truncate">{{ $product->name }}</h4>
                                    <small>Stock: {{ $product->stock }}</small>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Rp. {{ $product->price }}</h5>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="btn btn-primary"
                                                onclick="addToCart({{ $product->id }})">
                                                <i class="fe fe-shopping-cart text-white align-middle"></i>
                                            </a>
                                            <form action="{{ route('order.store', $product) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success ml-2"
                                                    onclick="checkoutNow({{ $product->id }})">
                                                    <i class="fe fe-check-circle text-white align-middle"></i> Beli
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
