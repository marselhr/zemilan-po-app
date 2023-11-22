<div class="col-12   col-md-4  p-2">

    <div class="card">
        <img src="{{ $product->image != null ? asset('storage/' . $product->image) : 'https://source.unsplash.com/480x480?food' }}"
            alt="" class="card-img-top img-fluid"
            style="idth: 100%;
            height: 12vw;
            object-fit: cover;">
        <!-- Card Body -->
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <a href="#" class="fs-5"><i class="fe fe-heart align-middle"></i></a>
            </div>
            <a href="{{ route('detail', $product) }}">
                <h4 class="mb-0 text-truncate">{{ $product->name }}</h4>
            </a>
            <h6 class="mb-0 text-warning">Rp. {{ number_format($product->price, 0, '.', '.') }}</h6>
        </div>
        <!-- Card Footer -->
        <div class="card-footer">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="d-flex flex-wrap gap-md-0 gap-1  col-12">
                    <div class="col-12 col-md-6 p-md-1">
                        <button type="button" data-product-id="{{ $product->id }}" data-quantity="1"
                            class="btn btn-info w-100  add_to_cart" id="add_to_cart{{ $product->id }}">
                            <i class="fe fe-shopping-cart text-white align-middle"></i>
                            </a>
                    </div>

                    <div class="col-12 col-md-6 p-md-1">
                        <form action="{{ route('order.store', $product) }}" method="post">
                            @csrf
                            <button type="submit" class="btn  btn-primary w-100"
                                onclick="checkoutNow({{ $product->id }})">Beli
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
