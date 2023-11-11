@extends('layouts.app')
@push('customCss')
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush
@push('customJs')
    <script src="{{ asset('assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    <script>
        $(document).on('click', '#coupon-btn', function(e) {
            e.preventDefault();

            const code = $('input[name=code]').val();
            $('#coupon-btn').html('<i class="fe fe-loader"></i> PROSES....');
            $('#coupon-form').submit();
        })
    </script>
@endpush
@section('content')
    <div class="container py-4">

        <div class="row">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 cart">
                        <div class="title">
                            <div class="row">
                                <div class="col">
                                    <h4><b>Shopping Cart</b></h4>
                                </div>
                                <div class="col align-self-center text-right text-muted">3 items</div>
                            </div>
                        </div>
                        @foreach (Auth::user()->cartItems as $item)
                            <div class="row border-top border-bottom">
                                <div class="row main align-items-center">
                                    <div class="col-2"><img class="img-fluid"
                                            src="{{ asset('storage/' . $item->product->image) }}"></div>
                                    <div class="col">
                                        <div class="row text-muted">{{ $item->product->name }}</div>
                                        <div class="row  text-truncate">{{ $item->product->category->name }}</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <span class=""><button type="button"
                                                class="btn btn-xs btn-outline-secondary">-</button> {{ $item->quantity }}
                                        </span><button type="button"
                                            class="btn btn-xs btn-outline-secondary">+</button></span>

                                    </div>
                                    <div class="col">Rp {{ $item->product->price }} </div>
                                </div>
                            </div>
                        @endforeach

                        <a href="{{ route('home') }}" class=" btn">&leftarrow; <span class="text-muted">Kembali
                                Belanja</span></a>
                    </div>
                    <div class="col-md-4 summary">
                        <div>
                            <h5><b>Summary</b></h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">{{ Auth::user()->cartItems->count() }} ITEM</div>
                            <div class="col text-right">Rp
                                {{ number_format(App\Models\CartItem::getSubTotal(Auth::user()), 0, '.', '.') }}</div>
                        </div>
                        <form action="{{ route('coupon.apply') }}" id="coupon-form" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input id="code" class="form-control" name='code' value="{{ old('code') ?? '' }}"
                                    placeholder="Tambahkan Kode Voucher">
                            </div>
                            <button type="submit" id="coupon-btn" class="btn btn-info col-12">KLAIM</button>

                        </form>
                        <hr>
                        <div class="row">
                            <div class="col">TOTAL </div>
                            <div class="col mb-2">Rp
                                {{ number_format(App\Models\CartItem::getSubTotal(Auth::user()), 0, '.', '.') }}</div>
                        </div>
                        <button class="btn btn-primary col-12">BAYAR SEKARANG</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
