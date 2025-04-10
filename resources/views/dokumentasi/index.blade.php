@extends('dashboard')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Dokumentasi Pelatihan</h2>
        
        <div class="text-center mb-8">
            <a href="{{ route('dokumentasi.create') }}" class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-blue-600 transition duration-300 transform hover:scale-105">
                Tambah Dokumentasi Pelatihan
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($dokumentasi as $item)
                <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ asset('storage/dokumentasi/' . $item->gambar) }}" alt="{{ $item->judul_pelatihan }}" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $item->judul_pelatihan }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit($item->deskripsi, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('dokumentasi.edit', $item->dokumentasiID) }}" class="text-blue-500 hover:text-blue-700 transition duration-300 transform hover:scale-110">
                            Edit
                        </a>
                        <form action="{{ route('dokumentasi.destroy', $item->dokumentasiID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300 transform hover:scale-110">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
@endsection