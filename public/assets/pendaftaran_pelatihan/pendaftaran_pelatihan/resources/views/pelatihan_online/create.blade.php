<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white text-center">
                <h2>Tambah Pelatihan</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('pelatihan_online.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                        <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select class="form-select" id="jenis" name="jenis" required>
                            <option value="online" selected>Online</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="link_zoom" class="form-label">Link Zoom</label>
                        <input type="url" class="form-control" id="link_zoom" name="link_zoom" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="jadwal_mulai" class="form-label">Jadwal Mulai</label>
                            <input type="date" class="form-control" id="jadwal_mulai" name="jadwal_mulai" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jadwal_selesai" class="form-label">Jadwal Selesai</label>
                            <input type="date" class="form-control" id="jadwal_selesai" name="jadwal_selesai" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kapasitas" class="form-label">Kapasitas</label>
                            <input type="number" class="form-control" id="kapasitas" name="kapasitas" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="foto_pelatihan" class="form-label">Foto Pelatihan</label>
                        <input type="file" class="form-control" id="foto_pelatihan" name="foto_pelatihan">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
