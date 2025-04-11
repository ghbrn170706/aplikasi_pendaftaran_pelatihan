@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Pelatihan Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-light py-4">

<div class="container" style="position:relative; top: 60px;">
    <div class="d-flex justify-content-end mb-4" >
        <a href="{{ url('/pelatihan_online/create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i> Tambah Pelatihan
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Pelatihan</th>
                            <th>Deskripsi</th>
                            <th>Jadwal</th>
                            <th>Harga</th>
                            <th>Kapasitas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihans_online as $index => $pelatihan)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $pelatihan->foto_pelatihan ? asset('storage/' . $pelatihan->foto_pelatihan) : 'https://via.placeholder.com/50' }}" 
                                         class="img-thumbnail" width="50" alt="Foto Pelatihan">
                                </td>
                                <td>{{ $pelatihan->nama_pelatihan }}</td>
                                <td>{{ Str::limit($pelatihan->deskripsi, 30) }}</td>
                                <td>
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ \Carbon\Carbon::parse($pelatihan->jadwal_mulai)->format('d M Y') }} - 
                                    {{ \Carbon\Carbon::parse($pelatihan->jadwal_selesai)->format('d M Y') }}
                                </td>
                                <td class="text-end">Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}</td>
                                <td>{{ $pelatihan->kapasitas }} Orang</td>
                                <td>
                                    <span class="badge bg-success">
                                        {{ $pelatihan->status ?? 'Buka' }}
                                    </span>
                                </td>
                                <td>
    <a href="{{ route('pelatihan_online.show', $pelatihan->pelatihanonlineID) }}" 
       class="text-primary text-decoration-none">Lihat Detail</a>
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
