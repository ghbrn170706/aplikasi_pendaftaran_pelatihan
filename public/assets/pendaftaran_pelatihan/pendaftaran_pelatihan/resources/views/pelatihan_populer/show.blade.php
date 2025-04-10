<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    
    <style>
        #tanggalContainer::-webkit-scrollbar {
            height: 6px;
        }
        #tanggalContainer::-webkit-scrollbar-thumb {
            background-color: #ffffff;
            border-radius: 10px;
        }

        /* Initially hide the warning card */
.hidden {
    display: none;
}

.right-box {
    position: absolute;
    top: 150px; /* Sesuaikan dengan posisi vertikal yang diinginkan */
    right: 10%; /* Sesuaikan posisi kanan */
    width: 380px;
    height: 300px; /* Atur tinggi untuk membatasi scroll */
    overflow-y: auto; /* Mengaktifkan scroll vertikal */
    padding-right: 10px; /* Memberikan jarak di sebelah kanan agar scroll tidak menempel ke tepi */
}


/* Animation for showing the warning card */
@keyframes showCard {
    0% {
        opacity: 0;
        transform: translateY(-50px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.show-card {
    display: block;
    animation: showCard 1s ease-out forwards;
}

/* Styling for the warning card */
.warning-card {
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    max-width: 400px;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Styling for the warning card image */
.warning-card-image {
    margin-bottom: 15px;
}

.warning-image {
    max-width: 100px;  /* Adjust the size of the image */
    height: auto;
    margin-bottom: 15px;  /* Space between the image and the text */
}

/* Button styling */
.warning-card button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.warning-card button:hover {
    background-color: #0056b3;
}

        .tanggal-box {
            min-width: 100px;
            height: 110px;
            background-color: transparent;
            color: #1f2937;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.2s, background-color 0.2s, color 0.2s;
        }
        .tanggal-box:hover {
            background-color: #3b82f6;
            color: white;
            transform: scale(1.05);
        }
        
        /* New styles for the box positioning */
        .right-box {
            position: absolute;
            top: 150px; /* Adjust vertical positioning */
            right: 10%; /* Adjust right positioning */
            width: 380px;
        }

        /* Style for the alert box */
        .alert-box {
            display: none;
            background-color: #f44336;
            color: white;
            padding: 15px;
            margin-top: 10px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
        }

        /* Animation for the Warning Card */
        @keyframes showCard {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Style for the warning card */
        .warning-card {

    flex-direction: column;
    align-items: center; /* Centers the content horizontally */
    justify-content: center; /* Centers the content vertically */
    position: fixed;
    top: -1%;
    left: 30%;
    transform: translate(-50%, -50%);
    width: 350px;
    padding: 20px;
    background-color: #fcd34d;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    animation: showCard 1s ease-out forwards;
    z-index: 50;
    text-align: center;
}

.warning-card video {
    max-width: 100%;  /* Ensures the video resizes according to the width of the card */
    height: auto;  /* Keeps the aspect ratio of the video */
    border-radius: 8px;
}


        .warning-card h3 {
            font-size: 1.25rem;
            color: #1f2937;
            margin-bottom: 10px;
        }

        .warning-card p {
            color: #1f2937;
            font-size: 0.875rem;
            margin-bottom: 20px;
        }

        .warning-card button {
            background-color: #2563eb;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .warning-card button:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-white shadow-md p-4 flex items-center justify-between">
        <a href="#"><img src="logo.png" alt="Digitalent" class="w-32"></a>
        <div class="flex-grow mx-4">
            <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Pencarian Akademi, Pelatihan, Tema ...">
        </div>
        <div class="flex space-x-2">
        <a href="{{ route('login') }}" class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-100">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Daftar</a>
    </div>
    </nav>

    <hr class="border-t-2 border-black my-0">

    <div class="bg-white shadow-md">
        <nav class="container mx-auto px-6">
            <ul class="flex flex-wrap justify-center gap-6 p-4 text-gray-700 font-semibold">
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Home</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Akademi</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Micro Skill</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Jadwal</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Rilis Media</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Tentang Kami</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Mitra</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Publikasi</a></li>
                <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Kontak</a></li>
            </ul>
        </nav>
    </div>

    <!-- Blue Background Section -->
    <div class="max-w-full mx-auto">
        <div class="bg-blue-600 text-white p-8 rounded-lg shadow-lg w-full">
            <div class="max-w-fit text-left pl-6">
                <h1 class="text-2xl font-bold">{{ $pelatihan->nama_pelatihan }}</h1>
                <p class="text-sm mt-1">{{ $pelatihan->sub_judul }}</p>
                <hr class="border-t-2 border-white my-4 w-3/4">
                <div class="mt-4 flex space-x-6">
                    
                    <!-- Kategori Section -->
                    <div class="flex flex-col items-start space-y-1">
                        <h3 class="text-lg font-semibold">Kategori</h3>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-graduation-cap"></i>
                            <span>{{ $pelatihan->kategori }}</span>
                        </div>
                    </div>

                    <!-- Kapasitas Section -->
                    <div class="flex flex-col items-start space-y-1">
                        <h3 class="text-lg font-semibold">Peserta Terdaftar</h3>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-users"></i>
                            <span>- Peserta</span>
                        </div>
                    </div>

                    <!-- Self Enrolment Section -->
                    <div class="flex flex-col items-start space-y-1">
                        <h3 class="text-lg font-semibold">Alur Pendaftaran</h3>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-recycle"></i>
                            <span>Self Enrolment</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        

        
    </div>

    <!-- Image Below -->
    <div class="mt-6 flex justify-start pl-9">
    <img src="{{ $pelatihan->gambar_pelatihan ? asset('storage/' . $pelatihan->gambar_pelatihan) : 'https://via.placeholder.com/300' }}" 
                         alt="Pelatihan Image" class="w-2/4 rounded-lg shadow-lg">
</div>

<!-- Informasi dan Silabus Section -->
<div class="mt-6 pl-9">
<div class="flex space-x-4">
    <button id="informasiButton" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none">Informasi</button>
    <button id="silabusButton" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">Silabus</button>
</div>

<script>
    // JavaScript to toggle border color on click
    const informasiButton = document.getElementById('informasiButton');
    const silabusButton = document.getElementById('silabusButton');

    informasiButton.addEventListener('click', function() {
        // Reset border color for both buttons
        informasiButton.classList.add('border-b-4', 'border-blue-600');
        silabusButton.classList.remove('border-b-4', 'border-green-600');
    });

    silabusButton.addEventListener('click', function() {
        // Reset border color for both buttons
        silabusButton.classList.add('border-b-4', 'border-green-600');
        informasiButton.classList.remove('border-b-4', 'border-blue-600');
    });
</script>

<!-- Informasi Content -->
<div id="informasiContent" class="mt-4">
    <div class="flex space-x-4 px-4">
        <!-- Left Section -->
        <div class="w-full md:w-1/2 space-y-4">
            <div class="flex items-start border-b pb-4">
                <i class="fas fa-cogs text-xl text-green-500"></i>
                <div class="ml-3">
                    <h3 class="text-xl font-semibold text-gray-700">Metode</h3>
                    <p class="text-gray-600">Self-Paced (Mandiri)</p>
                </div>
            </div>
            <div class="flex items-start border-b pb-4">
                <i class="fas fa-layer-group text-xl text-teal-500"></i>
                <div class="ml-3">
                    <h3 class="text-xl font-semibold text-gray-700">Level</h3>
                    <p class="text-gray-600">{{ $pelatihan->level }}</p>
                </div>
            </div>
            <div class="flex items-start border-b pb-4">
                <i class="fas fa-users text-xl text-indigo-500"></i>
                <div class="ml-3">
                    <h3 class="text-xl font-semibold text-gray-700">Kuota Peserta</h3>
                    <p class="text-gray-600">{{$pelatihan->kapasitas}}</p>
                </div>
            </div>
        </div>

        <!-- Right Section -->
        <div class="w-full md:w-1/2 space-y-4 ml-auto">
            <div class="flex items-start border-b pb-4">
                <i class="fas fa-book text-xl text-blue-500"></i>
                <div class="ml-3">
                    <strong class="text-gray-700">Silabus</strong>
                    <br>
                    <span class="text-gray-600">Download</span>
                </div>
            </div>
            <div class="flex items-start border-b pb-4">
                <i class="fas fa-map-marker-alt text-xl text-red-500"></i>
                <div class="ml-3">
                    <h3 class="text-xl font-semibold text-gray-700">Zonasi</h3>
                    <p class="text-gray-600">Lihat</p>
                </div>
            </div>
            <div class="flex items-start border-b pb-4">
                <i class="fas fa-certificate text-xl text-yellow-500"></i>
                <div class="ml-3">
                    <strong class="text-gray-700">Sertifikat</strong>
                    <br>
                    <span class="text-gray-600">{{ $pelatihan->sertifikat }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Silabus Content -->
<div id="silabusContent" class="mt-4 hidden">
<div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Silabus (3 JP)</h2>
        <div class="flex flex-col space-y-4">
            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                <div class="w-6 h-6 bg-gray-300 rounded-full mr-4"></div>
                <div>
                    <h3 class="text-lg font-bold mb-1">Konsep Dasar SPBE</h3>
                    <p class="text-sm text-gray-500">1 JP</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                <div class="w-6 h-6 bg-gray-300 rounded-full mr-4"></div>
                <div>
                    <h3 class="text-lg font-bold mb-1">Kerangka Kerja SPBE</h3>
                    <p class="text-sm text-gray-500">1 JP</p>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg flex items-center">
                <div class="w-6 h-6 bg-gray-300 rounded-full mr-4"></div>
                <div>
                    <h3 class="text-lg font-bold mb-1">What's Next: Pelatihan Lanjutan</h3>
                    <p class="text-sm text-gray-500">1 JP</p>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="deskripsi flex-1 p-6 max-w-2xl">
      <h1 class="text-3xl font-semibold text-gray-800 mb-4">Deskripsi</h1>
      <p class="text-lg text-gray-600 leading-relaxed">{{ $pelatihan->deskripsi }}</p>
    </div>

<script>
    // JavaScript to toggle border color on click and show/hide content
    const informasiButton = document.getElementById('informasiButton');
    const silabusButton = document.getElementById('silabusButton');
    const informasiContent = document.getElementById('informasiContent');
    const silabusContent = document.getElementById('silabusContent');

    // Event listener for Informasi button
    informasiButton.addEventListener('click', function() {
        // Show the Informasi content and hide Silabus content
        informasiContent.classList.remove('hidden');
        silabusContent.classList.add('hidden');

        // Toggle the button border color
        informasiButton.classList.add('border-b-4', 'border-blue-600');
        silabusButton.classList.remove('border-b-4', 'border-green-600');
    });

    // Event listener for Silabus button
    silabusButton.addEventListener('click', function() {
        // Show the Silabus content and hide Informasi content
        silabusContent.classList.remove('hidden');
        informasiContent.classList.add('hidden');

        // Toggle the button border color
        silabusButton.classList.add('border-b-4', 'border-green-600');
        informasiButton.classList.remove('border-b-4', 'border-blue-600');
    });

    // Initialize by showing the Informasi content by default
    informasiContent.classList.remove('hidden');
    silabusContent.classList.add('hidden');
</script>


                </li>
            </div>
        </ul>
    </div>
</div>


   




    <!-- Floating Box in the Right -->
    <div class="right-box">
    <div class="bg-white p-4 mt-6 rounded-lg shadow-lg flex items-center gap-4">
        <img src="{{ $pelatihan->foto_pelatihan ? asset('storage/' . $pelatihan->foto_pelatihan) : 'https://via.placeholder.com/300' }}" 
             class="w-24 h-24 rounded-full object-cover border" 
             alt="Foto Pelatihan">
        <div class="flex-1">
            <h2 class="text-lg font-bold">{{ $pelatihan->nama_pelatihan }}</h2>
            <p class="text-gray-600 text-sm">Pelatihan yang diselenggarakan secara self-paced learning atau dikerjakan secara mandiri.</p>
           
            @if(Auth::check())
                <form action="{{ route('pelatihan.daftar', $pelatihan->pelatihanID) }}" method="POST">
                    @csrf
                    <input type="hidden" name="userID" value="{{ Auth::id() }}">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Daftar
                    </button>
                </form>
            @else
                <p>Anda harus <a href="{{ route('login') }}">login</a> terlebih dahulu.</p>
            @endif

            <a href="#" class="flex items-center bg-green-600 text-white px-3 py-1.5 rounded-lg mt-3 inline-block text-sm font-semibold">
                <i class="fas fa-share-alt mr-2"></i> Bagikan pelatihan ini
            </a>
        </div>
    </div>
</div>

    <script>
    const isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
</script>

<!-- Warning Card -->
<div id="warningCard" class="warning-card hidden" style="background-color:rgb(255, 255, 255); color: white; padding: 20px; border-radius: 8px; text-align: center;">
    <h3>Peringatan!</h3>
    <p>Anda harus login terlebih dahulu untuk melanjutkan.</p>

    <!-- Center the video container -->
    <div class="col-md-6 text-center flex justify-center items-center mt-4">
        <video class="img-fluid max-w-full h-auto" autoplay loop muted>
            <source src="{{ asset('videos/vidio4.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <button onclick="window.location.href='/login'" style="background-color: white; color: #007bff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; margin-top: 20px;">
        Klik Di Sini Untuk Melanjutkan
    </button>
</div>



<!-- JavaScript for handling the "Daftar" button click -->
<script>
    document.getElementById('daftarButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default action
        var warningCard = document.getElementById('warningCard');
        warningCard.classList.remove('hidden'); // Show the warning card
        warningCard.classList.add('show-card'); // Add animation class for showing
        
        // Optional: Hide the card after a few seconds (if needed)
        setTimeout(function() {
            warningCard.classList.remove('show-card');
            warningCard.classList.add('hidden'); // Hide it again after animation
        }, 5000); // Adjust the duration as needed
    });
</script>

<script>
    document.getElementById('informasiButton').addEventListener('click', function() {
        const informasiContent = document.getElementById('informasiContent');
        const silabusContent = document.getElementById('silabusContent');

        // Toggle visibility for informasi content
        if (informasiContent.classList.contains('hidden')) {
            informasiContent.classList.remove('hidden');
            informasiContent.classList.add('opacity-100', 'translate-y-0');
        } else {
            informasiContent.classList.add('hidden');
            informasiContent.classList.remove('opacity-100', 'translate-y-0');
        }

        // Hide silabus content if visible
        if (!silabusContent.classList.contains('hidden')) {
            silabusContent.classList.add('hidden');
            silabusContent.classList.remove('opacity-100', 'translate-y-0');
        }
    });

    document.getElementById('silabusButton').addEventListener('click', function() {
        const informasiContent = document.getElementById('informasiContent');
        const silabusContent = document.getElementById('silabusContent');

        // Toggle visibility for silabus content
        if (silabusContent.classList.contains('hidden')) {
            silabusContent.classList.remove('hidden');
            silabusContent.classList.add('opacity-100', 'translate-y-0');
        } else {
            silabusContent.classList.add('hidden');
            silabusContent.classList.remove('opacity-100', 'translate-y-0');
        }

        // Hide informasi content if visible
        if (!informasiContent.classList.contains('hidden')) {
            informasiContent.classList.add('hidden');
            informasiContent.classList.remove('opacity-100', 'translate-y-0');
        }
    });
</script>
</body>
</html>
