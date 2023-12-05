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
        new DataTable('#datatable');
    </script>
@endpush
@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h1 class="mb-1 h2 fw-bold">Data Pemasukan</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Pemasukan</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('admin.income.export') }}" class="btn btn-primary">Export Data</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card mb-4">
                <div class="table-responsive border-0 overflow-y-hidden">
                    <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox" id="datatable"
                        style="width: 100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>ID Order</th>
                                <th>Nama Pemesan</th>
                                <th>Total Pembayaran</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $totalIncome = 0;
                            @endphp

                            @foreach ($income_data as $income)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $income->order_id }}
                                    </td>
                                    <td>
                                        {{ $income->user->first_name }} {{ $income->user->last_name }}
                                    </td>
                                    <td>
                                        Rp.{{ number_format($income->gross_amount, 0, '.', '.') }}
                                    </td>
                                    <td>
                                        {{ $income->updated_at }}
                                    </td>
                                </tr>
                                @php
                                    $totalIncome += $income->gross_amount;
                                @endphp
                            @endforeach
                        </tbody>

                        <!-- Display Total Income at the end of the table -->
                        <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td>Total Pemasukan :</td>
                                <td>Rp.{{ number_format($totalIncome, 0, '.', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
