
@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru Pelatihan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> <!-- Alpine.js -->
</head>
<body>
<div class="container mx-auto p-6 bg-gray-100">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Data Guru Pelatihan</h1>

        <!-- Pesan Sukses atau Error -->
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tombol Tambah Data -->
        <div class="mb-6 text-center">
            <a href="{{ route('guru_pelatihan.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Tambah Data
            </a>
        </div>

        <!-- Grid Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($guruPelatihan as $guru)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4">
                        <!-- Foto -->
                        <div class="flex justify-center mb-4">
                            @if ($guru->gambar)
                                <img src="{{ asset('storage/' . $guru->gambar) }}" alt="{{ $guru->nama }}"
                                    class="w-32 h-32 object-cover rounded-full">
                            @else
                                <div class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center">
                                    <span class="text-gray-500">No Image</span>
                                </div>
                            @endif
                        </div>

                        <!-- Nama -->
                        <h2 class="text-xl font-bold text-center text-gray-800">{{ $guru->nama }}</h2>

                        <!-- Jurusan -->
                        <p class="text-center text-gray-600 mt-2">{{ $guru->jurusan }}</p>

                        <!-- Aksi (Lihat, Edit, Hapus) -->
                        <div class="flex justify-center space-x-4 mt-6">
                            <a href="{{ route('guru_pelatihan.show', $guru->gurupelatihanID) }}"
                                class="text-indigo-600 hover:text-indigo-800">Lihat</a>
                            <a href="{{ route('guru_pelatihan.edit', $guru->gurupelatihanID) }}"
                                class="text-yellow-600 hover:text-yellow-800">Edit</a>
                            <form action="{{ route('guru_pelatihan.destroy', $guru->gurupelatihanID) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>

@endsection