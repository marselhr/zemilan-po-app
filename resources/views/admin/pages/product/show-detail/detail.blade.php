@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><a
                                    href="{{ route('admin.product.index') }}">Product</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Product</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('admin.product.index') }}" class="btn btn-secondary"><i
                            class="fe fe-arrow-left-circle"></i>
                        Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <section class="py-lg-2">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body mb-4 mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <img src="{{ $product->image != null ? asset('storage/' . $product->image) : 'https://source.unsplash.com/480x480?food' }}"
                                alt="" class="card-img-top">
                        </div>
                        <div class="col-md-6">

                            <h1 class="title mb-3">{{ $product->name }}</h1>

                            <dl class="row">
                                <p>{{ $product->description }}</p>
                                <dt class="col-sm-4">Stok</dt>
                                <dd class="col-sm-9">{{ $product->stock }}</dd>
                                <dt class="col-sm-4">Berat</dt>
                                <dd class="col-sm-9">{{ $product->weight }} Gram</dd>
                                <dd class="col-sm-9 price h3 text-success ">Rp
                                    {{ number_format($product->price, 0, '.', '.') }},00</dd>
                            </dl>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
