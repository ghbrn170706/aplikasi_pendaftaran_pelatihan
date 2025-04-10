<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru Pelatihan</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto p-6 bg-gray-100">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Tambah Data Guru Pelatihan</h1>

    <!-- Form Tambah Data -->
    <form action="{{ route('guru_pelatihan.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('nama')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jurusan -->
        <div class="mb-4">
            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('jurusan')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Deskripsi Perjalanan Hidup -->
        <div class="mb-4">
            <label for="deskripsi_perjalanan_hidup" class="block text-sm font-medium text-gray-700">Deskripsi Perjalanan Hidup</label>
            <textarea name="deskripsi_perjalanan_hidup" id="deskripsi_perjalanan_hidup" rows="4"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>{{ old('deskripsi_perjalanan_hidup') }}</textarea>
            @error('deskripsi_perjalanan_hidup')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Spesialisasi Guru -->
        <div class="mb-4">
            <label for="spesialisasi_guru" class="block text-sm font-medium text-gray-700">Spesialisasi Guru</label>
            <input type="text" name="spesialisasi_guru" id="spesialisasi_guru" value="{{ old('spesialisasi_guru') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('spesialisasi_guru')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar -->
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
            <input type="file" name="gambar" id="gambar"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('gambar')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end">
            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Simpan
            </button>
        </div>
    </form>
</div>
</body>
</html>