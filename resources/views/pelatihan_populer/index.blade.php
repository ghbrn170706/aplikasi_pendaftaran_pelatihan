@extends('dashboard')

@section('title', 'Daftar Pelatihan')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Memuat Font Awesome -->
    <style>
        .table th, .table td {
            padding: 10px;
            font-size: 14px;
            vertical-align: middle;
        }
        .table th {
            text-align: center;
            white-space: nowrap;
        }
        .table td {
            text-align: center;
            white-space: nowrap;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .card-header {
            font-size: 18px;
        }
        .create-btn {
            margin-bottom: 1rem; /* Memberikan ruang antara tombol dan tabel */
        }
        /* Tambahkan margin top untuk container */
        .container.mt-4 {
            margin-top: 80px; /* Sesuaikan dengan tinggi navbar Anda */
        }
        /* Jika navbar fixed, tambahkan padding top pada body */
        body {
            padding-top: 56px; /* Sesuaikan dengan tinggi navbar Anda */
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <!-- Tombol Create -->
    <div class="d-flex justify-content-end create-btn">
        <a href="{{ url('/pelatihan/create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Pelatihan
        </a>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Pelatihan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-white text-black">
                        <tr>
                            <th style="min-width: 50px;">No</th>
                            <th style="min-width: 150px;">Nama Pelatihan</th>
                            <th style="min-width: 150px;">Jadwal</th>
                            <th style="min-width: 120px;">Harga</th>
                            <th style="min-width: 150px;">Lokasi</th>
                            <th style="min-width: 100px;">Status</th>
                            <th style="min-width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihans_populer as $index => $pelatihan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pelatihan->nama_pelatihan }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($pelatihan->jadwal_mulai)->format('d M Y') }} -
                                    {{ \Carbon\Carbon::parse($pelatihan->jadwal_selesai)->format('d M Y') }}
                                </td>
                                <td>Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}</td>
                                <td>{{ $pelatihan->lokasi ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-success">
                                        {{ $pelatihan->status ?? 'Buka' }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Tombol Lihat Detail -->
                                    <a href="{{ url('/pelatihan/' . $pelatihan->pelatihanID) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('pelatihan_populer.edit', $pelatihan->pelatihanID) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
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
</body>
</html>
@endsection