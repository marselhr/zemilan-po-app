@extends('layouts.app')


@section('content')
    <div class="row justify-content-center py-2 min-vh-100">
        <div class="col-lg-6 col-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-2 text-primary">#INVOICE</h4>
                    <div class="mb-2">
                        <!-- heading -->
                        <h2 class="mb-0">Terima Kasih</h2>
                        <p class="mb-0">Pesanan telah kami proses</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0">Order ID: </h4>
                        <a href="#" class="ms-2 fw-semibold">{{ $order->order_id }}</a>
                    </div>
                </div>
                <!-- card body -->
                <div class="card-body">

                    <div>
                        <!-- row -->
                        @foreach ($order->orderItems as $item)
                            <div class="row justify-content-between">
                                <!-- col -->
                                <div class="col-12">
                                    <div class="d-md-flex flex-wrap justify-content-between">
                                        <!-- text -->
                                        <div class="mt-2">
                                            <h5 class="mb-1">
                                                {{ $item->quantity }} {{ $item->product->name }}
                                            </h5>
                                            <span>Berat: <span class="text-dark">{{ $item->product->weight }} gram</span>,
                                            </span>
                                        </div>
                                        <div class="mt-2">
                                            <h5>Rp {{ number_format($item->product->price * $item->quantity, 0, '.', '.') }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <!-- price -->
                            </div>
                            <hr class="my-1">
                        @endforeach
                        <!-- hr -->
                        <div>
                            <!-- list -->
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex justify-content-between mb-2">
                                    <span>Diskon</span>
                                    <span class="text-dark fw-medium">{{ $order->coupon_code ?? '-' }}</span>
                                </li>
                                <li class="d-flex justify-content-between mb-2">
                                    <span class="fw-medium text-dark">Total</span>
                                    <span class="fw-medium text-dark">Rp
                                        {{ number_format($order->gross_amount, 0, '.', '.') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
