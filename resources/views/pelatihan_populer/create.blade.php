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
    <h2 class="text-3xl font-bold text-center text-blue-600 mb-8">Tambah Pelatihan</h2>

    <!-- Form Section -->
    <form action="{{ route('pelatihan_populer.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md max-w-3xl mx-auto">
        @csrf

        <!-- Nama Pelatihan -->
        <div class="mb-4">
            <label for="nama_pelatihan" class="block text-sm font-medium text-gray-700">Nama Pelatihan</label>
            <input type="text" id="nama_pelatihan" name="nama_pelatihan" value="{{ old('nama_pelatihan') }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Deskripsi -->
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('deskripsi') }}</textarea>
        </div>

        <!-- Jenis -->
        <div class="mb-4">
            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
            <select id="jenis" name="jenis" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="online" {{ old('jenis') == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ old('jenis') == 'offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>

        <!-- Jadwal Mulai & Selesai -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="jadwal_mulai" class="block text-sm font-medium text-gray-700">Jadwal Mulai</label>
                <input type="date" id="jadwal_mulai" name="jadwal_mulai" value="{{ old('jadwal_mulai') }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="jadwal_selesai" class="block text-sm font-medium text-gray-700">Jadwal Selesai</label>
                <input type="date" id="jadwal_selesai" name="jadwal_selesai" value="{{ old('jadwal_selesai') }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
        </div>

        <!-- Lokasi -->
        <div class="mb-4">
            <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Kapasitas & Harga -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas</label>
                <input type="number" id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga') }}" step="0.01" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
        </div>

        <!-- Link Zoom -->
        <div class="mb-4">
            <label for="link_zoom" class="block text-sm font-medium text-gray-700">Link Zoom (jika Online)</label>
            <input type="url" id="link_zoom" name="link_zoom" value="{{ old('link_zoom') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Foto Pelatihan & Gambar Pelatihan -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="foto_pelatihan" class="block text-sm font-medium text-gray-700">Foto Pelatihan</label>
                <input type="file" id="foto_pelatihan" name="foto_pelatihan"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="gambar_pelatihan" class="block text-sm font-medium text-gray-700">Gambar Pelatihan</label>
                <input type="file" id="gambar_pelatihan" name="gambar_pelatihan"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
        </div>

        <!-- Sertifikat -->
        <div class="mb-4">
            <label for="sertifikat" class="block text-sm font-medium text-gray-700">Sertifikat</label>
            <textarea id="sertifikat" name="sertifikat" rows="2" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('sertifikat') }}</textarea>
        </div>

        <!-- Level & Kategori -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                <input type="text" id="level" name="level" value="{{ old('level') }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            </div>
        </div>

        <!-- Sub Judul -->
        <div class="mb-4">
            <label for="sub_judul" class="block text-sm font-medium text-gray-700">Sub Judul</label>
            <input type="text" id="sub_judul" name="sub_judul" value="{{ old('sub_judul') }}" required
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        </div>

        <!-- Tombol Simpan & Batal -->
        <div class="flex justify-end gap-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Simpan
            </button>
            <a href="{{ route('pelatihan.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Batal
            </a>
        </div>
    </form>
</div>

</body>
</html>