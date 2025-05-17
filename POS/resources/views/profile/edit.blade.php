@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Profil</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row mb-3">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama', auth()->user()->nama) }}" required
                                        autocomplete="nama" autofocus>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="profile_photo" class="col-md-4 col-form-label text-md-right">Foto Profil</label>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        @if(auth()->user()->profile_photo)
                                            <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}"
                                                alt="Profile Photo" class="img-thumbnail" style="max-width: 150px;">
                                        @else
                                            <p>Belum ada foto profil</p>
                                        @endif
                                    </div>
                                    <input id="profile_photo" type="file"
                                        class="form-control @error('profile_photo') is-invalid @enderror"
                                        name="profile_photo" accept="image/*">
                                    <small class="form-text text-muted">Upload foto baru untuk mengganti foto profil (JPG,
                                        PNG, maksimal 2MB)</small>
                                    @error('profile_photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const photoInput = document.getElementById('profile_photo');
            const photoPreview = document.querySelector('.img-thumbnail') || document.createElement('img');

            if (!document.querySelector('.img-thumbnail')) {
                photoPreview.classList.add('img-thumbnail');
                photoPreview.style.maxWidth = '150px';
                photoPreview.style.display = 'none';
                document.querySelector('.col-md-6').insertBefore(photoPreview, document.querySelector('small.form-text'));
            }

            photoInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        photoPreview.src = e.target.result;
                        photoPreview.style.display = 'block';
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
    </script>
@endsection