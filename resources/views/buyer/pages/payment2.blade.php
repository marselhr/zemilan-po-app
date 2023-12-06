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
                        <div class=" mt-2 mt-lg-0">
                            <p class="mb-0 text-primary-hover">
                                1 x {{ $product->name }}
                            </p>
                        </div>

                    </div>
                    <!-- card footer -->
                    <div class="card-footer">
                        <div class=" px-0 d-flex justify-content-between fs-5 text-dark fw-semibold">
                            <span>Total (RUPIAH)</span>
                            <span>Rp <span id="grandTotal">
                                    {{ number_format($product->price, 0, '.', '.') }}
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
