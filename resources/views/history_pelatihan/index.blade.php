<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Daftar Riwayat Pelatihan</h2>
        <a href="{{ route('history_pelatihan.create') }}" class="btn btn-primary mb-3">Tambah Riwayat</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Nama Pelatihan</th>
                    <th>Status</th>
                    <th>Tanggal Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($history as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->pelatihan->nama_pelatihan }}</td>
            <td>{{ ucfirst(str_replace('_', ' ', $item->status)) }}</td>
            <td>{{ $item->tanggal_selesai ?? '-' }}</td>
            <td>
                <a href="{{ route('history_pelatihan.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('history_pelatihan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('history_pelatihan.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
</body>
</html>
