@extends('layouts.app')

@section('content')
    <div class="container py-4">
        @foreach ($items as $item)
            <div class="row">
                <div class="d-flex col-12 flex-wrap">

                    <div class=" col-6 col-md-3">
                        <div class="card overflow-hidden">
                            <img src="https://source.unsplash.com/280x200?mie" alt="Product" class="bg-cover">
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="ms-2 ms-md-6 text-break">
                            <h4 class="">{{ $item->product->name }}</h4>
                            <p>{{ $item->product->description }}</p>
                            <p>Jumlah : {{ $item->quantity }}</p>
                            <h5>Total : Rp.{{ $item->quantity * $item->product->price }}</h5>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end align-items-end  col-md-3  px-2 ">
                        <div>
                            <a class="btn btn-sm btn-info" href="{{ route('buyer.checkout', $item) }}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach

    </div>
@endsection
