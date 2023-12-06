<div class="col-xl-12 ">
    <h1 class="text-center">Riwayat Pesanan Anda</h1>
    <div class="table-responsive border-0 overflow-y-hidden">
        <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox" id="datatable">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>ID Pesanan</th>
                    <th>Total Pembayaran</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data['orders'] as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->order_id }}</td>
                        <td>Rp.{{ number_format($order->gross_amount, 0, '.', '.') }}</td>
                        <td> <span class="badge bg-{{$order->payment_status == 'Paid' ? 'success':'danger'}}">
                            {{ $order->payment_status }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
