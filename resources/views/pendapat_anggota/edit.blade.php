<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Testimoni Anggota</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto p-6 bg-gray-100">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Edit Testimoni Anggota</h1>

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

    <!-- Form Edit Testimoni -->
    <form action="{{ route('pendapat_anggota.update', $pendapat->id) }}" method="POST" enctype="multipart/form-data"
        class="max-w-lg mx-auto bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')

        <!-- Nama Anggota -->
        <div class="mb-4">
            <label for="nama_anggota" class="block text-sm font-medium text-gray-700">Nama Anggota</label>
            <input type="text" name="nama_anggota" id="nama_anggota" value="{{ old('nama_anggota', $pendapat->nama_anggota) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('nama_anggota')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Posisi Sebagai -->
        <div class="mb-4">
            <label for="posisi_sebagai" class="block text-sm font-medium text-gray-700">Posisi Sebagai</label>
            <input type="text" name="posisi_sebagai" id="posisi_sebagai" value="{{ old('posisi_sebagai', $pendapat->posisi_sebagai) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('posisi_sebagai')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Jabatan Pekerjaan -->
        <div class="mb-4">
            <label for="jabatan_pekerjaan" class="block text-sm font-medium text-gray-700">Jabatan Pekerjaan</label>
            <input type="text" name="jabatan_pekerjaan" id="jabatan_pekerjaan" value="{{ old('jabatan_pekerjaan', $pendapat->jabatan_pekerjaan) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required>
            @error('jabatan_pekerjaan')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gols Setelah Belajar -->
<div class="mb-4">
    <label for="gols" class="block text-sm font-medium text-gray-700">Gols Setelah Belajar</label>
    <textarea name="gols" id="gols" rows="3"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('gols', $pendapat->gols) }}</textarea>
    @error('gols')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Perjalanan Karir -->
<div class="mb-4">
    <label for="perjalanan_karir" class="block text-sm font-medium text-gray-700">Perjalanan Karir</label>
    <textarea name="perjalanan_karir" id="perjalanan_karir" rows="4"
        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('perjalanan_karir', $pendapat->perjalanan_karir) }}</textarea>
    @error('perjalanan_karir')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

        <!-- Foto Testimoni -->
        <div class="mb-4">
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto Testimoni</label>
            <input type="file" name="foto" id="foto"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            @error('foto')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <!-- Tampilkan gambar saat ini jika ada -->
            @if ($pendapat->foto)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $pendapat->foto) }}" alt="Foto Testimoni" class="w-24 h-24 rounded-md object-cover">
                </div>
            @endif
        </div>

        <!-- Tombol Simpan dan Kembali -->
        <div class="flex justify-end space-x-4">
            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update Testimoni
            </button>
            <a href="{{ route('pendapat_anggota.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Kembali
            </a>
        </div>
    </form>
</div>
</body>
</html>