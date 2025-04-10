<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dokumentasi Pelatihan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<div class="container mx-auto mt-12">
    <h2 class="text-4xl font-extrabold text-center text-blue-600 mb-8">Tambah Dokumentasi Pelatihan</h2>
    
    <div class="bg-white p-8 rounded-lg shadow-2xl transform transition-all duration-500 hover:scale-105 hover:shadow-lg ease-in-out">
        <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-6">
                <label for="judul_pelatihan" class="block text-sm font-medium text-gray-700">Judul Pelatihan</label>
                <input type="text" id="judul_pelatihan" name="judul_pelatihan" class="mt-2 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
            </div>
            
            <div class="mb-6">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="mt-2 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" rows="4"></textarea>
            </div>
            
            <div class="mb-6">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" class="mt-2 block w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 ease-in-out">Simpan Dokumentasi Pelatihan</button>
        </form>
    </div>
</div>

<!-- Animation for Hover Effects -->
<script>
    const formContainer = document.querySelector('.container');
    formContainer.addEventListener('mouseenter', () => {
        formContainer.classList.add('animate-pulse');
    });
    formContainer.addEventListener('mouseleave', () => {
        formContainer.classList.remove('animate-pulse');
    });
</script>
</body>
</html>
