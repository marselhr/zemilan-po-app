@extends('layouts.app')


@section('content')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>



    <div class="container">
        <div class="row justify-content-center  mt-5 mb-5">
            <div class="col-lg-6 ">
                <div class="card mb-4">
                    <!-- card body -->
                    <div class="card-body">
                        <!-- text -->
                        <h4 class="">Pembayaran</h4>
                        <p class="mb-4">Id: {{ $order->order_id }}</p>
                        <hr>

                        <h4 class="">Rincian Pembelian</h4>
                        @foreach (Auth::user()->cartItems as $item)
                            <div class=" mt-2 mt-lg-0">
                                <p class="mb-1 text-primary-hover">
                                    {{ $item->quantity }} x {{ $item->product->name }}
                                </p>
                            </div>
                        @endforeach
                        <hr>
                        <!-- list group -->
                        <ul class="list-group list-group-flush">
                            <!-- list group item -->

                            <li class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium border-0">
                                <span>Sub Total :</span>
                                <span>Rp
                                    {{ number_format(App\Models\CartItem::getSubTotal(Auth::user()), 2, ',', '.') }}</span>
                            </li>
                            <!-- list group item -->
                            <li class="list-group-item px-0 d-flex justify-content-between fs-5 text-dark fw-medium">
                                <span>Diskon <br><span class="text-muted" id="couponCode">
                                        @if (Session::has('couponCode'))
                                            {{ Session::get('couponCode') }}
                                        @endif
                                    </span>: </span>
                                <span>-Rp <span id='discountAmount'>
                                        @if (Session::has('discount'))
                                            {{ number_format(Session::get('discount'), 2, ',', '.') }}
                                        @else
                                            0
                                        @endif

                                    </span></span>
                            </li>


                        </ul>
                    </div>
                    <!-- card footer -->
                    <div class="card-footer">
                        <div class=" px-0 d-flex justify-content-between fs-5 text-dark fw-semibold">
                            <span>Total (RUPIAH)</span>
                            <span>Rp <span id="grandTotal">
                                    @if (Session::has('grandTotal'))
                                        {{ number_format(Session::get('grandTotal'), 2, ',', '.') }}
                                    @else
                                        {{ number_format(App\Models\CartItem::getSubTotal(Auth::user()), 2, ',', '.') }}
                                    @endif
                                </span>
                            </span>
                        </div>

                        <button class="btn btn-primary col-12 mx-auto py-2 mt-5" id="pay-button">Bayar</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    window.location.href = '/invoice/{{ $order->order_id }}';
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection
