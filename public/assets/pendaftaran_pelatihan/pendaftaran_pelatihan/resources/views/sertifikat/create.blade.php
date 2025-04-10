<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Tambah Sertifikat</h1>
        <form action="{{ route('sertifikat.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            <!-- Nama -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Pelatihan -->
            <div class="mb-4">
                <label for="pelatihan" class="block text-sm font-medium text-gray-700">Pelatihan</label>
                <input type="text" name="pelatihan" id="pelatihan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Tanggal -->
            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Background Image -->
            <div class="mb-4">
                <label for="background_image" class="block text-sm font-medium text-gray-700">Gambar Latar (Opsional)</label>
                <input type="file" name="background_image" id="background_image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Logo Penyelenggara -->
            <div class="mb-4">
                <label for="logo_penyelenggara" class="block text-sm font-medium text-gray-700">Logo Penyelenggara (Opsional)</label>
                <input type="file" name="logo_penyelenggara" id="logo_penyelenggara" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Nama Penyelenggara -->
            <div class="mb-4">
                <label for="nama_penyelenggara" class="block text-sm font-medium text-gray-700">Nama Penyelenggara (Opsional)</label>
                <input type="text" name="nama_penyelenggara" id="nama_penyelenggara" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Peran -->
            <div class="mb-4">
                <label for="peran" class="block text-sm font-medium text-gray-700">Peran (Opsional)</label>
                <input type="text" name="peran" id="peran" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <!-- Tanda Tangan Digital -->
            <div class="mb-4">
                <label for="tanda_tangan_ketua" class="block text-sm font-medium text-gray-700">Tanda Tangan Ketua (Opsional)</label>
                <canvas id="signature-pad" class="border border-gray-300 rounded-md" width="400" height="200"></canvas>
                <button type="button" id="clear-signature" class="mt-2 bg-gray-500 text-white px-3 py-1 rounded-md hover:bg-gray-600">Clear</button>
                <input type="hidden" name="tanda_tangan_ketua" id="tanda_tangan_ketua">
            </div>

            <!-- Tombol Simpan -->
            <div class="mt-6">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        // Inisialisasi Signature Pad
        const canvas = document.getElementById('signature-pad');
        const signaturePad = new SignaturePad(canvas);

        // Tombol Clear
        document.getElementById('clear-signature').addEventListener('click', () => {
            signaturePad.clear();
        });

        // Simpan tanda tangan sebagai base64 sebelum form disubmit
        document.querySelector('form').addEventListener('submit', (e) => {
            if (!signaturePad.isEmpty()) {
                const signatureData = signaturePad.toDataURL(); // Simpan sebagai base64
                document.getElementById('tanda_tangan_ketua').value = signatureData;
            }
        });
    </script>
</body>
</html>