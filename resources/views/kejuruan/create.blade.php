<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kejuruan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto p-6 bg-gray-100">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Tambah Kejuruan</h1>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Tambah Kejuruan -->
    <form action="{{ route('kejuruan.store') }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
        @csrf

        <!-- Nama Kejuruan -->
        <div class="mb-4">
            <label for="nama_kejuruan" class="block text-sm font-medium text-gray-700">Nama Kejuruan</label>
            <input type="text" name="nama_kejuruan" id="nama_kejuruan" value="{{ old('nama_kejuruan') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('nama_kejuruan')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar Kejuruan -->
        <div class="mb-4">
            <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Kejuruan</label>
            <input type="file" name="gambar" id="gambar"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('gambar')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Simpan dan Kembali -->
        <div class="flex justify-end space-x-4">
            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Tambah Kejuruan
            </button>
            <a href="{{ route('kejuruan.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Kembali
            </a>
        </div>
    </form>
</div>
</body>
</html>