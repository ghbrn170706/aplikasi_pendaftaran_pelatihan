@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (optional, for icons if needed) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="position:relative; top: 50px;">
    <h3 class="text-primary mb-4">Daftar Profile Pengguna</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Tambah -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('profile.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus me-2"></i> Tambah Profile
        </a>
    </div>

    <!-- Tabel -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Data Profile</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>NIK</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profiles as $profile)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $profile->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($profile->tanggal_lahir)->format('d M Y') }}</td>
                                <td>{{ $profile->email }}</td>
                                <td>{{ $profile->nomor_hp }}</td>
                                <td>{{ $profile->provinsi }}</td>
                                <td>{{ $profile->kabupaten }}</td>
                                <td>{{ $profile->nik }}</td>
                                <td>{{ $profile->pekerjaan }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ route('profile.show', $profile->profileID) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        @if(Auth::user()->role !== 'admin')
                                            <a href="{{ route('profile.edit', $profile->profileID) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        <form action="{{ route('profile.destroy', $profile->profileID) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus profil ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i>
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
