<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- AOS -->
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
        .is-invalid {
            border-color: #dc3545;
        }
        .invalid-feedback {
            color: #dc3545;
            display: block;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center text-primary" data-aos="fade-down">Edit Profile</h1>

    @if (session('success'))
        <div class="alert alert-success" data-aos="fade-up">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" data-aos="fade-up">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8" data-aos="zoom-in">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Profile Information</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', $profile->profileID) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $profile->nama) }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                        <option value="Laki-laki" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin', $profile->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $profile->tanggal_lahir) }}" required>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profile->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor HP</label>
                                    <input type="text" name="nomor_hp" class="form-control @error('nomor_hp') is-invalid @enderror" value="{{ old('nomor_hp', $profile->nomor_hp) }}" required>
                                    @error('nomor_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control @error('provinsi') is-invalid @enderror" value="{{ old('provinsi', $profile->provinsi) }}" required>
                                    @error('provinsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Kabupaten</label>
                                    <input type="text" name="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" value="{{ old('kabupaten', $profile->kabupaten) }}" required>
                                    @error('kabupaten')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" value="{{ old('kecamatan', $profile->kecamatan) }}" required>
                                    @error('kecamatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Desa</label>
                                    <input type="text" name="desa" class="form-control @error('desa') is-invalid @enderror" value="{{ old('desa', $profile->desa) }}" required>
                                    @error('desa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NIK</label>
                                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $profile->nik) }}" required>
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <select class="form-select @error('pekerjaan') is-invalid @enderror" name="pekerjaan" required>
                                        <option value="bekerja" {{ old('pekerjaan', $profile->pekerjaan) == 'bekerja' ? 'selected' : '' }}>Bekerja</option>
                                        <option value="tidak bekerja" {{ old('pekerjaan', $profile->pekerjaan) == 'tidak bekerja' ? 'selected' : '' }}>Tidak Bekerja</option>
                                        <option value="mahasiswa" {{ old('pekerjaan', $profile->pekerjaan) == 'mahasiswa' ? 'selected' : '' }}>Pelajar/Mahasiswa</option>
                                    </select>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar</label>
                                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="mt-2">
                                        @if ($profile->gambar)
                                            <img src="{{ asset('storage/' . $profile->gambar) }}" alt="Current Image" class="img-fluid">
                                            <p class="text-muted mt-1">Gambar saat ini</p>
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-warning me-2">
                                    <i class="fas fa-save"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('profile.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
    });
</script>
</body>
</html>