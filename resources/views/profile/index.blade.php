@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiles</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> <!-- Alpine.js -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --secondary: #10b981;
            --dark: #1e293b;
            --light: #f8fafc;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
        }
        
        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-scale:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.2);
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
        }
    </style>
</head>
<body class="antialiased">
<div class="fixed inset-0 bg-gradient-to-br from-indigo-50/20 to-emerald-50/20 -z-10"></div>

<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div class="mb-4 md:mb-0">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-emerald-500 bg-clip-text text-transparent">Daftar Profile Pengguna</h1>
            <p class="text-gray-600 mt-2">Kelola semua data profil pengguna dalam satu tempat</p>
        </div>
        <a href="{{ route('profile.create') }}" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-700 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
            <i class="fas fa-user-plus mr-2"></i> Tambah Profile
        </a>
    </div>

    @if (session('success'))
        <div class="glass-card rounded-lg p-4 mb-6 bg-emerald-50 border border-emerald-100">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle text-emerald-500 text-xl"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="glass-card rounded-xl p-6 hover-scale">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Profil</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $profiles->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-indigo-50 text-indigo-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6 hover-scale">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Provinsi</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $profiles->groupBy('provinsi')->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-emerald-50 text-emerald-600">
                    <i class="fas fa-map-marker-alt text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6 hover-scale">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Pekerjaan</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $profiles->groupBy('pekerjaan')->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-amber-50 text-amber-600">
                    <i class="fas fa-briefcase text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6 hover-scale">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $profiles->filter(function($item) {
                        return $item->created_at->format('m-Y') === now()->format('m-Y');
                    })->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-purple-50 text-purple-600">
                    <i class="fas fa-calendar-alt text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Card -->
    <div class="glass-card rounded-xl overflow-hidden shadow-sm">
        <!-- Card Header -->
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-indigo-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Data Profile</h3>
                    <p class="text-sm text-gray-600 mt-1">Daftar lengkap semua profil pengguna</p>
                </div>
                <div class="mt-3 md:mt-0 relative">
                    <input type="text" placeholder="Cari profil..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full md:w-64 transition-all duration-200">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                </div>
            </div>
        </div>
        
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor HP</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Provinsi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kabupaten</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pekerjaan</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($profiles as $profile)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $profile->nama }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($profile->tanggal_lahir)->format('d M Y') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $profile->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $profile->nomor_hp }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $profile->provinsi }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $profile->kabupaten }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $profile->nik }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $profile->pekerjaan }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('profile.show', $profile->profileID) }}" 
                                   class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors duration-200 tooltip"
                                   data-tooltip="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @if(Auth::user()->role !== 'admin')
                                <a href="{{ route('profile.edit', $profile->profileID) }}" 
                                   class="p-2 rounded-lg bg-amber-50 text-amber-600 hover:bg-amber-100 transition-colors duration-200 tooltip"
                                   data-tooltip="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endif
                                <form action="{{ route('profile.destroy', $profile->profileID) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus profil ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors duration-200 tooltip"
                                            data-tooltip="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mb-4 animate-float">
                                    <i class="fas fa-user-slash text-3xl text-indigo-500"></i>
                                </div>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">Belum ada profil</h4>
                                <p class="text-gray-500 max-w-md mx-auto">Anda belum memiliki data profil pengguna. Mulai dengan menambahkan profil baru.</p>
                                <a href="{{ route('profile.create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-700 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                    <i class="fas fa-user-plus mr-2"></i> Tambah Profile
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      
    </div>
</div>

<script>
// Tooltip initialization
document.addEventListener('DOMContentLoaded', function() {
    const tooltips = document.querySelectorAll('.tooltip');
    tooltips.forEach(tooltip => {
        const tooltipText = tooltip.getAttribute('data-tooltip');
        const tooltipElement = document.createElement('div');
        tooltipElement.className = 'absolute z-10 invisible inline-block px-2 py-1 text-xs font-medium text-white bg-gray-900 rounded-md shadow-sm opacity-0 tooltip-text';
        tooltipElement.textContent = tooltipText;
        tooltip.appendChild(tooltipElement);
        
        tooltip.addEventListener('mouseenter', () => {
            tooltipElement.classList.remove('invisible', 'opacity-0');
            tooltipElement.classList.add('visible', 'opacity-100');
        });
        
        tooltip.addEventListener('mouseleave', () => {
            tooltipElement.classList.remove('visible', 'opacity-100');
            tooltipElement.classList.add('invisible', 'opacity-0');
        });
    });
});
</script>
</body>
</html>
@endsection