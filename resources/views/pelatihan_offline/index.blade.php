@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Offline</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> <!-- Alpine.js -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="position:relative; top: 50px;">
    <!-- Tombol Tambah Pelatihan -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('pelatihan_offline.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Tambah Pelatihan
        </a>
    </div>

    <!-- Tabel Pelatihan -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Daftar Pelatihan Offline</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Foto</th>
                            <th scope="col">Nama Pelatihan</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Jadwal</th>
                            <th scope="col" class="text-end">Harga</th>
                            <th scope="col" class="text-center">Kapasitas</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihan_offline as $index => $pelatihan)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">
                                    <img src="{{ $pelatihan->foto_pelatihan ? asset('storage/' . $pelatihan->foto_pelatihan) : 'https://via.placeholder.com/50' }}" 
                                         class="img-thumbnail" style="width: 50px; height: 50px;" alt="Foto Pelatihan">
                                </td>
                                <td>{{ $pelatihan->nama_pelatihan }}</td>
                                <td>{{ Str::limit($pelatihan->deskripsi, 30) }}</td>
                                <td>
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($pelatihan->jadwal_mulai)->format('d M Y') }} - 
                                    {{ \Carbon\Carbon::parse($pelatihan->jadwal_selesai)->format('d M Y') }}
                                </td>
                                <td class="text-end">Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}</td>
                                <td class="text-center">{{ $pelatihan->kapasitas }} Orang</td>
                                <td class="text-center">
                                    <span class="badge bg-success">
                                        {{ $pelatihan->status ?? 'Buka' }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('pelatihan_offline.show', $pelatihan->pelatihanofflineID) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
@endsection