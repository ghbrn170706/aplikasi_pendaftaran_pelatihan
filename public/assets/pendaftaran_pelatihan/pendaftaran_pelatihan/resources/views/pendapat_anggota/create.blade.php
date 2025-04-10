<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Testimoni Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Tambah Testimoni Anggota</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pendapat_anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_anggota" class="form-label">Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="posisi_sebagai" class="form-label">Posisi Sebagai</label>
            <input type="text" name="posisi_sebagai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="jabatan_pekerjaan" class="form-label">jabatan pekerjaan</label>
            <input type="text" name="jabatan_pekerjaan" class="form-control" required>
        </div>

  
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Testimoni</label>
            <input type="file" name="foto" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Tambah Testimoni</button>
        <a href="{{ route('pendapat_anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
