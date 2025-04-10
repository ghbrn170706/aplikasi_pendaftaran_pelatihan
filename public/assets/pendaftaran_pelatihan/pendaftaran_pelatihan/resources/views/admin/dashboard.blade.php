@include('layouts.template')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelatihan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100" style="position:absolute; left:20%;">
    <!-- Container lebih kecil agar tidak bertabrakan dengan sidebar -->
    <div class="container mx-auto px-4 py-8 max-w-6xl ml-20 md:ml-24">

        <!-- Header Card Panjang dengan Gelombang Biru -->
        <div class="relative bg-blue-500 rounded-lg p-6 mb-8 text-white shadow-md overflow-hidden ">
            <div class="absolute bottom-0 left-0 w-full h-16 bg-blue-700 transform rotate-2 skew-x-12"></div>
            <h1 class="text-2xl font-bold z-10 relative">Selamat Datang di Pendaftaran Pelatihan</h1>
            <p class="mt-2 z-10 relative">Temukan pelatihan terbaik untuk meningkatkan keterampilan Anda.</p>
        </div>

        <!-- Stats Container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Pelatihan Populer Card -->
            <div class="bg-white shadow-md rounded-lg p-4 transform transition duration-300 hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-600 text-sm">Pelatihan Populer</p>
                        <p class="text-xl font-bold">-</p>
                    </div>
                    <i class="bi bi-star-fill text-2xl text-yellow-400"></i>
                </div>
                <a href="/pelatihan-populer" class="mt-2 inline-block text-blue-500 hover:text-blue-700 text-sm">Lihat Detail →</a>
            </div>
            <!-- Pelatihan Offline Card -->
            <div class="bg-white shadow-md rounded-lg p-4 transform transition duration-300 hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-600 text-sm">Pelatihan Offline</p>
                        <p class="text-xl font-bold">-</p>
                    </div>
                    <i class="bi bi-building text-2xl text-green-500"></i>
                </div>
                <a href="/pelatihan-offline" class="mt-2 inline-block text-blue-500 hover:text-blue-700 text-sm">Lihat Detail →</a>
            </div>
            <!-- Pelatihan Online Card -->
            <div class="bg-white shadow-md rounded-lg p-4 transform transition duration-300 hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-600 text-sm">Pelatihan Online</p>
                        <p class="text-xl font-bold">-</p>
                    </div>
                    <i class="bi bi-globe text-2xl text-purple-500"></i>
                </div>
                <a href="/pelatihan-online" class="mt-2 inline-block text-blue-500 hover:text-blue-700 text-sm">Lihat Detail →</a>
            </div>
            <!-- User Terdaftar di Pelatihan Card -->
            <div class="bg-white shadow-md rounded-lg p-4 transform transition duration-300 hover:scale-105">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-600 text-sm">User Terdaftar</p>
                        <p class="text-xl font-bold">-</p> <!-- Gantilah '-' dengan jumlah user yang terdaftar -->
                    </div>
                    <i class="bi bi-people-fill text-2xl text-blue-500"></i>
                </div>
                <a href="/user-terdaftar" class="mt-2 inline-block text-blue-500 hover:text-blue-700 text-sm">Lihat Detail →</a>
            </div>
        </div>
    </div>
</body>
</html>