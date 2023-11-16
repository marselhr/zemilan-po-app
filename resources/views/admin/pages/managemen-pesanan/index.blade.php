@extends('admin.layouts.app')

@push('customCss')
    <!-- Datatable Css -->
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
@endpush

@push('customJs')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endpush

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h1 class="mb-1 h2 fw-bold">Data Managemen Pesanan</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Management Pesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card mb-4">
                <div class="table-responsive border-0 overflow-y-hidden">
                    <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox" id="datatable">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>ID Pesanan</th>
                                <th>Nama Pengguna</th>
                                <th>Kode Kupon</th>
                                <th>Total Pembayaran</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($management_pesanan as $management_pesan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $management_pesan->order_id }}</td>
                                    <td>{{ $management_pesan->user->first_name }} {{ $management_pesan->user->last_name }}</td>
                                    <td>{{ $management_pesan->coupon_code ?? "Tidak Ada" }}</td>
                                    <td>{{ $management_pesan->gross_amount }}</td>
                                    <td>{{ $management_pesan->payment_status }}</td>
                                    <td><a href="{{ route('admin.management-pesanan.show', $management_pesan) }}">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal START --}}
    {{-- Modal tambah --}}
    {{-- end Modal tambah --}}
@endsection
