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
                <form class="" action="{{ route('admin.user.update', $user) }}" method="post">
                    @csrf
                    <div class=" row d-none avatar-xxl col-12 mx-auto mb-4" id="inputFile">
                        <input type="file" name="avatar">
                    </div>
                    <div id="avatarWrapper"
                        class="d-flex flex-column align-items-center justify-content-center  mb-4 mb-lg-0">
                        <img src="{{ asset('images/' . $user->avatar) }}" id="img-uploaded"
                            class="avatar-xxl rounded-circle" alt="avatar" />
                        <div class="my-3 mx-1">
                            <button type="button" id="show-input" class="btn btn-outline-secondary btn-sm">Ubah
                                Avatar</button>
                        </div>
                    </div>

                    <div class="row gx-3">
                        <!-- First name -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="fname">Nama Depan</label>
                            <input type="text" id="fname" class="form-control" placeholder="First Name"
                                value="{{ $user->first_name }}" required name="first_name" />
                            <div class="invalid-feedback">silahkan masukkan nama depan</div>
                        </div>
                        <!-- Last name -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="lname">Nama Belakang</label>
                            <input type="text" id="lname"
                                class="form-control {{ $errors->has('last_name') ? 'invalid' : '' }}"
                                placeholder="Last Name" value="{{ $user->last_name }}" name="last_name" />
                            @error('last_name')
                                <div class="invalid-feedback">{{ $error->last_name }}</div>
                            @enderror
                        </div>
                        <!-- Phone -->
                        <div class="mb-3 col-12 col-md-6">
                            <label class="form-label" for="phone">Nomor telepon</label>
                            <input type="text" id="phone" class="form-control" placeholder="Phone"
                                name="phone_number" value="{{ $user->phone_number }}" required />
                            <div class="invalid-feedback">Please enter phone number.</div>
                        </div>
                        <div class="col-12 flex justify-content-end">
                            <!-- Button -->
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
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
        const btnShow = document.querySelector('#show-input')
        const inputFile = document.querySelector('#inputFile')
        const avatarWrapper = document.querySelector('#avatarWrapper')
        const inputElement = document.querySelector('input[name="avatar"]');

        btnShow.addEventListener('click', function() {
            inputFile.classList.remove('d-none');
            avatarWrapper.classList.add('d-none')
        })
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

        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview,
            FilePondPluginImageCrop,
            FilePondPluginImageResize,
            FilePondPluginImageTransform,
            FilePondPluginImageEdit
        );
        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {
            labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        })
    </script>
@endsection
