<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelatihan - Digitalent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   
    <style>

footer {
    margin-top: 100px; /* Beri jarak antara dokumentasi dan footer */
}
/* Gaya umum */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9fafb;
}

/* Gaya untuk wrapper pelatihan */
#trainingWrapper {
    overflow-x: auto;
    scroll-behavior: smooth;
    position: relative;
}

/* Menghilangkan scrollbar horizontal */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.scrollbar-hide {
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none; /* Firefox */
}


/* Gaya untuk setiap item pelatihan */
.training-item {
    background-color: white;
    border-radius: 0.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 20rem;
    padding: 1rem;
    transition: transform 0.3s ease;
}

/* Hover effect untuk item pelatihan */
.training-item:hover {
    transform: scale(1.02);
}

/* Gaya tombol panah */
#scrollLeft, #scrollRight {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    cursor: pointer;
    background-color: #e5e7eb;
    border: none;
    padding: 0.5rem;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
}

#scrollLeft:hover, #scrollRight:hover {
    background-color: #d1d5db;
}

#scrollLeft {
    left: 1rem;
}

#scrollRight {
    right: 1rem;
}

@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(-20px); }
    100% { opacity: 1; transform: translateY(0); }
}

        #documentationSection {
    position: absolute;
    top: 77%;
    right: 10%;
    width: 24%;
    height: auto; /* Biarkan tinggi menyesuaikan konten */
    max-height: 70vh; /* Hindari terlalu panjang */
   
    padding-bottom: 50px; /* Tambahkan jarak dari footer */
}

/* Pastikan footer tidak tertutup */
footer {
    position: relative;
    z-index: 10;
}

        /* Scrollbar styling */
        #tanggalContainer::-webkit-scrollbar {
            height: 6px;
        }
        #tanggalContainer::-webkit-scrollbar-thumb {
            background-color: #ffffff;
            border-radius: 10px;
        }
        /* Additional styles for date boxes */
        .tanggal-box {
            min-width: 100px; /* Lebarkan box */
            height: 110px; /* Tinggi tetap */
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
            background-color: #3b82f6; /* Blue background on hover */
            color: white; /* White text on hover */
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        #pelatihan {
    position: relative;
    top: 480px; /* Geser lebih ke bawah */


     /* Custom Animations */
     .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hover-scale:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
        }

        .hover-shadow:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .gradient-text {
            background: linear-gradient(90deg, #14b8a6, #0d9488);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hamburger Menu */
#menu-toggle {
    display: block;
}

/* Hide Mobile Menu by Default */
#mobile-menu {
    display: none;
}

/* Show Mobile Menu When Active */
#mobile-menu.active {
    display: block;
}

/* Responsive Design */
@media (min-width: 1024px) {
    /* Hide Hamburger Menu on Large Screens */
    #menu-toggle {
        display: none;
    }

    /* Show Desktop Navigation */
    #mobile-menu {
        display: none !important;
    }
}
}
    </style>
</head>
<body class="bg-blue-950 font-sans">

<nav class="bg-white shadow-md p-4 flex items-center justify-between sticky top-0 z-50">
    <!-- Logo -->
    <a href="#"><img src="logo.png" alt="Digitalent" class="w-32"></a>

    <!-- Hamburger Menu (Mobile) -->
    <button id="menu-toggle" class="block lg:hidden focus:outline-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Desktop Navigation -->
    <div class="hidden lg:flex items-center space-x-4">
      
        <div class="flex space-x-2">
            <a href="{{ route('login') }}" class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-100">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Daftar</a>
        </div>
    </div>
