<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pelatihan Offline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layouts.template')

    @section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-center text-primary">Create Pelatihan Offline</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('pelatihan_offline.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nama Pelatihan -->
                    <div class="mb-3">
                        <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                        <input id="nama_pelatihan" type="text" class="form-control" name="nama_pelatihan" value="{{ old('nama_pelatihan') }}" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea id="deskripsi" class="form-control" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                    </div>

                    <!-- Jenis -->
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select id="jenis" class="form-select" name="jenis" required>
                            <option value="offline">Offline</option>
                        </select>
                    </div>

                    <!-- Jadwal Mulai -->
                    <div class="mb-3">
                        <label for="jadwal_mulai" class="form-label">Jadwal Mulai</label>
                        <input id="jadwal_mulai" type="date" class="form-control" name="jadwal_mulai" value="{{ old('jadwal_mulai') }}" required>
                    </div>

                    <!-- Jadwal Selesai -->
                    <div class="mb-3">
                        <label for="jadwal_selesai" class="form-label">Jadwal Selesai</label>
                        <input id="jadwal_selesai" type="date" class="form-control" name="jadwal_selesai" value="{{ old('jadwal_selesai') }}" required>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi</label>
                        <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ old('lokasi') }}" required>
                    </div>

                    <!-- Kapasitas -->
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas</label>
                        <input id="kapasitas" type="number" class="form-control" name="kapasitas" value="{{ old('kapasitas') }}" required>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input id="harga" type="number" step="0.01" class="form-control" name="harga" value="{{ old('harga') }}" required>
                    </div>

                    <!-- Foto Pelatihan -->
                    <div class="mb-3">
                        <label for="foto_pelatihan" class="form-label">Foto Pelatihan</label>
                        <input id="foto_pelatihan" type="file" class="form-control" name="foto_pelatihan">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
