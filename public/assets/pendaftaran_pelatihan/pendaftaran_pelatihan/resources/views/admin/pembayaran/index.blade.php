<div class="container">
    <h2 class="mb-4">History Pembayaran</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Pelatihan</th>
                <th>Tanggal Bayar</th>
                <th>Jumlah Bayar</th>
                <th>Bukti Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayarans as $index => $pembayaran)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pembayaran->pendaftaran->user->name }}</td>
                    <td>{{ $pembayaran->pendaftaran->pelatihan->nama_pelatihan }}</td>
                    <td>{{ $pembayaran->tanggal_bayar->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                    <td>
                        @if ($pembayaran->bukti_bayar)
                            <a href="{{ asset('storage/' . $pembayaran->bukti_bayar) }}" target="_blank">
                                Lihat Bukti
                            </a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('pembayaran.destroy', $pembayaran->pembayaranID) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data pembayaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
</div>