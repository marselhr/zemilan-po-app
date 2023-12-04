@extends('layouts.app')

@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 py-8 py-xl-0">
                    <!-- Card -->
                    <div class="card shadow ">
                        <!-- Card body -->
                        <div class="card-body p-6">
                            <div class="mb-4">
                                <h1 class="mb-1  fw-bold">Ubah Password</h1>
                            </div>
                            <!-- Form -->
                            <form class="needs-validation" novalidate method="POST" action="{{ route('changePWpost') }}">
                                @csrf

                                <!-- Username -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        value="{{ Auth::user()->email }}" disabled autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password Lama -->
                                <div class="mb-3">
                                    <label for="passwordlamaform" class="form-label">Kata Sandi Lama</label>
                                    <input id="passwordlamaform" type="password" required class="form-control"
                                        name="passwordlamaform" placeholder="Kata Sandi Lama" required>
                                    <div class="invalid-feedback">
                                        Silakhan masukan password lama anda
                                    </div>
                                </div>

                                <!-- Password Baru -->
                                <div class="mb-3">
                                    <label for="passwordBaru" class="form-label">Kata Sandi Baru</label>
                                    <input id="passwordBaru" type="password" class="form-control" name="passwordBaru"
                                        placeholder="Kata Sandi Baru" required>
                                        <div class="invalid-feedback">
                                            Silakhan masukan password baru anda
                                        </div>
                                </div>

                                <!-- Checkbox -->

                                <div>
                                    <!-- Button -->
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary ">{{ __('Update Password') }}</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
