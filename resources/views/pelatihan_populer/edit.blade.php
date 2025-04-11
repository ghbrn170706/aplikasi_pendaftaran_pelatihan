<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Edit Pelatihan</h2>
    <form action="{{ route('pelatihan_populer.update', $pelatihans_populer->pelatihanID) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
        @csrf
        @method('PUT')

        <!-- Nama Pelatihan -->
        <div class="mb-3">
            <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
            <input type="text" id="nama_pelatihan" name="nama_pelatihan" value="{{ old('nama_pelatihan', $pelatihans_populer->nama_pelatihan) }}" required class="form-control">
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control">{{ old('deskripsi', $pelatihans_populer->deskripsi) }}</textarea>
        </div>

        <!-- Jenis -->
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select id="jenis" name="jenis" required class="form-select">
                <option value="online" {{ $pelatihans_populer->jenis == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ $pelatihans_populer->jenis == 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>

        <!-- Jadwal Mulai & Selesai -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="jadwal_mulai" class="form-label">Jadwal Mulai</label>
                <input type="date" id="jadwal_mulai" name="jadwal_mulai" value="{{ old('jadwal_mulai', $pelatihans_populer->jadwal_mulai) }}" required class="form-control">
            </div>
            <div class="col-md-6">
                <label for="jadwal_selesai" class="form-label">Jadwal Selesai</label>
                <input type="date" id="jadwal_selesai" name="jadwal_selesai" value="{{ old('jadwal_selesai', $pelatihans_populer->jadwal_selesai) }}" required class="form-control">
            </div>
        </div>

        <!-- Lokasi -->
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $pelatihans_populer->lokasi) }}" class="form-control">
        </div>

        <!-- Kapasitas & Harga -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" id="kapasitas" name="kapasitas" value="{{ old('kapasitas', $pelatihans_populer->kapasitas) }}" required class="form-control">
            </div>
            <div class="col-md-6">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga', $pelatihans_populer->harga) }}" step="0.01" required class="form-control">
            </div>
        </div>

        <!-- Link Zoom -->
        <div class="mb-3">
            <label for="link_zoom" class="form-label">Link Zoom (jika Online)</label>
            <input type="url" id="link_zoom" name="link_zoom" value="{{ old('link_zoom', $pelatihans_populer->link_zoom) }}" class="form-control">
        </div>

        <!-- Foto & Gambar Pelatihan -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="foto_pelatihan" class="form-label">Foto Pelatihan</label>
                <input type="file" id="foto_pelatihan" name="foto_pelatihan" class="form-control">
                @if($pelatihans_populer->foto_pelatihan)
                    <img src="{{ asset('storage/' . $pelatihans_populer->foto_pelatihan) }}" class="img-thumbnail mt-2" width="100">
                @endif
            </div>
            <div class="col-md-6">
                <label for="gambar_pelatihan" class="form-label">Gambar Pelatihan</label>
                <input type="file" id="gambar_pelatihan" name="gambar_pelatihan" class="form-control">
                @if($pelatihans_populer->gambar_pelatihan)
                    <img src="{{ asset('storage/' . $pelatihans_populer->gambar_pelatihan) }}" class="img-thumbnail mt-2" width="100">
                @endif
            </div>
        </div>

        <!-- Sertifikat -->
        <div class="mb-3">
            <label for="sertifikat" class="form-label">Sertifikat</label>
            <textarea id="sertifikat" name="sertifikat" rows="2" required class="form-control">{{ old('sertifikat', $pelatihans_populer->sertifikat) }}</textarea>
        </div>

        <!-- Level & Kategori -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="level" class="form-label">Level</label>
                <input type="text" id="level" name="level" value="{{ old('level', $pelatihans_populer->level) }}" required class="form-control">
            </div>
            <div class="col-md-6">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $pelatihans_populer->kategori) }}" required class="form-control">
            </div>
        </div>

        <!-- Sub Judul -->
        <div class="mb-3">
            <label for="sub_judul" class="form-label">Sub Judul</label>
            <input type="text" id="sub_judul" name="sub_judul" value="{{ old('sub_judul', $pelatihans_populer->sub_judul) }}" required class="form-control">
        </div>

        <!-- Tombol Update & Batal -->
        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pelatihan.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
