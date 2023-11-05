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
            <form class="row gx-3 needs-validation" novalidate action="{{ route('admin.user.update', $user) }}" method="post">
                @csrf
                <div style="width: 200px; height: 200px">

                    <input type="file" name="avatar">
                </div>

                <div class="d-lg-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center mb-4 mb-lg-0">

                        <div class="ms-3">
                            <h4 class="mb-0">Your avatar</h4>
                            <p class="mb-0">PNG or JPG no bigger than 800px wide and tall.</p>
                        </div>
                    </div>
                    <div>
                        <a href="#" class="btn btn-outline-secondary btn-sm">Update</a>
                        <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                    </div>
                </div>
                <hr class="my-5" />
                <div>
                    <h4 class="mb-0">Personal Details</h4>
                    <p class="mb-4">Edit your personal information and address.</p>
                    <!-- Form -->

                    {{-- <div class="d-flex align-items-center mb-4 mb-lg-0"> --}}
                    {{-- </div> --}}
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
                    {{-- <!-- Address -->
                    <div class="mb-3 col-12 col-md-6">
                        <label class="form-label" for="address">Address Line </label>
                        <input type="text" id="address" class="form-control" placeholder="Address" required />
                        <div class="invalid-feedback">Please enter address.</div>
                    </div> --}}
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
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>

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
        // const inputElement = document.querySelector('input[type="file"]');
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginImageEdit,
            FilePondPluginImageCrop,
            FilePondPluginImageResize,
            FilePondPluginImageTransform,
        )
        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 10,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        });
    </script>
@endsection
