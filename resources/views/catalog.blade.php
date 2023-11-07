@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-4">
        <h4>Product Catalog</h4>
        <div class="row row-cols-1 row-cols-md-4">
            @foreach($products as $product)
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
                                <a href="#" class="btn btn-primary" onclick="addToCart({{ $product->id }})">
                                    <i class="fe fe-shopping-cart text-white align-middle"></i>
                                </a>
                                <a href="#" class="btn btn-success ml-2" onclick="checkoutNow({{ $product->id }})">
                                    <i class="fe fe-check-circle text-white align-middle"></i> Beli
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

<script>
    function addToCart(productId) {
        // Implement your logic to add the product to the cart here
        console.log('Added product with ID: ' + productId + ' to the cart');
    }

    function checkoutNow(productId) {
        // Implement your logic to initiate the checkout process here
        console.log('Initiating checkout for product with ID: ' + productId);
    }
</script>
@endsection
