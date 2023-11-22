@extends('layouts.app')

@push('customJs')
    <!-- Add to cart -->
    @include('generals.scripts.produc-card-script')
@endpush

@section('content')
    <section>
        <div class="container">
            <div class="row mt-4 justify-content-center">
                <h2 class="text-center">Produk Favorit</h2>
                <div class="col-10 col-md-6 filter mb-4 text-center">
                    <form action="{{ route('filter.products') }}" method="get">
                        <div class="row">
                            <div class="col-md-8">
                                <select name="category_filter" id="category_filter" class="form-select mb-3 mt-3">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mt-3">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
                                <a href="{{ route('filter.products') }}" class="btn btn-dark"><i
                                        class="fas fa-arrow-rotate-left"></i> Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="productFilter" class="d-flex flex-wrap col-10 justify-content-center">
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
