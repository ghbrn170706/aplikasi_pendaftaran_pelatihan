<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Step container styles */
        .step-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        .step {
            position: relative;
            text-align: center;
            width: 120px;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin: 0 auto;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .step-title {
            margin-top: 10px;
            font-size: 16px;
        }

        .step-line {
            height: 4px;
            background-color: #007bff;
            position: absolute;
            top: 50%;
            left: 60px;
            width: 100px;
            z-index: -1;
        }

        .step.active .step-circle {
            background-color: #28a745;
            transform: scale(1.1);
        }

        .step.active .step-title {
            color: #28a745;
            font-weight: bold;
        }

        .step.completed .step-circle {
            background-color: #28a745;
        }

        .step:last-child .step-line {
            display: none;
        }

        .custom-header {
            margin-top: -20px;
        }

        .text-primary {
            font-weight: bold;
        }
    </style>
</head>
<body>
@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center text-primary">Edit Profile</h1>

    <!-- Header Section -->
    <div class="bg-primary text-white py-3 px-4 rounded mb-4 custom-header">
        <h2 class="text-center">Formulir Data Pokok</h2>
        <p class="text-center mb-0">Mohon Lengkapi Semua Isian dengan Benar</p>
    </div>

    <!-- Steps Section -->
    <div class="step-container">
        <div class="step active">
            <div class="step-circle">1</div>
            <div class="step-title">Buat Akun</div>
            <div class="step-line"></div>
        </div>
        <div class="step active">
            <div class="step-circle">2</div>
            <div class="step-title">Data Pokok</div>
            <div class="step-line"></div>
        </div>
        <div class="step">
            <div class="step-circle">3</div>
            <div class="step-title">Selesai</div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="row justify-content-center">
        <div class="col-md-8">
        <form action="{{ route('profile.update', $profile->profileID) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Profile Image -->
                <div class="text-center mb-4">
                    <label for="gambar" class="form-label">Upload Profile Image</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    <div class="mt-3">
                        @if ($profile->gambar)
                            <img id="profileImage" src="{{ asset('storage/' . $profile->gambar) }}" alt="Profile Image" class="rounded-circle" width="150" style="display: block;">
                        @else
                            <img id="profileImage" src="#" alt="Profile Image" class="rounded-circle" width="150" style="display: none;">
                        @endif
                    </div>
                </div>

                <!-- Name and NIK -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $profile->nama) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $profile->nik) }}" required>
                    </div>
                </div>

                <!-- Email and Phone -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $profile->email) }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp', $profile->nomor_hp) }}" required>
                    </div>
                </div>

                <!-- Birthdate and Gender -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki-laki" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- Address -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-select" id="provinsi" name="provinsi" required>
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="kabupaten" class="form-label">Kota/Kabupaten</label>
                        <select class="form-select" id="kabupaten" name="kabupaten" required>
                            <option value="">Pilih Kabupaten</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-select" id="kecamatan" name="kecamatan" required>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="desa" class="form-label">Desa</label>
                        <select class="form-select" id="desa" name="desa" required>
                            <option value="">Pilih Desa</option>
                        </select>
                    </div>
                </div>

                <!-- Job -->
                <select class="form-select" id="pekerjaan" name="pekerjaan" required>
                    <option value="bekerja" {{ old('pekerjaan', $profile->pekerjaan) == 'bekerja' ? 'selected' : '' }}>Bekerja</option>
                    <option value="tidak bekerja" {{ old('pekerjaan', $profile->pekerjaan) == 'tidak bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                    <option value="mahasiswa" {{ old('pekerjaan', $profile->pekerjaan) == 'mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                </select>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Image Preview
    document.getElementById("gambar").addEventListener("change", function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const previewImage = document.getElementById("profileImage");
            previewImage.src = reader.result;
            previewImage.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Image Preview
    document.getElementById("gambar").addEventListener("change", function(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const previewImage = document.getElementById("profileImage");
            previewImage.src = reader.result;
            previewImage.style.display = "block";
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Load Provinsi saat halaman dimuat
        $.getJSON("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json", function (data) {
            let provinsiOptions = '<option value="">Pilih Provinsi</option>';
            $.each(data, function (index, item) {
                provinsiOptions += `<option value="${item.id}">${item.name}</option>`;
            });
            $("#provinsi").html(provinsiOptions);
        });

        // Load Kabupaten berdasarkan Provinsi yang dipilih
        $("#provinsi").on("change", function () {
            let provinsiId = $(this).val();
            $("#kabupaten").html('<option value="">Memuat...</option>');
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`, function (data) {
                let kabupatenOptions = '<option value="">Pilih Kabupaten</option>';
                $.each(data, function (index, item) {
                    kabupatenOptions += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#kabupaten").html(kabupatenOptions);
            });
        });

        // Load Kecamatan berdasarkan Kabupaten yang dipilih
        $("#kabupaten").on("change", function () {
            let kabupatenId = $(this).val();
            $("#kecamatan").html('<option value="">Memuat...</option>');
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kabupatenId}.json`, function (data) {
                let kecamatanOptions = '<option value="">Pilih Kecamatan</option>';
                $.each(data, function (index, item) {
                    kecamatanOptions += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#kecamatan").html(kecamatanOptions);
            });
        });

        // Load Desa berdasarkan Kecamatan yang dipilih
        $("#kecamatan").on("change", function () {
            let kecamatanId = $(this).val();
            $("#desa").html('<option value="">Memuat...</option>');
            $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`, function (data) {
                let desaOptions = '<option value="">Pilih Desa</option>';
                $.each(data, function (index, item) {
                    desaOptions += `<option value="${item.id}">${item.name}</option>`;
                });
                $("#desa").html(desaOptions);
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection