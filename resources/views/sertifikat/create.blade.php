<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sertifikat</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto p-6">
        <!-- Header -->
        <h1 class="text-3xl font-bold text-gray-800 mb-8">Tambah Sertifikat</h1>

        <!-- Form -->
        <form action="{{ route('sertifikat.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-lg space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukkan nama penerima" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" placeholder="Masukkan email penerima" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Pelatihan -->
            <div>
                <label for="pelatihan" class="block text-sm font-medium text-gray-700">Pelatihan</label>
                <input type="text" name="pelatihan" id="pelatihan" placeholder="Masukkan nama pelatihan" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Tanggal -->
            <div>
                <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Background Image -->
            <div>
                <label for="background_image" class="block text-sm font-medium text-gray-700">Gambar Latar (Opsional)</label>
                <input type="file" name="background_image" id="background_image"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <!-- Logo Penyelenggara -->
            <div>
                <label for="logo_penyelenggara" class="block text-sm font-medium text-gray-700">Logo Penyelenggara (Opsional)</label>
                <input type="file" name="logo_penyelenggara" id="logo_penyelenggara"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <!-- Nama Penyelenggara -->
            <div>
                <label for="nama_penyelenggara" class="block text-sm font-medium text-gray-700">Nama Penyelenggara (Opsional)</label>
                <input type="text" name="nama_penyelenggara" id="nama_penyelenggara" placeholder="Masukkan nama penyelenggara"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Peran -->
            <div>
                <label for="peran" class="block text-sm font-medium text-gray-700">Peran (Opsional)</label>
                <input type="text" name="peran" id="peran" placeholder="Masukkan peran penerima"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Tanda Tangan Digital -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Tanda Tangan Ketua (Opsional)</label>
                <canvas id="signature-pad" class="border border-gray-300 rounded-md mt-2" width="400" height="200"></canvas>
                <div class="flex gap-2 mt-2">
                    <button type="button" id="clear-signature"
                        class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition-colors duration-200">Clear</button>
                    <span class="text-sm text-gray-500">Klik di atas untuk menandatangani</span>
                </div>
                <input type="hidden" name="tanda_tangan_ketua" id="tanda_tangan_ketua">
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition-colors duration-200">
                    Simpan
                </button>
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