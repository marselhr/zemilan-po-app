@extends('layouts.app')

@section('content')
    <div class="container py-4">
        @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
            <div class="row">
                <div class="d-flex col-10 flex-wrap">

                    <div class="col-6 col-md-2">
                        <div class="card overflow-hidden">
                            <img src="https://source.unsplash.com/280x200?mie" alt="Product" class="bg-cover">
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="ms-2 ms-md-6 text-break">
                            <h4 class="">{{ $item->name }}</h4>
                            <p>{{ $item->model->description }}</p>
                            <p>Jumlah : {{ $item->qty }}</p>
                            <h5>Total : Rp {{ number_format($item->qty * $item->model->price, 0, '.', '.') }}</h5>
                        </div>
                    </div>


                </div>
            </div>
            <hr>
        @endforeach
        <div class="col-12 d-flex justify-content-end align-items-end  col-md-3  px-2 ">
            <div>
                <a class="btn btn-sm btn-info" href="{{ route('buyer.checkout', $item->rowId) }}">Checkout</a>
            </div>
        </div>
    </div>
@endsection
