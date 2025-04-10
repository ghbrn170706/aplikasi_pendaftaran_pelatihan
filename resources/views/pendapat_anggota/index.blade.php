@extends('dashboard')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni Member E-learning</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6 bg-gray-100">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Testimoni Member E-learning</h1>

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
            <a href="{{ route('pendapat_anggota.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Tambah Foto
            </a>
        </div>

        <!-- Grid Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($pendapat as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-4">
                        <!-- Foto -->
                        <div class="flex justify-center mb-4">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama_anggota }}"
                                class="w-32 h-32 object-cover rounded-full">
                        </div>

                        <!-- Nama -->
                        <h2 class="text-xl font-bold text-center text-gray-800">{{ $item->nama_anggota }}</h2>

                        <!-- Posisi dan Jabatan -->
                        <p class="text-center text-gray-600 mt-2">Diterima Jadi {{ $item->posisi_sebagai }} SkillForge</p>
                        <p class="text-center text-gray-600">{{ $item->jabatan_pekerjaan }}</p>

                        <!-- Perjalanan Karir -->
                        @if($item->perjalanan_karir)
                            <p class="mt-4 text-sm text-gray-700 text-justify italic">
                                "{{ \Illuminate\Support\Str::limit($item->perjalanan_karir, 120) }}"
                            </p>
                        @endif

                        <!-- Gols -->
                        @if($item->gols)
                            <p class="text-center text-gray-700 italic mt-4">"{{ $item->gols }}"</p>
                        @endif

                        <!-- Aksi (Edit, Lihat, Hapus) -->
                        <div class="flex justify-center space-x-4 mt-6">
                            <a href="{{ route('pendapat_anggota.edit', $item->id) }}"
                                class="text-yellow-600 hover:text-yellow-800">Edit</a>
                            <a href="{{ route('pendapat_anggota.show', $item->id) }}"
                                class="text-blue-600 hover:text-blue-800">Lihat Detail</a>

                            <form action="{{ route('pendapat_anggota.destroy', $item->id) }}" method="POST"
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
