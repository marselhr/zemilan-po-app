@extends('layouts.app')

@push('customJs')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>

    <script src="{{ asset('assets/js/vendors/tnsSlider.js') }}"></script>
    <!-- Add to cart -->
    <script type="text/javascript">
        $(document).ready(function() {
            let quantity = 1;
            // Kurang quantity
            $(".button-minus").click(function() {
                var inputField = $(this).siblings(".quantity-field");
                var currentValue = parseInt(inputField.val());

                if (!isNaN(currentValue) && currentValue > 1) {
                    inputField.val(currentValue - 1);
                    $('.add_to_cart').data('quantity', inputField.val());
                }
            });

            // Tambah quantity
            $(".button-plus").click(function() {
                var inputField = $(this).siblings(".quantity-field");
                var currentValue = parseInt(inputField.val());

                if (!isNaN(currentValue) && currentValue < parseInt(inputField.attr("max"))) {
                    inputField.val(currentValue + 1);
                    $('.add_to_cart').data('quantity', inputField.val());
                }
            });

            $('.add_to_cart').click(function(e) {
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
                        $('#add_to_cart' + product_id).html(
                            '<div class="spinner-border spinner-border-sm text-light" role="status"><span class="visually-hidden">Loading...</span></div>'
                        )
                    },
                    complete: function() {
                        $('#add_to_cart' + product_id).html(
                            '<i class="fe fe-shopping-cart"></i>')
                    },
                    success: function(data) {
                        console.log(data)
                        $('body #navbar').html(data['header'])
                    }
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <p class="breadcrumb-item">
                        <a href="{{ route('catalog') }}">Katalog</a>
                    </p>
                    <p class="breadcrumb-item active" aria-current="page">Detail Produk</p>
                </ol>
            </nav>
            <!-- Card Informasi Produk -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <img src="{{ $products->image != null ? asset('storage/' . $products->image) : 'https://source.unsplash.com/480x480?food' }}"
                                    alt="" class="card-img-top">
                            </div>
                            <div class="col-md-6">

                                <h1 class="title mb-3">{{ $products->name }}</h1>

                                <dl class="row">
                                    <p>{{ $products->description }}</p>
                                    <dt class="col-sm-3">Stok</dt>
                                    <dd class="col-sm-9">{{ $products->stock }}</dd>
                                    <dt class="col-sm-3">Berat</dt>
                                    <dd class="col-sm-9">{{ $products->weight }} Gram</dd>
                                    <dd class="col-sm-9 price h3 text-success ">Rp
                                        {{ number_format($products->price, 0, '.', '.') }},00</dd>
                                    <dd><strong>Jumlah</strong></dd>
                                    <div class="input-group">
                                        <input type="button" value="-"
                                            class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0 py-1 "
                                            data-field="quantity">
                                        <input type="number" step="1" max="10" value="1" name="quantity"
                                            class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 py-1">
                                        <input type="button" value="+"
                                            class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0 py-1 "
                                            data-field="quantity">
                                    </div>
                                </dl>

                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="col-md-5">
                                        <button type="button" data-product-id="{{ $products->id }}" data-quantity="1"
                                            class="btn btn-primary add_to_cart w-100" id="add_to_cart{{ $products->id }}">
                                            <i class="fe fe-shopping-cart text-white align-middle"></i>
                                        </button>
                                    </div>

                                    <div class="col-md-5">
                                        <form action="{{ route('order.store', $products) }}" method="post">
                                            <div>
                                                @csrf
                                                <button type="submit" class="btn  btn-success ml-2 w-100"
                                                    onclick="checkoutNow({{ $products->id }})">
                                                    Beli
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
