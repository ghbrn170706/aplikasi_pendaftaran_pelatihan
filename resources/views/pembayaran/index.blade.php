@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> <!-- Alpine.js -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --secondary: #f43f5e;
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
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
<!-- Gradient Background -->
<div class="fixed inset-0 bg-gradient-to-br from-indigo-50/20 to-rose-50/20 -z-10"></div>

<div class="container mx-auto px-4 py-8 max-w-7xl">
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-indigo-400 bg-clip-text text-transparent mb-3">Riwayat Pembayaran</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Semua transaksi pembayaran pelatihan tercatat dengan rapi</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass-card rounded-xl p-6 hover-scale">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pembayaran</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">Rp {{ number_format($pembayaran->sum('jumlah_bayar'), 0, ',', '.') }}</p>
                </div>
                <div class="p-3 rounded-lg bg-indigo-50 text-indigo-600">
                    <i class="fas fa-wallet text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6 hover-scale">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Jumlah Transaksi</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $pembayaran->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-green-50 text-green-600">
                    <i class="fas fa-receipt text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="glass-card rounded-xl p-6 hover-scale">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500">Pelatihan Diikuti</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $pembayaran->groupBy('pelatihan_id')->count() }}</p>
                </div>
                <div class="p-3 rounded-lg bg-amber-50 text-amber-600">
                    <i class="fas fa-book-open text-xl"></i>
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
                    <h3 class="text-lg font-semibold text-gray-800">Daftar Pembayaran</h3>
                    <p class="text-sm text-gray-600 mt-1">Semua transaksi pembayaran pelatihan</p>
                </div>
                <div class="mt-3 md:mt-0 relative">
                    <input type="text" placeholder="Cari pembayaran..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full md:w-64 transition-all duration-200">
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
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelatihan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peserta</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bukti</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @if ($pembayaran->isNotEmpty())
                        @foreach ($pembayaran as $item)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">#{{ $item->pembayaranID }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $item->pelatihan->nama_pelatihan ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $item->pelatihan->kategori ?? '' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $item->user->name ?? '-' }}</div>
                                <div class="text-xs text-gray-500">{{ $item->user->email ?? '' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('d M Y') }}</div>
                                <div class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal_bayar)->format('H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-semibold text-indigo-600">Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-indigo-100 text-indigo-800">
                                    {{ $item->metode_pembayaran ?? '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($item->bukti_bayar)
                                <div class="w-12 h-12 rounded-md overflow-hidden cursor-pointer hover:ring-2 hover:ring-indigo-500 transition-all duration-200"
                                     onclick="openModal('{{ asset('storage/' . $item->bukti_bayar) }}')">
                                    <img src="{{ asset('storage/' . $item->bukti_bayar) }}" alt="Bukti Bayar" class="w-full h-full object-cover">
                                </div>
                                @else
                                    <span class="text-sm text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('pembayaran.show', $item->pembayaranID) }}" 
                                       class="p-2 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition-colors duration-200 tooltip" 
                                       data-tooltip="Detail Pembayaran">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button class="p-2 rounded-lg bg-gray-50 text-gray-600 hover:bg-gray-100 transition-colors duration-200 tooltip" 
                                            data-tooltip="Unduh Invoice">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-24 h-24 bg-indigo-50 rounded-full flex items-center justify-center mb-4">
                                        <i class="fas fa-wallet text-3xl text-indigo-500"></i>
                                    </div>
                                    <h4 class="text-lg font-medium text-gray-900 mb-2">Belum ada pembayaran</h4>
                                    <p class="text-gray-500 max-w-md mx-auto">Anda belum memiliki riwayat pembayaran untuk pelatihan.</p>
                                    <a href="{{ route('pelatihan.index') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                                        <i class="fas fa-book-open mr-2"></i> Jelajahi Pelatihan
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        
        @if($pembayaran->isNotEmpty())
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
            <div class="text-sm text-gray-500">
                Menampilkan <span class="font-medium">{{ $pembayaran->firstItem() }}</span> sampai <span class="font-medium">{{ $pembayaran->lastItem() }}</span> dari <span class="font-medium">{{ $pembayaran->total() }}</span> transaksi
            </div>
            <div class="flex space-x-1">
                {{ $pembayaran->links() }}
            </div>
        </div>
        @endif
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
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="image-modal">Bukti Pembayaran</h3>
                            <button type="button" class="text-gray-400 hover:text-gray-500" onclick="closeModal()">
                                <i class="fas fa-times text-xl"></i>
                            </button>
                        </div>
                        <div class="mt-2">
                            <img id="modalImage" src="" class="w-full rounded-lg border border-gray-200">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200" onclick="closeModal()">
                    Tutup
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-all duration-200">
                    <i class="fas fa-download mr-2"></i> Unduh
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Modal Functions
function openModal(imageSrc) {
    document.getElementById('modalImage').src = imageSrc;
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