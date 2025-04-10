
<div class="container">
    <h1>Edit Pelatihan</h1>
    <form action="{{ route('pelatihan_populer.update', $pelatihans_populer->pelatihanID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_pelatihan">Nama Pelatihan</label>
            <input type="text" name="nama_pelatihan" id="nama_pelatihan" class="form-control" value="{{ old('nama_pelatihan', $pelatihans_populer->nama_pelatihan) }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $pelatihans_populer->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label for="jenis">Jenis Pelatihan</label>
            <select name="jenis" id="jenis" class="form-control" required>
                <option value="online" {{ $pelatihans_populer->jenis == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ $pelatihans_populer->jenis == 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jadwal_mulai">Jadwal Mulai</label>
            <input type="date" name="jadwal_mulai" id="jadwal_mulai" class="form-control" value="{{ old('jadwal_mulai', $pelatihans_populer->jadwal_mulai) }}" required>
        </div>

        <div class="form-group">
            <label for="jadwal_selesai">Jadwal Selesai</label>
            <input type="date" name="jadwal_selesai" id="jadwal_selesai" class="form-control" value="{{ old('jadwal_selesai', $pelatihans_populer->jadwal_selesai) }}" required>
        </div>

        <div class="form-group">
            <label for="kapasitas">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ old('kapasitas', $pelatihans_populer->kapasitas) }}" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="{{ old('harga', $pelatihans_populer->harga) }}" required>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ old('lokasi', $pelatihans_populer->lokasi) }}">
        </div>

        <div class="form-group">
            <label for="link_zoom">Link Zoom</label>
            <input type="url" name="link_zoom" id="link_zoom" class="form-control" value="{{ old('link_zoom', $pelatihans_populer->link_zoom) }}">
        </div>

        <div class="form-group">
            <label for="foto_pelatihan">Foto Pelatihan</label>
            <input type="file" name="foto_pelatihan" id="foto_pelatihan" class="form-control">
            @if($pelatihans_populer->foto_pelatihan)
                <img src="{{ asset('storage/' . $pelatihans_populer->foto_pelatihan) }}" alt="Foto Pelatihan" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="gambar_pelatihan">Gambar Pelatihan</label>
            <input type="file" name="gambar_pelatihan" id="gambar_pelatihan" class="form-control">
            @if($pelatihans_populer->gambar_pelatihan)
                <img src="{{ asset('storage/' . $pelatihans_populer->gambar_pelatihan) }}" alt="Gambar Pelatihan" width="100">
            @endif
        </div>

        <div class="form-group">
            <label for="sertifikat">Sertifikat</label>
            <input type="text" name="sertifikat" id="sertifikat" class="form-control" value="{{ old('sertifikat', $pelatihans_populer->sertifikat) }}" required>
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" name="level" id="level" class="form-control" value="{{ old('level', $pelatihans_populer->level) }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori', $pelatihans_populer->kategori) }}" required>
        </div>

        <div class="form-group">
            <label for="sub_judul">Sub Judul</label>
            <input type="text" name="sub_judul" id="sub_judul" class="form-control" value="{{ old('sub_judul', $pelatihans_populer->sub_judul) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Pelatihan</button>
    </form>
</div>
    