<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelatihan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-2">
        <div class="max-w-xl mx-auto bg-white shadow rounded-lg">
            <div class="bg-blue-600 text-white text-center py-2 rounded-t-lg">
                <h2 class="text-sm font-semibold">Edit Pelatihan</h2>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('pelatihan.update', $pelatihan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Pelatihan -->
                    <div class="mb-3">
                        <label for="nama_pelatihan" class="block text-gray-700 text-sm font-medium mb-1">Nama Pelatihan</label>
                        <input id="nama_pelatihan" type="text" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="nama_pelatihan" value="{{ old('nama_pelatihan', $pelatihan->nama_pelatihan) }}" required>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="block text-gray-700 text-sm font-medium mb-1">Deskripsi</label>
                        <textarea id="deskripsi" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="deskripsi" required>{{ old('deskripsi', $pelatihan->deskripsi) }}</textarea>
                    </div>

                    <!-- Jenis -->
                    <div class="mb-3">
                        <label for="jenis" class="block text-gray-700 text-sm font-medium mb-1">Jenis</label>
                        <select id="jenis" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="jenis" required>
                            <option value="online" {{ old('jenis', $pelatihan->jenis) == 'online' ? 'selected' : '' }}>Online</option>
                        </select>
                    </div>

                    <!-- Link Zoom (Muncul Jika Online Dipilih) -->
                    <div class="mb-3" id="link-zoom-wrapper" style="{{ old('jenis', $pelatihan->jenis) == 'online' ? '' : 'display: none;' }}">
                        <label for="link_zoom" class="block text-gray-700 text-sm font-medium mb-1">Link Zoom</label>
                        <input id="link_zoom" type="url" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="link_zoom" value="{{ old('link_zoom', $pelatihan->link_zoom) }}" placeholder="Masukkan link Zoom jika pelatihan online">
                    </div>

                    <!-- Jadwal Mulai -->
                    <div class="mb-3">
                        <label for="jadwal_mulai" class="block text-gray-700 text-sm font-medium mb-1">Jadwal Mulai</label>
                        <input id="jadwal_mulai" type="date" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="jadwal_mulai" value="{{ old('jadwal_mulai', $pelatihan->jadwal_mulai) }}" required>
                    </div>

                    <!-- Jadwal Selesai -->
                    <div class="mb-3">
                        <label for="jadwal_selesai" class="block text-gray-700 text-sm font-medium mb-1">Jadwal Selesai</label>
                        <input id="jadwal_selesai" type="date" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="jadwal_selesai" value="{{ old('jadwal_selesai', $pelatihan->jadwal_selesai) }}" required>
                    </div>

                    <!-- Lokasi -->
                    <div class="mb-3">
                        <label for="lokasi" class="block text-gray-700 text-sm font-medium mb-1">Lokasi</label>
                        <input id="lokasi" type="text" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="lokasi" value="{{ old('lokasi', $pelatihan->lokasi) }}">
                    </div>

                    <!-- Kapasitas -->
                    <div class="mb-3">
                        <label for="kapasitas" class="block text-gray-700 text-sm font-medium mb-1">Kapasitas</label>
                        <input id="kapasitas" type="number" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="kapasitas" value="{{ old('kapasitas', $pelatihan->kapasitas) }}" required>
                    </div>

                    <!-- Harga -->
                    <div class="mb-3">
                        <label for="harga" class="block text-gray-700 text-sm font-medium mb-1">Harga</label>
                        <input id="harga" type="number" step="0.01" 
                            class="w-full border border-gray-300 rounded px-2 py-1 text-sm focus:ring focus:ring-blue-500 focus:outline-none" 
                            name="harga" value="{{ old('harga', $pelatihan->harga) }}" required>
                    </div>

                    <!-- Foto Pelatihan -->
                    <div class="mb-3">
                        <label for="foto_pelatihan" class="block text-gray-700 text-sm font-medium mb-1">Foto Pelatihan</label>
                        <input id="foto_pelatihan" type="file" 
                            class="w-full text-gray-600 border border-gray-300 rounded file:py-1 file:px-3 file:border-0 file:text-xs file:font-medium file:bg-blue-600 file:text-white hover:file:bg-blue-500">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" 
                            class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded text-sm font-medium transition duration-300">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const jenisSelect = document.getElementById('jenis');
            const linkZoomWrapper = document.getElementById('link-zoom-wrapper');
            const linkZoomInput = document.getElementById('link_zoom');

            jenisSelect.addEventListener('change', function () {
                if (jenisSelect.value === 'online') {
                    linkZoomWrapper.classList.remove('hidden');
                    linkZoomInput.required = true;
                } else {
                    linkZoomWrapper.classList.add('hidden');
                    linkZoomInput.required = false;
                }
            });
        });
    </script>
</body>
</html>
