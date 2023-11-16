@extends('admin.layouts.app')

@push('customCss')
    <!-- Datatable Css -->
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">

    <!-- Gaya Kustom -->
    <style>
        /* Tambahkan gaya kustom di sini */

        /* Gaya Header Halaman */
        .page-header {
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 30px;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 2.25rem;
            margin-bottom: 0.5rem;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 0;
        }

        .breadcrumb-item {
            font-size: 0.875rem;
        }

        /* Gaya Kartu */
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        /* Gaya Bagian Detail */
        .detail-section {
            padding: 30px;
        }

        .detail-section h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .lead {
            font-size: 0.875rem;
            margin-bottom: 0.75rem;
        }

        .icon {
            font-size: 1.5rem;
            margin-right: 5px;
        }

        .btn-primary {
            background-color: #4caf50;
            color: #fff;
        }

        /* Menyesuaikan ukuran teks pada bagian Order Info */
        .order-info-text {
            font-size: 1rem;
        }
    </style>
    <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
@endpush

@push('customJs')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <script type="text/javascript">
        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endpush

@section('content')
    <div class="row">
        <!-- Header Halaman -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="page-header">
                <div>
                    <h1 class="mb-1 fw-bold">Data Managemen Pesanan</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('admin.management.pesanan.index') }}">Managemen Pesanan</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Detail Managemen Pesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <section class="detail-section">
            <div class="container">
                <div class="row d-flex align-items-bottom">
                    <div>
                        <h1>Detail Pesanan</h1>

                        <h6 class="lead mb-3">
                            <span class="icon bi bi-file-earmark-text"></span>
                            ID Pesanan: {{ $management_pesanan->order_id }}
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <h5>
                                        <span class="icon bi bi-person"></span>
                                        Pelanggan
                                    </h5>
                                    <p>Nama User : {{ $management_pesanan->user->first_name }} {{ $management_pesanan->user->last_name }}</p>
                                    <p>Email : {{ $management_pesanan->user->email }} </p>
                                    <p>Nomor Telpon : {{ $management_pesanan->user->phone_number ??'Tidak Ada' }} </p>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <h5>
                                        <span class="icon bi bi-pin-map"></span>Alamat
                                    </h5>
                                    <p> Provinsi: {{ $management_pesanan->user->address->province }}</p>
                                    <p> Kota : {{ $management_pesanan->user->address->city }}</p>
                                    <p> Kode POS : {{ $management_pesanan->user->address->post_code }}</p>
                                    <p> Detail : {{ $management_pesanan->user->address->detail }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <h5>
                                        <span class="icon bi bi-card-list order-info-text"></span>
                                        Order Info

                                    </h5>
                                    <p>Status Pembayaran: {{ $management_pesanan->payment_status }}</p>
                                    <p>Total Pembayaran: Rp. {{ number_format($management_pesanan->gross_amount,0, '.', '.') }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <h5><span class="icon bi bi-currency-exchange"></span> Payment Info</h5>
                                    <p>Tipe Pembayaran: {{ $management_pesanan->payment_type ?? 'Tidak Ada' }}</p>
                                    <p>Bank : {{ $management_pesanan->bank ?? 'Tidak Ada' }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Loop untuk menampilkan produk pada pesanan --}}
                        <p class="lead mb-3"><span class="icon bi bi-box"></span> Produk :</p>
                        <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox" id="datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama product</th>
                                    <th>Harga</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($management_pesanan->orderItems as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>Rp. {{ number_format($item->product->price,0, '.', '.') }}</td>
                                    <td>{{ $item->quantity }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div>
                            <a href="{{ route('admin.management.pesanan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
