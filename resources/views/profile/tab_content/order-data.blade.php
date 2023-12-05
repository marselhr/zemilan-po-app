<div class="col-xl-12 ">
    @foreach ($data['orders'] as $order)
        <p>{{ $order->id }} amount: {{ $order->gross_amount }}</p>
    @endforeach
</div>
