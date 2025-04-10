@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4" style="position:relative; top: 50px;">
    <!-- Bagian Judul dan Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold">Daftar Sertifikat</h1>
        <a href="{{ route('sertifikat.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Sertifikat
        </a>
    </div>

    <!-- Card untuk Tabel -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Daftar Sertifikat</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Tambahkan padding-top pada tabel untuk memberikan jarak -->
                <table class="table table-hover mt-3">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Pelatihan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Media</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sertifikats as $sertifikat)
                            <tr>
                                <td>{{ $sertifikat->id }}</td>
                                <td>{{ $sertifikat->nama }}</td>
                                <td>{{ $sertifikat->pelatihan }}</td>
                                <td>{{ $sertifikat->tanggal->format('d M Y') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if ($sertifikat->background_image)
                                            <img src="{{ asset('storage/' . $sertifikat->background_image) }}" class="img-thumbnail" width="50" height="50">
                                        @endif
                                        @if ($sertifikat->logo_penyelenggara)
                                            <img src="{{ asset('storage/' . $sertifikat->logo_penyelenggara) }}" class="img-thumbnail" width="50" height="50">
                                        @endif
                                        @if ($sertifikat->tanda_tangan_ketua)
                                            <img src="{{ asset('storage/' . $sertifikat->tanda_tangan_ketua) }}" class="img-thumbnail" width="50" height="50">
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('sertifikat.generatePdf', $sertifikat->id) }}" class="btn btn-success btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="{{ route('sertifikat.sendEmail', $sertifikat->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                        <form action="{{ route('sertifikat.destroy', $sertifikat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection