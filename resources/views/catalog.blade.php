@extends('layouts.app')

@push('customJs')
    <!-- Add to cart -->
    @include('generals.scripts.product-card-script')
@endpush

@section('content')
    <section>
        <div class="container">
            <div class="row mt-4 justify-content-center">
                <h2 class="text-center">Produk Kami</h2>
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
                    @if(count($products) > 0)
                        @foreach ($products as $product)
                            <!-- Kartu Produk Ukuran Menengah -->
                            @include('layouts.partials.product-card')
                        @endforeach
                    @else
                        <div class="container-fluid py-4">
                            <div style="min-height: 70vh">
                                <h5 class="text-center mt-10"> -- Produk Kami Kosong --</h5>
                            </div>
                        </div>
                    @endif`
                </div>
            </div>
        </div>
    </section>
@endsection
