@extends('layouts.app')



@section('content')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <div class="container px-4 mt-4">
        <nav class="nav nav-borders">
            <a class="nav-link" href="{{ route('mainprofile') }}">Profil</a>
            <a class="nav-link active ms-0" href="{{ route('alamatprofile') }}">Alamat</a>
            <a class="nav-link" href="#">Pembayaran</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">


        </div>
    </div>
    <script></script>
@endsection
