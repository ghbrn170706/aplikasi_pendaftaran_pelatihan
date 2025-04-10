<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kejuruan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6', // Biru utama
                        secondary: '#F59E0B', // Kuning untuk aksi
                        danger: '#EF4444', // Merah untuk hapus
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto p-6 max-w-4xl">
        <!-- Header Section -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Tambah Kejuruan</h1>
            <p class="text-gray-600">Isi formulir di bawah ini untuk menambahkan kejuruan baru.</p>
        </div>

        <!-- Form Section -->
        <form action="{{ route('kejuruan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-6 space-y-6">
            @csrf

            <!-- Nama Kejuruan -->
            <div>
                <label for="nama_kejuruan" class="block text-sm font-medium text-gray-700">Nama Kejuruan</label>
                <input type="text" id="nama_kejuruan" name="nama_kejuruan" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                @error('nama_kejuruan')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gambar -->
            <div>
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <div class="mt-1 flex items-center">
                    <input type="file" id="gambar" name="gambar" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-blue-700">
                </div>
                @error('gambar')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <a href="{{ route('kejuruan.index') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition duration-300 ease-in-out">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-primary hover:bg-blue-700 text-white font-medium rounded-md shadow-sm transition duration-300 ease-in-out">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>