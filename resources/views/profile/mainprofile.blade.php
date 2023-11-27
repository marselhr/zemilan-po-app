@extends('layouts.app')

@push('customCss')
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
@endpush

@push('customJs')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    @include('profile.scripts._index_script')
@endpush

@section('content')
    <div class="container-xl px-4 mt-4">
        @include('generals._validation')
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0" id="profile-tab" href="{{ route('mainprofile') }}">Profil</a>
            <a class="nav-link" href="#" id="address" data-url-address="{{ route('alamatprofile') }}">Alamat</a>
            <a class="nav-link" href="#" id="order-history">Riwayat Pesanan</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row" id="tab-content">
            @include('profile.tab_content.profile')
        </div>
    </div>
@endsection
