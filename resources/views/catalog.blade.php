@extends('layouts.app')

@push('customJs')
    <!-- Add to cart -->
    <script type="text/javascript">
        $(document).on('click', '.add_to_cart', function(e) {
            e.preventDefault();
            let product_id = $(this).data('product-id');
            let quantity = $(this).data('quantity');

            let token = "{{ csrf_token() }}";
            let route_path = "{{ route('buyer.cart.store') }}";

            $.ajax({
                url: route_path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    _token: token
                },
                beforeSend: function() {
                    $('#add_to_cart' + product_id).html('<i class="fe fe-loader"></i>')
                },
                complete: function() {
                    $('#add_to_cart' + product_id).html('<i class="fe fe-shopping-cart"></i>')
                },
                success: function(data) {
                    console.log(data)
                    $('body #navbar').html(data['header'])
                }
            });
        });
    </script>
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
                                <a href="{{ route('filter.products') }}" class="btn btn-dark"><i class="fas fa-arrow-rotate-left"></i> Reset</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="productFilter" class="d-flex flex-wrap col-10 justify-content-center">
                    @foreach ($products as $product)
                        <!-- Medium-sized Card -->
                        <div href="{{ route('detail', ['id' => $product->id]) }}" class="col-10 col-md-5 col-lg-3 p-3 ">
                            <div class="card">
                                <a href="{{ route('detail', ['id' => $product->id]) }}">
                                    <img src="{{ $product->image != null ? asset('storage/' . $product->image) : 'https://source.unsplash.com/480x480?food' }}"
                                        alt="" class="card-img-top">
                                    <!-- Card content goes here -->
                                </a>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <a href="#" class="fs-5"><i class="fe fe-heart align-middle"></i></a>
                                    </div>
                                    <a href="{{ route('detail', ['id' => $product->id]) }}">
                                        <h4 class="mb-2 text-truncate">{{ $product->name }}</h4>
                                    </a>
                                    <small>Stock: {{ $product->stock }}</small>
                                </div>
                                <!-- Card Footer -->
                                <div class="card-footer">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                                        <h5 class="mb-0">Rp. {{ $product->price }}</h5>
                                        <div class="d-flex gap-2">
                                            <div>
                                                <button type="button" data-product-id="{{ $product->id }}"
                                                    data-quantity="1" class="btn btn-primary btn-sm add_to_cart"
                                                    id="add_to_cart{{ $product->id }}">
                                                    <i class="fe fe-shopping-cart text-white align-middle"></i>
                                                </button>
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
