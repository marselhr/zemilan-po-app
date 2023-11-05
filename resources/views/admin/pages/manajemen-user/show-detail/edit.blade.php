@extends('admin.pages.manajemen-user.show-detail.index')


@section('card')
    <div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h3 class="mb-0">Detail Profil Pengguna</h3>
            <p class="mb-0">Anda sepenuhnya memiliki kendali atas pengaturan akun pengguna.</p>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div>
                <!-- Form -->
                <form class="row gx-3 needs-validation" novalidate action="{{ route('admin.user.update', $user) }}"
                    method="post">
                    @csrf
                    <div class="col-12">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" name="avatar" src="{{ asset('images/' . $user->avatar) }}">
                    </div>
                    <!-- First name -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="fname">First Name</label>
                        <input type="text" id="fname" class="form-control" placeholder="First Name"
                            value="{{ $user->first_name }}" required name="first_name" />
                        <div class="invalid-feedback">Please enter first name.</div>
                    </div>
                    <!-- Last name -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="lname">Last Name</label>
                        <input type="text" id="lname"
                            class="form-control {{ $errors->has('last_name') ? 'invalid' : '' }}" placeholder="Last Name"
                            value="{{ $user->last_name }}" name="last_name" />
                        @error('last_name')
                            <div class="invalid-feedback">{{ $error->last_name }}</div>
                        @enderror
                    </div>
                    <!-- Phone -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" placeholder="Phone" name="phone_number"
                            value="{{ $user->phone_number }}" required />
                        <div class="invalid-feedback">Please enter phone number.</div>
                    </div>
                    <div class="col-12">
                        <!-- Button -->
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script>
        FilePond.setOptions({
            server: {
                process: "{{ route('admin.user.avatar.upload', $user) }}",
                revert: "{{ route('admin.user.avatar.delete', $user) }}",
                headers: {
                    'X-CSRF-TOKEN': "{{ @csrf_token() }}",
                }
            }
        });

        // Create the FilePond instance
        const inputElement = document.querySelector('input[name="avatar"]');
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
        )
        // Create a FilePond instance
        const pond = FilePond.create(inputElement)
    </script>
@endsection