</nav>
<!-- Mobile Menu -->
<div id="mobile-menu" class="hidden bg-white shadow-md p-4 absolute top-16 left-0 w-full lg:hidden">
    <ul class="flex flex-col gap-4 text-gray-700 font-semibold">
        <li><a href="#" class="hover:text-blue-500">Home</a></li>
        <li><a href="#" class="hover:text-blue-500">Akademi</a></li>
        <li><a href="#" class="hover:text-blue-500">Micro Skill</a></li>
        <li class="relative">
            <a href="#" onclick="toggleDropdown('pelatihan-dropdown')" class="hover:text-blue-500 flex justify-between items-center">
                Pelatihan
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </a>
            <ul id="pelatihan-dropdown" class="hidden bg-white border border-gray-200 rounded-lg shadow-lg mt-2 w-full">
                <li><a href="#" class="block px-4 py-3 hover:bg-blue-500 hover:text-white">Pelatihan Online</a></li>
                <li><a href="#" class="block px-4 py-3 hover:bg-blue-500 hover:text-white">Pelatihan Offline</a></li>
                <li><a href="#" class="block px-4 py-3 hover:bg-blue-500 hover:text-white">Pelatihan Populer</a></li>
            </ul>
        </li>
        <li><a href="#" class="hover:text-blue-500">Rilis Media</a></li>
        <li><a href="#" class="hover:text-blue-500">Tentang Kami</a></li>
        <li><a href="#" class="hover:text-blue-500">Mitra</a></li>
        <li><a href="#" class="hover:text-blue-500">Publikasi</a></li>
        <li><a href="#" class="hover:text-blue-500">Kontak</a></li>
    </ul>
    <div class="mt-4 flex flex-col gap-2">
        <a href="{{ route('login') }}" class="px-4 py-2 border border-blue-500 text-blue-500 rounded-lg hover:bg-blue-100 text-center">Login</a>
        <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 text-center">Daftar</a>
    </div>
</div>

<hr class="border-t-2 border-black my-0">

<!-- Desktop Navigation -->
<div class="bg-white shadow-md sticky top-16 z-40 hidden lg:block">
    <nav class="container mx-auto px-6">
        <ul class="flex flex-wrap justify-center gap-6 p-4 text-gray-700 font-semibold">
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Home</a></li>
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Akademi</a></li>
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Micro Skill</a></li>
            <li class="relative group">
                <a href="#" class="hover:text-blue-500">Pelatihan</a>
                <ul class="absolute hidden bg-white border border-gray-200 rounded-lg shadow-lg w-48 group-hover:block">
                    <li><a href="#" class="block px-4 py-3 hover:bg-blue-500 hover:text-white">Pelatihan Online</a></li>
                    <li><a href="#" class="block px-4 py-3 hover:bg-blue-500 hover:text-white">Pelatihan Offline</a></li>
                    <li><a href="#" class="block px-4 py-3 hover:bg-blue-500 hover:text-white">Pelatihan Populer</a></li>
                </ul>
            </li>
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Rilis Media</a></li>
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Tentang Kami</a></li>
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Mitra</a></li>
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Publikasi</a></li>
            <li><a href="#" class="hover:text-blue-500 border-b-2 border-transparent hover:border-blue-500 pb-2 transition duration-300">Kontak</a></li>
        </ul>
    </nav>
</div>

<!-- JavaScript untuk Toggle Dropdown -->
<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        dropdown.classList.toggle('hidden');
    }
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });
});
</script>

<div class="bg-sky-300 text-white p-5 pt-20 pb-40 min-h-[600px]">
    <div class="container mx-auto flex flex-col md:flex-row items-start md:items-center justify-between">
        <!-- Bagian Teks -->
        <div class="relative md:top-0 -top-30">
            <h1 class="text-2xl font-bold">Jadwal Pelatihan</h1>
            <p class="text-sm mt-1">Rencanakan dan temukan jadwal pelatihan sesuai dengan agenda mu</p>
            <h2 class="text-lg font-bold mt-2">Pilih Bulan</h2>
        </div>
        <!-- Dropdown Bulan -->
        <div class="relative md:top-0 -top-50 mt-4 md:mt-0">
            <select id="bulanSelect" class="px-4 py-2 border rounded-lg text-gray-700 w-full md:w-auto">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
    </div>
    <!-- Container Tanggal -->
    <div id="tanggalContainer" class="flex overflow-x-auto space-x-2 mt-10 p-3 -mt-5">
        <!-- Tambahkan konten tanggal di sini -->
    </div>
    <!-- Indikator Scroll -->
    <div class="flex justify-center mt-5">
        <span class="w-4 h-2 bg-white rounded-full mx-1"></span>
        <span class="w-2 h-2 bg-white/50 rounded-full mx-1"></span>
        <span class="w-2 h-2 bg-white/50 rounded-full mx-1"></span>
    </div>
</div>

<!-- Judul Testimoni -->

<h1 class="text-lg md:text-xl font-extrabold px-4 py-2 rounded text-center animate-bounce relative -top-40 md:-top-62"
    style="font-family: 'Poppins', sans-serif;
           background: linear-gradient(90deg, #2DD4BF, #0D9488, #115E59);
           color: transparent;
           -webkit-background-clip: text;
           background-clip: text;
           animation: fadeIn 2s ease-in-out;">
    Testimoni Member E-learning Smart Steps Program
</h1>

<!-- Slider Testimoni -->
<div class="relative w-full overflow-hidden mx-auto -top-40 md:-top-70" style="max-width: 1300px;">
    <!-- Tombol Panah Kiri -->
    <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-teal-500 text-white p-2 rounded-full z-10">
        &#10094;
    </button>

    <!-- Container Slider -->
    <div class="overflow-hidden">
        <div id="slider" class="flex space-x-4 transition-transform duration-300 ease-in-out" style="width: calc(250px * 5 + 20px);">
            @foreach ($pendapat as $index => $item)
            <div class="pendapat-item bg-white rounded-lg shadow-md p-4 flex-shrink-0 w-64 mx-2" style="min-width: 250px;">
                <div class="text-purple-500 text-2xl mb-2">“</div>
                <p class="text-teal-600 font-bold mb-2">
                    Diterima Jadi {{ $item->posisi_sebagai }} di E-learning
                </p>
                <p class="text-gray-700 mb-4">
                    {{ $item->nama_anggota }}<br/>
                    {{ $item->jabatan_pekerjaan }}
                </p>
                <div class="w-24 h-24 mx-auto mb-4 overflow-hidden rounded-full">
                    <img alt="{{ $item->nama_anggota }}" class="object-cover w-full h-full" src="{{ asset('storage/' . $item->foto) }}"/>
                </div>
                <center>
                    <button class="bg-teal-500 text-white py-2 px-12 rounded">Baca Cerita</button>
                </center>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Tombol Panah Kanan -->
    <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-teal-500 text-white p-2 rounded-full z-10">
        &#10095;
    </button>
</div>



<script>
document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("slider");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");
    const items = document.querySelectorAll(".pendapat-item");
    const visibleCards = 5;
    const cardWidth = 250 + 16; // 250px lebar card + 16px margin
    let currentIndex = 0;

    function updateSliderPosition() {
        slider.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
    }

    nextBtn.addEventListener("click", () => {
        if (currentIndex + visibleCards < items.length) {
            currentIndex++;
            updateSliderPosition();
        }
    });

    prevBtn.addEventListener("click", () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateSliderPosition();
        }
    });

    // Sembunyikan tombol jika item lebih sedikit dari 5
    if (items.length <= visibleCards) {
        prevBtn.style.display = "none";
        nextBtn.style.display = "none";
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const bulanSelect = document.getElementById("bulanSelect");
    const tanggalContainer = document.getElementById("tanggalContainer");
    const pelatihanContainer = document.getElementById("pelatihanContainer");
    const today = new Date();
    const currentDate = today.getDate();
    const currentMonth = today.getMonth() + 1; // Bulan dimulai dari 0, jadi tambah 1

    // Simpan bulan di LocalStorage agar tetap sama saat refresh
    let selectedMonth = localStorage.getItem("selectedMonth") || currentMonth;
    bulanSelect.value = selectedMonth;

    function generateTanggal(bulan) {
        tanggalContainer.innerHTML = ""; // Reset tanggal sebelumnya
        const hariDalamBulan = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        const tahun = today.getFullYear();

        // Periksa tahun kabisat untuk Februari
        if (bulan === 2) {
            hariDalamBulan[1] = (tahun % 4 === 0 && (tahun % 100 !== 0 || tahun % 400 === 0)) ? 29 : 28;
        }

        for (let i = 1; i <= hariDalamBulan[bulan - 1]; i++) {
            let box = document.createElement("div");
            box.className = "tanggal-box cursor-pointer p-2 rounded text-center";
            box.innerHTML = `<span class="text-xl">${i.toString().padStart(2, '0')}</span> 
                            <span class="text-sm">${bulanSelect.options[bulanSelect.selectedIndex].text}</span>`;

            // Warna kotak tanggal berdasarkan kondisi
            if (bulan < currentMonth) {
                box.classList.add("bg-red-500", "text-white");
            } else if (bulan === currentMonth) {
                if (i < currentDate) {
                    box.classList.add("bg-red-500", "text-white"); // Tanggal yang sudah lewat
                } else if (i === currentDate) {
                    box.classList.add("bg-blue-900", "text-white"); // Tanggal hari ini
                    localStorage.setItem("selectedDate", i); // Simpan tanggal aktif
                } else {
                    box.classList.add("text-blue-700"); // Tanggal mendatang
                }
            } else {
                box.classList.add("text-blue-700");
            }

            // Event listener untuk klik manual
            box.addEventListener("click", function () {
                document.querySelectorAll(".tanggal-box").forEach(el => {
                    el.classList.remove("bg-blue-800", "text-white");
                    el.classList.add("text-blue-700");
                });
                box.classList.add("bg-blue-800", "text-white");
                localStorage.setItem("selectedDate", i);
                fetchPelatihanByDate(i, bulan);
            });

            tanggalContainer.appendChild(box);
        }

        // Fokus ke hari ini jika bulan yang dipilih adalah bulan saat ini
        if (bulan === currentMonth) {
            const hariIniBox = document.querySelector(`.tanggal-box:nth-child(${currentDate})`);
            if (hariIniBox) {
                hariIniBox.classList.add("bg-blue-800", "text-white");
                hariIniBox.scrollIntoView({ behavior: "smooth", block: "nearest" });
                fetchPelatihanByDate(currentDate, bulan);
            }
        }
    }

    function fetchPelatihanByDate(tanggal, bulan) {
        pelatihanContainer.innerHTML = `<p class="text-center text-gray-600">Memuat pelatihan...</p>`;
        setTimeout(() => {
            const selectedDate = `2025-${bulan.toString().padStart(2, '0')}-${tanggal.toString().padStart(2, '0')}`;
            const pelatihanItems = document.querySelectorAll(".pelatihan-item");
            let pelatihanHTML = "";
            let found = false;
            pelatihanItems.forEach(item => {
                const pelatihanDate = item.getAttribute("data-date");
                if (pelatihanDate === selectedDate) {
                    pelatihanHTML += item.outerHTML;
                    found = true;
                }
            });
            if (!found) {
                pelatihanContainer.innerHTML = `<p class="text-center text-gray-600">Tidak ada pelatihan pada tanggal ini.</p>`;
            } else {
                pelatihanContainer.innerHTML = pelatihanHTML;
            }
        }, 300);
    }

    bulanSelect.addEventListener("change", function () {
        const selectedMonth = parseInt(bulanSelect.value);
        localStorage.setItem("selectedMonth", selectedMonth);
        generateTanggal(selectedMonth);
        pelatihanContainer.innerHTML = "<p class='text-center text-gray-500'>Pilih tanggal untuk melihat pelatihan</p>";
    });

    // Generate tanggal pertama kali
    generateTanggal(parseInt(selectedMonth));
});
</script>




<div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1 gap-4" id="documentationSection" style="position: absolute; top: 155%; right: 2%; width: 24%; height: 20%;">
    @foreach ($dokumentasi as $item)
        <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 max-w-xs mx-auto flex flex-col items-center">
            <img src="{{ asset('storage/dokumentasi/' . $item->gambar) }}" 
                 alt="{{ $item->judul_pelatihan }}" 
                 class="w-full h-48 object-cover rounded-lg mb-2 aspect-[16/9]">
        </div>
    @endforeach
</div>


 <!-- Achievements Section -->
<div class="w-full lg:w-2/3" style="position: absolute; left:4%; top:160%;">
    <section class="text-center lg:text-left">
        <!-- Container untuk menengahkan elemen -->
        <div class="flex flex-col items-center justify-center lg:items-start lg:justify-start lg:ml-16">
            <h2 class="text-sm text-teal-500 tracking-widest mb-2 animate__animated animate__fadeInDown">PENCAPAIAN KAMI</h2>
            <h1 class="text-4xl font-bold mb-8 fade-in gradient-text text-white">
  Kontribusi Kami Dalam Angka<span>.</span>
</h1>

        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Card 1 -->
            <div class="flex flex-col items-center hover-shadow rounded-lg p-6 bg-white transition-all duration-300 hover:shadow-lg">
                <div class="bg-teal-500 p-4 rounded-full mb-4 hover-scale">
                    <i class="fas fa-clipboard-list text-white text-3xl"></i>
                </div>
                <div class="text-4xl font-bold">100<span class="text-teal-500">+</span></div>
                <div class="text-gray-600 mt-2">Pelatihan</div>
            </div>
            <!-- Card 2 -->
            <div class="flex flex-col items-center hover-shadow rounded-lg p-6 bg-white transition-all duration-300 hover:shadow-lg">
                <div class="bg-teal-500 p-4 rounded-full mb-4 hover-scale">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <div class="text-4xl font-bold">1,000<span class="text-teal-500">+</span></div>
                <div class="text-gray-600 mt-2">Alumni</div>
            </div>
            <!-- Card 3 -->
            <div class="flex flex-col items-center hover-shadow rounded-lg p-6 bg-white transition-all duration-300 hover:shadow-lg">
                <div class="bg-teal-500 p-4 rounded-full mb-4 hover-scale">
                    <i class="fas fa-star text-white text-3xl"></i>
                </div>
                <div class="text-4xl font-bold">98<span class="text-teal-500">%</span></div>
                <div class="text-gray-600 mt-2">Kepuasan</div>
            </div>
            <!-- Card 4 -->
            <div class="flex flex-col items-center hover-shadow rounded-lg p-6 bg-white transition-all duration-300 hover:shadow-lg">
                <div class="bg-teal-500 p-4 rounded-full mb-4 hover-scale">
                    <i class="fas fa-stopwatch text-white text-3xl"></i>
                </div>
                <div class="text-4xl font-bold">3,000<span class="text-teal-500">+</span></div>
                <div class="text-gray-600 mt-2">Jam Pelatihan</div>
            </div>
        </div>
    </section>
   
     <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
   <div class="flex justify-between items-center mb-6">
   <h2 class="text-2xl font-bold text-white">
  Berbagai macam kejuruan
