@extends('dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sertifikat</title>

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
        .wave-shape {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }
        .wave-shape svg {
            position: relative;
            display: block;
            width: calc(100% + 1.3px);
            height: 150px;
        }
        .wave-shape .shape-fill {
            fill: #FFFFFF;
        }
        /* Tombol Aksi */
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .action-btn-success {
            background-color: #10b981;
            color: white;
        }
        .action-btn-info {
            background-color: #3b82f6;
            color: white;
        }
        .action-btn-danger {
            background-color: #ef4444;
            color: white;
        }
        .action-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        /* Header dan Stats Cards */
        .header-section {
            margin-bottom: 2rem;
        }
        .stats-card {
            margin-bottom: 1.5rem;
        }
        /* Turunkan Konten Utama */
        .container {
            margin-top: 2rem;
        }
    </style>
</head>
<body class="antialiased">
<!-- Wave Shape Background -->
<div class="fixed top-0 left-0 w-full h-full -z-10 overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-indigo-50/20 to-emerald-50/20"></div>
</div>
<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 header-section">
        <div class="mb-4 md:mb-0">
            <h1 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-emerald-500 bg-clip-text text-transparent">Daftar Sertifikat</h1>
            <p class="text-gray-600 mt-2">Kelola semua sertifikat pelatihan Anda di satu tempat</p>
        </div>
        <a href="{{ route('sertifikat.create') }}" class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-700 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
            <i class="fas fa-plus mr-2"></i> Tambah Sertifikat
        </a>
    </div>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="glass-card rounded-xl p-6 hover-scale stats-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Sertifikat</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $sertifikats->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-indigo-50 text-indigo-600">
                    <i class="fas fa-certificate text-xl"></i>
                </div>
            </div>
        </div>
        <div class="glass-card rounded-xl p-6 hover-scale stats-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Pelatihan Berbeda</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $sertifikats->groupBy('pelatihan')->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-emerald-50 text-emerald-600">
                    <i class="fas fa-book-open text-xl"></i>
                </div>
            </div>
        </div>
        <div class="glass-card rounded-xl p-6 hover-scale stats-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Peserta Unik</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $sertifikats->groupBy('email')->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-amber-50 text-amber-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
        </div>
        <div class="glass-card rounded-xl p-6 hover-scale stats-card">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $sertifikats->where('tanggal', '>=', now()->startOfMonth())->count() }}</p>
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
                    <h3 class="text-lg font-semibold text-gray-800">Daftar Sertifikat</h3>
                    <p class="text-sm text-gray-600 mt-1">Semua sertifikat yang telah dibuat</p>
                </div>
                <div class="mt-3 md:mt-0 relative">
                    <input type="text" placeholder="Cari sertifikat..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full md:w-64 transition-all duration-200">
                    <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
                </div>
            </div>
        </div>
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penerima</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelatihan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Media</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($sertifikats as $sertifikat)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-medium text-gray-900">#{{ $sertifikat->id }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $sertifikat->nama }}</div>
                            <div class="text-xs text-gray-500">{{ $sertifikat->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">{{ $sertifikat->pelatihan }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $sertifikat->tanggal->format('d M Y') }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex -space-x-2">
                                @if ($sertifikat->background_image)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $sertifikat->background_image) }}" class="w-10 h-10 rounded-full border-2 border-white object-cover hover:z-10 hover:scale-125 transition-all duration-200 cursor-pointer" onclick="openImageModal('{{ asset('storage/' . $sertifikat->background_image) }}')">
                                    <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200">Background</span>
                                </div>
                                @endif
                                @if ($sertifikat->logo_penyelenggara)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $sertifikat->logo_penyelenggara) }}" class="w-10 h-10 rounded-full border-2 border-white object-cover hover:z-10 hover:scale-125 transition-all duration-200 cursor-pointer" onclick="openImageModal('{{ asset('storage/' . $sertifikat->logo_penyelenggara) }}')">
                                    <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200">Logo</span>
                                </div>
                                @endif
                                @if ($sertifikat->tanda_tangan_ketua)
                                <div class="relative group">
                                    <img src="{{ asset('storage/' . $sertifikat->tanda_tangan_ketua) }}" class="w-10 h-10 rounded-full border-2 border-white object-cover hover:z-10 hover:scale-125 transition-all duration-200 cursor-pointer" onclick="openImageModal('{{ asset('storage/' . $sertifikat->tanda_tangan_ketua) }}')">
                                    <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200">Tanda Tangan</span>
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right">
                            <div class="inline-flex gap-2">
                                <a href="{{ route('sertifikat.generatePdf', $sertifikat->id) }}" class="action-btn action-btn-success">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="{{ route('sertifikat.sendEmail', $sertifikat->id) }}" class="action-btn action-btn-info">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                <form action="{{ route('sertifikat.destroy', $sertifikat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn action-btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mb-4 animate-float">
                                    <i class="fas fa-certificate text-3xl text-indigo-500"></i>
                                </div>
                                <h4 class="text-lg font-medium text-gray-900 mb-2">Belum ada sertifikat</h4>
                                <p class="text-gray-500 max-w-md mx-auto">Anda belum membuat sertifikat apapun. Mulai dengan menambahkan sertifikat baru.</p>
                                <a href="{{ route('sertifikat.create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-700 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                    <i class="fas fa-plus mr-2"></i> Tambah Sertifikat
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- Image Modal -->
    <div class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="image-modal" role="dialog" aria-modal="true" id="imageModal">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="image-modal">Pratinjau Gambar</h3>
                                <button type="button" class="text-gray-400 hover:text-gray-500" onclick="closeModal()">
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                            <div class="mt-2">
                                <img id="modalImage" src="" class="w-full rounded-lg border border-gray-200 max-h-[70vh] object-contain">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200" onclick="closeModal()">
                        Tutup
                    </button>
                    <a id="downloadImage" href="#" download class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200">
                        <i class="fas fa-download mr-2"></i> Unduh
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
    // Modal Functions
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('downloadImage').href = imageSrc;
        document.getElementById('imageModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
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