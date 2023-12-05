<!-- resources/views/coupons/show.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('coupon.index') }}">Kupon</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Kupon</li>
                        </ol>
                    </nav>
                </div>
                <div>
                    <a href="{{ route('coupon.index') }}" class="btn btn-secondary"><i class="fe fe-arrow-left-circle"></i>
                        Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <section class="py-lg-2">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body mb-4 mt-4">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="text-center mb-4">DETAIL KUPON</h2>
                            <table style="border-collapse: collapse; width: 100%;" class="table table-bordered table-hover">
                                <tr style="background-color: #f8f9fa;">
                                    <th style="border: 2px solid #dee2e6; padding: 8px;">Code:</th>
                                    <td style="border: 2px solid #dee2e6; padding: 8px;">{{ $coupon->code }}</td>
                                </tr>
                                <tr>
                                    <th style="border: 2px solid #dee2e6; padding: 8px;">Type:</th>
                                    <td style="border: 2px solid #dee2e6; padding: 8px;">{{ $coupon->type }}</td>
                                </tr>
                                <tr>
                                    <th style="border: 2px solid #dee2e6; padding: 8px;">Max Uses per User:</th>
                                    <td style="border: 2px solid #dee2e6; padding: 8px;">{{ $coupon->max_uses_user }}</td>
                                </tr>
                                <tr>
                                    <th style="border: 2px solid #dee2e6; padding: 8px;">Max Uses:</th>
                                    <td style="border: 2px solid #dee2e6; padding: 8px;">{{ $coupon->max_uses }}</td>
                                </tr>
                                <tr>
                                    <th style="border: 2px solid #dee2e6; padding: 8px;">Status:</th>
                                    <td style="border: 2px solid #dee2e6; padding: 8px;">{{ $coupon->status }}</td>
                                </tr>
                                <tr>
                                    <th style="border: 2px solid #dee2e6; padding: 8px;">Start Date:</th>
                                    <td style="border: 2px solid #dee2e6; padding: 8px;">{{ $coupon->start_date }}</td>
                                </tr>
                                <tr>
                                    <th style="border: 2px solid #dee2e6; padding: 8px;">Expiration Date:</th>
                                    <td style="border: 2px solid #dee2e6; padding: 8px;">{{ $coupon->expiration_date }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