</h2>
<a class="text-white" href="#">
  Semua Kejuruan
</a>
</div>
<p class="text-white mb-6">
  Pilih kejuruan yang ingin kamu pelajari lebih lanjut.
</p>



    <div class="relative">

<!-- Tombol Panah Kiri -->
<button id="prevButton" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-full bg-gray-200 z-10">
    <i class="fas fa-chevron-left"></i>
</button>

<!-- Konten Slider -->
<div id="slider" class="flex space-x-4 overflow-x-auto scroll-smooth scrollbar-hide py-4">
    @forelse ($kejuruan as $item)
        <!-- Jurusan Dinamis -->
        <div class="flex flex-col items-center min-w-[100px] flex-shrink-0">
            <img 
                alt="{{ $item->nama_kejuruan }} icon" 
                class="mb-2 w-12 h-12 object-cover rounded-full" 
                src="{{ $item->gambar }}" 
            />
            <span class="text-white text-center text-xs">
                {{ $item->nama_kejuruan }}
            </span>
        </div>
    @empty
        <!-- Tampilkan pesan jika data kosong -->
        <div class="flex flex-col items-center min-w-[100px] flex-shrink-0">
            <span class="text-gray-700 text-center">Tidak ada jurusan tersedia.</span>
        </div>
    @endforelse
</div>

<!-- Tombol Panah Kanan -->
<button id="nextButton" class="absolute right-0 top-1/2 transform -translate-y-1/2 p-2 rounded-full bg-gray-200 z-10">
    <i class="fas fa-chevron-right"></i>
</button>
</div>

