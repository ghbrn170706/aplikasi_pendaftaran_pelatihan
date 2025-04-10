<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Riwayat Pelatihan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .bg-selesai { background-color: #d4edda; } /* Hijau */
        .bg-baru-selesai { background-color: #fff3cd; } /* Kuning */
        .bg-belum-selesai { background-color: #f8d7da; } /* Merah */
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Tambah Riwayat Pelatihan</h2>
        <a href="{{ route('history_pelatihan.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('history_pelatihan.store') }}" method="POST">
            @csrf

            <!-- Pilihan Peserta -->
            <div class="mb-3">
                <label for="user_id" class="form-label">Peserta</label>
                <select class="form-control" name="user_id" id="user_id" required>
                    <option value="">-- Pilih Peserta --</option>

                    @php
                        $sortedUsers = $users->sortByDesc(function($user) {
                            return optional($user->historyPelatihan)->status == 'selesai';
                        });
                    @endphp

                    @foreach ($sortedUsers as $user)
                        @php
                            $status = optional($user->historyPelatihan)->status ?? 'belum_selesai';
                            $class = $status == 'selesai' ? 'bg-selesai' : ($status == 'baru_selesai' ? 'bg-baru-selesai' : 'bg-belum-selesai');
                            $label = $status == 'selesai' ? '(Selesai)' : ($status == 'baru_selesai' ? '(Baru Selesai)' : '(Belum Selesai)');
                        @endphp
                        <option value="{{ $user->id }}" class="{{ $class }}">
                            {{ $user->name }} {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Menampilkan Pelatihan yang Diikuti oleh Peserta -->
            <div class="mb-3">
                <label class="form-label">Pelatihan yang Diikuti</label>
                <div id="pelatihan-list" class="border p-3 rounded">
                    <p class="text-muted">Silakan pilih peserta terlebih dahulu.</p>
                </div>
            </div>

            <!-- Status Pelatihan -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" required>
                    <option value="belum_selesai">Belum Selesai</option>
                    <option value="baru_selesai">Baru Selesai</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        document.getElementById('user_id').addEventListener('change', function() {
            var userId = this.value;
            var pelatihanList = document.getElementById('pelatihan-list');
            pelatihanList.innerHTML = '<p class="text-muted">Memuat data...</p>';

            if (userId) {
                fetch('/get-pelatihan/' + userId)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            pelatihanList.innerHTML = '';
                            data.forEach(pelatihan => {
                                let statusClass = pelatihan.status == 'selesai' ? 'bg-selesai' :
                                                  pelatihan.status == 'baru_selesai' ? 'bg-baru-selesai' :
                                                  'bg-belum-selesai';

                                pelatihanList.innerHTML += `
                                    <div class="p-2 mb-1 ${statusClass}">
                                        ${pelatihan.nama_pelatihan} - <strong>${pelatihan.status.replace('_', ' ')}</strong>
                                    </div>
                                `;
                            });
                        } else {
                            pelatihanList.innerHTML = '<p class="text-danger">Peserta ini belum mengikuti pelatihan.</p>';
                        }
                    })
                    .catch(error => {
                        pelatihanList.innerHTML = '<p class="text-danger">Gagal memuat data.</p>';
                        console.error('Error fetching pelatihan:', error);
                    });
            } else {
                pelatihanList.innerHTML = '<p class="text-muted">Silakan pilih peserta terlebih dahulu.</p>';
            }
        });
    </script>
</body>
</html>
