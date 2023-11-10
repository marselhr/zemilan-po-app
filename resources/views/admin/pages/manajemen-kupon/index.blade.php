@extends('admin.layouts.app')

@push('customCss')
    <!-- Datatable Css -->
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/bootstrap-switch-button/css/bootstrap-switch-button.min.css') }}" rel="stylesheet">
@endpush

@push('customJs')
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-switch-button/dist/bootstrap-switch-button.min.js') }}"></script>

    <script type="text/javascript">
        new DataTable('#datatable');

        $('input[name=toggle]').change(function() {
            let mode = $(this).prop('checked');
            let id = $(this).val();
            $.ajax({
                url: "{{ route('coupon.status.update') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    mode: mode,
                    id: id
                },
                success: function(response) {
                    console.log(response.status);
                }
            });
        });

        $(document).ready(function() {
            $('body').on('click', '#editCoupon', function(e) {
                e.preventDefault()
                let coupon = $(this).data('id')
                let urlUpdate = $(this).data('route-update')
                console.log(urlUpdate);
                $.get('coupon/' + coupon + '/edit', function(data) {
                    $('input[name=code]').val(data.data.code);
                    $('option[value="' + data.data.type + '"]').prop('selected', true);
                    $('input[name=value]').val(data.data.value);
                })
                $('#editCouponForm').attr('action', urlUpdate);
            })
        })
    </script>
@endpush
@section('content')
    @include('admin.pages.manajemen-kupon.modals._add')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h1 class="mb-1 h2 fw-bold">Data Kupon</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Kupon</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCouponModal">Tambah
                        Kupon</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 text-break">
            @include('generals._validation')
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card mb-4">
                <div class="table-responsive border-0 overflow-y-hidden">
                    <table class="table mb-0 text-nowrap table-centered table-hover table-with-checkbox" id="datatable"
                        style="width: 100%">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkAll" />
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th>KODE</th>
                                <th>TIPE</th>
                                <th>NILAI</th>
                                <th>STATUS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="categoryCheck3" />
                                            <label class="form-check-label" for="categoryCheck3"></label>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $coupon->code }}
                                    </td>
                                    <td>
                                        {{ $coupon->type }}
                                    </td>
                                    <td>
                                        {{ $coupon->value }}
                                    </td>
                                    <td>
                                        <input value="{{ $coupon->id }}" type="checkbox" data-toggle="switchbutton"
                                            {{ $coupon->status == 'active' ? 'checked' : '' }} data-onlabel="Active"
                                            data-offlabel="Inactive" data-onstyle="success" data-offstyle="danger"
                                            data-size="xs" name="toggle">
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
                                                <a class="dropdown-item" href="{{ route('coupon.edit', $coupon->id) }}"
                                                    data-route-update="{{ route('coupon.update', $coupon) }}"
                                                    id="editCoupon" data-bs-toggle="modal" data-bs-target="#editCouponModal"
                                                    data-id="{{ $coupon->id }}"><i
                                                        class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                <a class="dropdown-item" href="{{ route('coupon.show', $coupon) }}"><i
                                                        class="fe fe-info dropdown-item-icon"></i>Detail</a>

                                                <a href="{{ route('coupon.destroy', $coupon) }}" class="dropdown-item"
                                                    data-confirm-delete="true"><i
                                                        class="fe fe-trash dropdown-item-icon"></i>Hapus</a>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach

                            @include('admin.pages.manajemen-kupon.modals._edit')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
