@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <h2>Produk Favorit</h2>
            <div class="d-flex flex-wrap col-10 justify-content-center">
                @foreach ($products as $product)
                    <!-- Medium-sized Card -->
                    <div class="col-10 col-md-5 col-lg-3 p-2 ">
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
                                    <div class="d-flex gap-2">
                                        <div>
                                            <a href="#" class="btn btn-primary btn-sm"
                                                onclick="addToCart({{ $product->id }})">
                                                <i class="fe fe-shopping-cart text-white align-middle"></i>
                                            </a>
                                        </div>

                                        <form action="{{ route('order.store', $product) }}" method="post">
                                            <div>
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm ml-1"
                                                    onclick="checkoutNow({{ $product->id }})">
                                                    Beli
                                                </button>
                                            </div>
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
