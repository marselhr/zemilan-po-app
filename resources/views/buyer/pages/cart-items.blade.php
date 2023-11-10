@extends('layouts.app')
@push('customCss')
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
@endpush
@push('customJs')
    <script src="{{ asset('assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
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
                        @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                            <div class="row border-top border-bottom">
                                <div class="row main align-items-center">
                                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/1GrakTl.jpg"></div>
                                    <div class="col">
                                        <div class="row text-muted">{{ $item->model->name }}</div>
                                        <div class="row  text-truncate">{{ $item->model->description }}</div>
                                    </div>
                                    <div class="col">
                                        <span class="fs-5"><button type="button"
                                                class="btn btn-xs btn-outline-secondary">-</button> {{ $item->qty }}
                                        </span><button type="button"
                                            class="btn btn-xs btn-outline-secondary">+</button></span>

                                    </div>
                                    <div class="col">Rp {{ $item->model->price }} </div>
                                </div>
                            </div>
                        @endforeach

                        <button class="back-to-shop btn"><a href="#">&leftarrow;</a><span class="text-muted">Kembali
                                Belanja</span></button>
                    </div>
                    <div class="col-md-4 summary">
                        <div>
                            <h5><b>Summary</b></h5>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">3 ITEM</div>
                            <div class="col text-right">Rp
                                {{ \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal() }}</div>
                        </div>
                        <form>
                            <div class="mb-3">
                                <label for="code">KODE VOUCHER</label>
                                <input id="code" class="form-control" name='code'
                                    placeholder="Tambahkan Kode Voucher">
                            </div>
                            <button type="submit" class="btn btn-info col-12">Klaim</button>

                        </form>
                        <hr>
                        <div class="row d-flex justify-between" style="width: 100%">
                            <div class="col">TOTAL </div>
                            <div class="col mb-2">Rp
                                {{ \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->subtotal() }}</div>
                        </div>
                        <button class="btn btn-primary col-12">BAYAR SEKARANG</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
