


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Guru Pelatihan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Detail Guru Pelatihan</h1>
            <a href="{{ route('guru_pelatihan.index') }}" 
               class="flex items-center text-indigo-600 hover:text-indigo-800 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <!-- Profile Card -->
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-md overflow-hidden">
            <div class="md:flex">
                <!-- Profile Image -->
                <div class="md:w-1/3 bg-gray-100 flex items-center justify-center p-6">
                    <div class="relative w-64 h-64 rounded-full overflow-hidden border-4 border-white shadow-lg">
                        <img src="{{ asset('storage/' . $guruPelatihan->gambar) }}" 
                             alt="{{ $guruPelatihan->nama }}" 
                             class="w-full h-full object-cover"
                             onerror="this.src='https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60'">
                    </div>
                </div>
                
                <!-- Profile Details -->
                <div class="md:w-2/3 p-8">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">{{ $guruPelatihan->nama }}</h2>
                            <p class="text-indigo-600 font-medium">{{ $guruPelatihan->spesialisasi_guru }}</p>
                        </div>
                       
                    </div>
                    
                    <!-- Details Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500">Jurusan</h3>
                            <p class="mt-1 text-lg font-semibold text-gray-800">{{ $guruPelatihan->jurusan }}</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-sm font-medium text-gray-500">Spesialisasi</h3>
                            <p class="mt-1 text-lg font-semibold text-gray-800">{{ $guruPelatihan->spesialisasi_guru }}</p>
                        </div>
                    </div>
                    
                    <!-- Life Journey -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">Perjalanan Hidup</h3>
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($guruPelatihan->deskripsi_perjalanan_hidup)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="max-w-4xl mx-auto mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                        <i class="fas fa-chalkboard-teacher text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Total Pelatihan</p>
                        <h3 class="text-2xl font-bold text-gray-800">24</h3>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <i class="fas fa-star text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Rating</p>
                        <h3 class="text-2xl font-bold text-gray-800">4.9/5</h3>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Siswa Terlatih</p>
                        <h3 class="text-2xl font-bold text-gray-800">1,240</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="max-w-4xl mx-auto mt-8 bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Aktivitas Terkini</h3>
            </div>
            <div class="divide-y divide-gray-200">
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start">
                        <div class="p-2 rounded-full bg-purple-100 text-purple-600 mr-4">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Pelatihan Desain Grafis</h4>
                            <p class="text-sm text-gray-500">15 Januari 2023 - 20 Februari 2023</p>
                            <p class="mt-1 text-gray-600">Mengajar dasar-dasar desain grafis menggunakan Adobe Photoshop dan Illustrator.</p>
                        </div>
                    </div>
                </div>
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start">
                        <div class="p-2 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">Sertifikasi Baru</h4>
                            <p class="text-sm text-gray-500">10 Januari 2023</p>
                            <p class="mt-1 text-gray-600">Mendapatkan sertifikasi Adobe Certified Expert (ACE) untuk Photoshop CC.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>