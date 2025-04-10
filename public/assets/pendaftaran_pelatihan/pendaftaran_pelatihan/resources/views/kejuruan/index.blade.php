@extends('dashboard')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kejuruan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5"  style="position:relative; top: 50px;">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Daftar Kejuruan</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('kejuruan.create') }}" class="btn btn-success">Tambah Kejuruan</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Kejuruan</th>
                                <th>Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kejuruan as $item)
                                <tr>
                                    <td class="text-center">{{ $item->kejuaruanID }}</td>
                                    <td>{{ $item->nama_kejuruan }}</td>
                                    <td class="text-center">
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_kejuruan }}" class="img-thumbnail" width="70">
                                        @else
                                            <span class="text-muted">Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('kejuruan.edit', $item->kejuaruanID) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('kejuruan.destroy', $item->kejuaruanID) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kejuruan ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data kejuruan.</td>
                                </tr>
                            @endforelse
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
