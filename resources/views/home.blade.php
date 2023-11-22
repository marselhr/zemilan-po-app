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
                        <!-- Medium-sized Card -->
                        <div class="col-6 p-2 col-md-3 ">

                            <div class="card">
                                <img src="{{ $product->image != null ? asset('storage/' . $product->image) : 'https://source.unsplash.com/480x480?food' }}"
                                    alt="" class="card-img-top">
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
                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                        <h5 class="mb-0">Rp. {{ $product->price }}</h5>
                                        <div class="d-flex flex-wrap  col-12 mt-4">
                                            <div class="col-md-6 col-12 p-1">
                                                <button type="button" data-product-id="{{ $product->id }}"
                                                    data-quantity="1" class="btn btn-primary w-100 add_to_cart"
                                                    id="add_to_cart{{ $product->id }}">
                                                    <i class="fe fe-shopping-cart text-white align-middle"></i>
                                                </a>
                                            </div>

                                            <div class="col-md-6 col-12 p-1">
                                                <form action="{{ route('order.store', $product) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn  btn-success w-100"
                                                        onclick="checkoutNow({{ $product->id }})">Beli
                                                    </button>
                                                </form>
                                            </div>
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
