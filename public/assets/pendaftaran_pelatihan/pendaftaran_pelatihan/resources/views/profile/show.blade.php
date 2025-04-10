@extends('layouts.template')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Details</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- AOS Animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #0d6efd;
            color: white;
            font-size: 1.2rem;
            border-radius: 0.5rem 0.5rem 0 0;
        }
        .form-control:disabled {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .img-fluid {
            max-width: 150px;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary" data-aos="fade-down">Profile Details</h1>
    @if (session('success'))
        <div class="alert alert-success" data-aos="fade-up">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8" data-aos="zoom-in">
            <div class="card">
                <div class="card-header">
                    <strong>Profile Information</strong>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" value="{{ $profile->nama }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jenis_kelamin" value="{{ $profile->jenis_kelamin }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tanggal_lahir" value="{{ $profile->tanggal_lahir }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="{{ $profile->email }}" disabled>
                                </div>
                                <div class="mb-3">
    <label for="nomor_hp" class="form-label">Nomor HP</label>
    @if ($profile->nomor_hp)
        <a href="https://wa.me/{{ $profile->nomor_hp }}" target="_blank" class="form-control text-decoration-none text-reset d-block" style="cursor: pointer;">
            {{ $profile->nomor_hp }}
        </a>
    @else
        <input type="text" class="form-control" id="nomor_hp" value="No Phone Number Available" disabled>
    @endif
</div>
                                <div class="mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" value="{{ $profile->provinsi }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="kabupaten" class="form-label">Kabupaten</label>
                                    <input type="text" class="form-control" id="kabupaten" value="{{ $profile->kabupaten }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" value="{{ $profile->kecamatan }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="desa" class="form-label">Desa</label>
                                    <input type="text" class="form-control" id="desa" value="{{ $profile->desa }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" value="{{ $profile->nik }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" value="{{ $profile->pekerjaan }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <div>
                                        @if ($profile->gambar)
                                            <img src="{{ asset('storage/' . $profile->gambar) }}" alt="Profile Image" class="img-fluid rounded">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <a href="{{ route('profile.edit', $profile->profileID) }}" class="btn btn-warning me-2">
                                    <i class="fas fa-edit"></i> Edit Profile
                                </a>
                                <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS Animations -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
    });
</script>
</body>
</html>
@endsection