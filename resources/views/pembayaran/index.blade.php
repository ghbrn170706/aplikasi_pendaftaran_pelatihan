@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="position:relative; top: 50px;">
    <h1 class="text-center mb-4 fw-bold text-primary">Daftar Pembayaran</h1>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Daftar Pembayaran</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Pelatihan</th>
                            <th scope="col">User</th>
                            <th scope="col">Tanggal Bayar</th>
                            <th scope="col">Jumlah Bayar</th>
                            <th scope="col">Bukti Bayar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pembayaran)
                            <tr>
                                <td>{{ $pembayaran->pembayaranID }}</td>
                                <td>{{ $pembayaran->pelatihan->nama_pelatihan ?? '-' }}</td>
                                <td>{{ $pembayaran->user->name ?? '-' }}</td>
                                <td>{{ $pembayaran->tanggal_bayar }}</td>
                                <td>{{ number_format($pembayaran->jumlah_bayar, 2) }}</td>
                                <td>
                                    @if($pembayaran->bukti_bayar)
                                        <img 
                                            src="{{ asset('storage/' . $pembayaran->bukti_bayar) }}" 
                                            alt="Bukti Bayar" 
                                            class="img-thumbnail cursor-pointer" 
                                            style="width: 80px; height: 80px;"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#imageModal"
                                            onclick="openModal('{{ asset('storage/' . $pembayaran->bukti_bayar) }}')"
                                        >
                                    @else
                                        <span class="text-muted">Tidak ada bukti</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-eye"></i> Lihat Detail
                                    </button>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Tidak ada data pembayaran</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Image Lightbox -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Bukti Bayar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Bukti Bayar" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- JavaScript for Modal -->
<script>
    function openModal(imageSrc) {
        const modalImage = document.getElementById('modalImage');
        modalImage.src = imageSrc; // Set the image source
    }
</script>

</body>
</html>
@endsection