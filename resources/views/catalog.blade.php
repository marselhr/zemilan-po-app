@extends('layouts.app') {{-- Use your guest layout --}}

@section('content')
<div class="container">
    <h4 class="mt-3">Product Catalog</h4>
    <div class="py-4">
        <div class="row row-cols-1 row-cols-md-4">
            @foreach($products as $product)
            <div class="col">
                <!-- Medium-sized Card -->
                <div class="card" style="width: 18rem; margin: 0.5rem;">
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
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">{{ $product->price }}</h5>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="text-inherit">
                                    <i class="fe fe-shopping-cart text-primary align-middle me-2"></i>Get Cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
