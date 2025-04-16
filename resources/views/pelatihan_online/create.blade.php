<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelatihan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="container mx-auto px-4 py-8">
    <!-- Card Header -->
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-center text-blue-600 mb-6">Tambah Pelatihan</h2>

        <!-- Form Section -->
        <form action="{{ route('pelatihan_online.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Pelatihan -->
            <div class="mb-4">
                <label for="nama_pelatihan" class="block text-sm font-medium text-gray-700">Nama Pelatihan</label>
                <input type="text" id="nama_pelatihan" name="nama_pelatihan" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>

            <!-- Jenis -->
            <div class="mb-4">
                <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                <select id="jenis" name="jenis" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="online" selected>Online</option>
                </select>
            </div>

            <!-- Link Zoom -->
            <div class="mb-4">
                <label for="link_zoom" class="block text-sm font-medium text-gray-700">Link Zoom</label>
                <input type="url" id="link_zoom" name="link_zoom" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Jadwal Mulai & Selesai -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="jadwal_mulai" class="block text-sm font-medium text-gray-700">Jadwal Mulai</label>
                    <input type="date" id="jadwal_mulai" name="jadwal_mulai" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="jadwal_selesai" class="block text-sm font-medium text-gray-700">Jadwal Selesai</label>
                    <input type="date" id="jadwal_selesai" name="jadwal_selesai" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <!-- Kapasitas & Harga -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                    <input type="number" id="kapasitas" name="kapasitas" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
                <div>
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga" step="0.01" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>
            </div>

            <!-- Foto Pelatihan -->
            <div class="mb-4">
                <label for="foto_pelatihan" class="block text-sm font-medium text-gray-700">Foto Pelatihan</label>
                <input type="file" id="foto_pelatihan" name="foto_pelatihan"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center gap-4">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Tambah Pelatihan
                </button>
                <a href="{{ route('pelatihan.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

</body>
</html>