<div id="pelatihan" class="max-w-7xl mx-auto mt-20 mb-20 relative bg-teal-500 rounded-lg p-6" style="position:relative; top:-10px;">
    <!-- Judul -->
    <h1 class="text-center text-xl font-bold text-white bg-teal-700 px-4 py-2 rounded-lg shadow-md mb-6">
        Pelatihan Populer
    </h1>

    <!-- Tombol Panah -->
    <button id="scrollLeft" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 text-gray-600 p-2 rounded-full shadow-lg z-10">
        <i class="fas fa-chevron-left text-sm"></i>
    </button>

    <div class="overflow-x-auto scrollbar-hide" id="trainingWrapper">
        <div class="flex gap-4 px-4" id="trainingContainer">
            @foreach ($pelatihans_populer as $pelatihan)
                <div class="training-item bg-white rounded-lg shadow-md p-3 min-w-[200px]">
                    <!-- Gambar -->
                    <div class="mb-3">
                        <img src="{{ $pelatihan->foto_pelatihan ? asset('storage/' . $pelatihan->foto_pelatihan) : 'https://via.placeholder.com/200' }}" 
                             class="rounded-lg border border-gray-200 shadow-sm w-full h-28 object-cover" 
                             alt="Foto Pelatihan">
                    </div>
                    
                    <!-- Konten -->
                    <h3 class="text-base font-semibold text-center mb-2 line-clamp-2">{{ $pelatihan->nama_pelatihan }}</h3>
                    <p class="text-gray-500 text-[10px] text-center mb-3 line-clamp-2">{{ $pelatihan->deskripsi }}</p>
                    
                    <!-- Detail -->
                    <div class="text-gray-600 text-[10px] space-y-1">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-users text-[10px]"></i>
                            <span>63.286 Peserta</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-book text-[10px]"></i>
                            <span>12 Topik • 152 Materi</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-calendar text-[10px]"></i>
                            <span>{{ \Carbon\Carbon::parse($pelatihan->jadwal_mulai)->format('d M Y') }} - 
                            {{ \Carbon\Carbon::parse($pelatihan->jadwal_selesai)->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-money-bill-wave text-[10px]"></i>
                            <span>Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-location-dot text-[10px]"></i>
                            <span class="truncate">{{ $pelatihan->lokasi ?? '-' }}</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-users text-[10px]"></i>
                            <span>{{ $pelatihan->kapasitas }} Orang</span>
                        </div>
                        <div class="flex items-center gap-1 text-yellow-500">
                            <i class="fas fa-star text-[10px]"></i>
                            <span>4,58/5</span>
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="flex items-center justify-between mt-3">
                        <span class="bg-green-500 text-white text-[10px] font-medium px-2 py-0.5 rounded">
                            {{ $pelatihan->status ?? 'Buka' }}
                        </span>
                        <a href="{{ url('/pelatihan/' . $pelatihan->pelatihanID) }}" class="text-blue-500 text-[10px] hover:underline">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Tombol Panah Kanan -->
    <button id="scrollRight" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 text-gray-600 p-2 rounded-full shadow-lg z-10">
        <i class="fas fa-chevron-right text-sm"></i>
    </button>
</div>
<script>
    // Script untuk menyamakan tinggi tetap dipertahankan
    document.addEventListener("DOMContentLoaded", () => {
        const trainingItems = document.querySelectorAll(".training-item");
        
        function equalizeHeights() {
            let maxHeight = 0;
            trainingItems.forEach(item => {
                item.style.height = 'auto';
                maxHeight = Math.max(maxHeight, item.offsetHeight);
            });
            trainingItems.forEach(item => item.style.height = `${maxHeight}px`);
        }

        equalizeHeights();
        window.addEventListener('resize', equalizeHeights);
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const trainingWrapper = document.getElementById("trainingWrapper");
    const scrollLeftButton = document.getElementById("scrollLeft");
    const scrollRightButton = document.getElementById("scrollRight");

    // Scroll ke kanan
    scrollRightButton.addEventListener("click", () => {
        trainingWrapper.scrollBy({
            left: 300, // Jumlah piksel untuk digeser
            behavior: "smooth",
        });
    });

    // Scroll ke kiri
    scrollLeftButton.addEventListener("click", () => {
        trainingWrapper.scrollBy({
            left: -300, // Jumlah piksel untuk digeser
            behavior: "smooth",
        });
    });
});
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const dateFilter = document.getElementById('dateFilter');
    const trainingItems = document.querySelectorAll('.training-item');

    dateFilter.addEventListener('change', function () {
        const selectedDate = this.value; // Tanggal yang dipilih oleh pengguna

        trainingItems.forEach(item => {
            const startDate = item.dataset.startDate;
            const endDate = item.dataset.endDate;

            // Cek apakah tanggal yang dipilih berada dalam rentang jadwal pelatihan
            if (selectedDate >= startDate && selectedDate <= endDate) {
                item.style.display = 'block'; // Tampilkan pelatihan
            } else {
                item.style.display = 'none'; // Sembunyikan pelatihan
            }
        });
    });
});
</script>





<script>
    document.addEventListener("DOMContentLoaded", function () {
        const badges = document.querySelectorAll(".status-badge");

        badges.forEach(badge => {
            const jadwalMulai = new Date(badge.dataset.jadwal);
            const today = new Date();

            if (today > jadwalMulai) {
                badge.textContent = "Tutup";
                badge.classList.remove("bg-green-500");
                badge.classList.add("bg-red-500");
            }
        });
    });
</script>
</div>

</script>
</body>
</html>