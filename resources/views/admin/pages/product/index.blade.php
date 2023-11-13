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
                    <h1 class="mb-1 h2 fw-bold">Data Produk</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Produk</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Tambah Produk</a>
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
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Berat</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        @php
                            $no = 1;
                        @endphp
                        <tbody>
                            @foreach ($product as $products)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        {{ $products->name }}
                                    </td>
                                    <td>
                                        {{ $products->category->name }}
                                    </td>
                                    <td>
                                        {{ $products->stock }}
                                    </td>
                                    <td>
                                        {{ $products->price }}
                                    </td>
                                    <td>
                                        {{ $products->weight }} Gr
                                    </td>

                                    <td>
                                        <span class="dropdown dropstart">
                                            <a class="btn-icon btn btn-ghost btn-sm rounded-circle" href="#"
                                                role="button" id="courseDropdown3" data-bs-toggle="dropdown"
                                                data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                                                <span class="dropdown-header">Action</span>
                                                <a class="dropdown-item" href="{{route('admin.product.edit',$products->id)}}" ><i
                                                        class="fe fe-send dropdown-item-icon"></i>Edit</a>
                                                <a class="dropdown-item" href="{{ route('admin.product.show', $products) }}"><i
                                                        class="fe fe-inbox dropdown-item-icon"></i>Detail</a>
                                                <a class="dropdown-item" href="{{ route('admin.product.delete', $products) }}" data-confirm-delete="true"><i
                                                        class="fe fe-trash dropdown-item-icon"></i>Hapus</a>
                                            </span>
                                        </span>
                                    </td>
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
    @include('admin.pages.product.modal.addproduct')
    {{-- end Modal tambah --}}
@endsection
