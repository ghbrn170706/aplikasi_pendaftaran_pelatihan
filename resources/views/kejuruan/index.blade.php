@extends('dashboard')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kejuruan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6 bg-gray-100">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Daftar Kejuruan</h1>

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
            <a href="{{ route('kejuruan.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Tambah Kejuruan
            </a>
        </div>

        <!-- Grid Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($kejuruan as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4">
                        <!-- Gambar -->
                        <div class="flex justify-center mb-4">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_kejuruan }}"
                                    class="w-32 h-32 object-cover rounded-full">
                            @else
                                <span class="text-gray-600">Tidak ada gambar</span>
                            @endif
                        </div>

                        <!-- Nama Kejuruan -->
                        <h2 class="text-xl font-bold text-center text-gray-800">{{ $item->nama_kejuruan }}</h2>

                        <!-- Aksi (Edit, Hapus) -->
                        <div class="flex justify-center space-x-4 mt-6">
                            <a href="{{ route('kejuruan.edit', $item->kejuaruanID) }}"
                                class="text-yellow-600 hover:text-yellow-800">Edit</a>
                            <form action="{{ route('kejuruan.destroy', $item->kejuaruanID) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-600">
                    Tidak ada data kejuruan.
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>

@endsection