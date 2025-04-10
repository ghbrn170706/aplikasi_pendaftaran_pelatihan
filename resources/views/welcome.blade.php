
<!doctype html>
<html class="no-js" lang="zxx">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Pendaftaran Pelatihan</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="{{ asset('site.webmanifest') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">


<!-- CSS here -->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
<link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('css/progressbar_barfiller.css') }}">
<link rel="stylesheet" href="{{ asset('css/gijgo.css') }}">
<link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/animated-headline.css') }}">
<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<script src="https://cdn.tailwindcss.com"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
     .overflow-hidden {
        overflow: hidden;
    }
    #slider {
        display: flex;
        transition: transform 0.3s ease-in-out;
    }
    .object-fit-cover {
        object-fit: cover;
    }

    support-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px; /* Jarak antara teks dan gambar */
    }

    .left-content2 { .
        text-align: left; /* Pastikan teks rata kiri */
    }

    .right-img img {
        border-radius: 10px; /* Optional: Memberikan sudut melengkung pada gambar */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Menambahkan bayangan pada gambar */
    }

    @media (max-width: 768px) {
        .support-wrapper {
            flex-direction: column; /* Tumpuk elemen secara vertikal pada layar kecil */
        }

        .left-content2 {
            padding-top: 20px; /* Kurangi padding untuk layar kecil */
        }

        .right-content2 {
            justify-content: center; /* Pusatkan gambar pada layar kecil */
        }
    }

    .support-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px; /* Jarak antara teks dan gambar */
    }

    .left-content2 {
        text-align: left; /* Pastikan teks rata kiri */
    }

    .right-img img {
        border-radius: 10px; /* Optional: Memberikan sudut melengkung pada gambar */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Optional: Menambahkan bayangan pada gambar */
    }

    @media (max-width: 768px) {
        .support-wrapper {
            flex-direction: column; /* Tumpuk elemen secara vertikal pada layar kecil */
        }

        .left-content2 {
            padding-top: 20px; /* Kurangi padding untuk layar kecil */
        }
    }
 /* Styling for the slider */
 .slider-wrapper {
        width: 100%;
        overflow: hidden;
    }

    .card-slider {
        transition: transform 0.5s ease-in-out;
        display: flex;
        gap: 20px; /* Space between cards */
    }

    .single-cat {
        min-width: 250px; /* Adjust based on your design */
        padding: 15px;
        border: 1px solid #ddd; /* Border between cards */
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    #prevBtn, #nextBtn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 3;
    background-color: #ff7f50; /* Warna tombol */
    border: none;
    padding: 10px 15px;
    border-radius: 50%;
    color: white;
    font-size: 20px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
}

#prevBtn {
    left: -30px; /* Atur posisi kiri */
}

#nextBtn {
    right: -30px; /* Atur posisi kanan */
}

#prevBtn:hover, #nextBtn:hover {
    background-color: #ff4500; /* Warna saat hover */
}


    .prev-btn {
        left: 10px;
    }

    .next-btn {
        right: 10px;
    }

    .btn-nav:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }
    
   </style>
    
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
        <div class="header-area header-transparent">
            <div class="main-header ">
                <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                          <!-- Logo -->
<div class="col-xl-2 col-lg-2">
    <div class="logo" style="display: flex; align-items: center;">
        <!-- Logo Image -->
        <a href="index.html">
            <img src="assets/img/SkillForge.png" alt="Logo" style="margin-right: 10px;">
        </a>
        <!-- Text Beside Logo -->
        <h1 style="color: white; margin: 0;">SkillForge</h1>
    </div>
</div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">                                                                                          
                                                <li class="active" ><a href="index.html">Beranda</a></li>
                                                <li><a href="courses.html">Akademi</a></li>
                                                <li><a href="about.html">Micro Skill</a></li>
                                                <li><a href="#">Pelatihan</a>
                                                    <ul class="submenu">
                                                        <li><a href="blog.html">Pelatihan Populer</a></li>
                                                        <li><a href="blog_details.html">Pelatihan Online</a></li>
                                                        <li><a href="elements.html">Pelatihan Offline</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="contact.html">Kontak</a></li>
                                                <!-- Button -->
                                                <li class="button-header margin-left">
    <a href="/register" class="btn">Daftar</a>
</li>
<li class="button-header">
    <a href="/login" class="btn btn3">Masuk</a>
</li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div> 
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>
    
    <main>
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-12">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Jadwal Pelatihan</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Rencanakan dan temukan jadwal pelatihan sesuai dengan agenda mu</p>
                                   
                                </div>
    
   
                            </div>
                            
                        </div>
                    </div>          
                </div>
            </div>


            
        </section>
        <div class="services-area">
    <div class="container">
        <div class="row justify-content-sm-center">
            <!-- Bootstrap Slider Testimoni -->
            <div class="container position-relative mt-5" style="max-width: 1300px;">
                <!-- Tombol Panah Kiri -->
                <button id="prevBtn" class="btn btn-primary position-absolute top-50 start-0 translate-middle-y z-3" style="left: 0;">
                    &#10094;
                </button>
                
                <!-- Container Slider -->
                <div class="overflow-hidden position-relative">
                    <div id="slider" class="d-flex transition-transform" style="gap: 20px;">
                        <!-- Looping Testimoni -->
                        @foreach ($pendapat as $index => $item)
                        <div class="pendapat-item bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-lg p-4 flex-shrink-0 w-64 mx-2" style="min-width: 250px;">
                            <div class="text-white text-2xl mb-2">“</div>
                            <p class="text-white font-bold mb-2">
                                Diterima Jadi {{ $item->posisi_sebagai }} di E-learning
                            </p>
                            <p class="text-white mb-4">
                                {{ $item->nama_anggota }}<br/>
                                {{ $item->jabatan_pekerjaan }}
                            </p>
                            <div class="w-24 h-24 mx-auto mb-4 overflow-hidden rounded-full border-4 border-white">
                                <img alt="{{ $item->nama_anggota }}" class="object-cover w-full h-full" src="{{ asset('storage/' . $item->foto) }}"/>
                            </div>
                            <center>
                            <a class="btn bg-white text-blue-600 py-2 px-12 rounded font-bold" href="{{ route('pendapat_anggota.show', $item->id) }}">Baca Cerita</a>

                            </center>
                        </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Tombol Panah Kanan -->
                <button id="nextBtn" class="btn btn-primary position-absolute top-50 end-0 translate-middle-y z-3" style="right: 0;">
                    &#10095;
                </button>
            </div>
        </div>
    </div>
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


                </div>
            </div>
        </div>
      </div>
        </section>


</div>
        <!-- About Area End -->


 <!--? About Area-2 Start -->
<!-- About Area-2 Start -->
<section class="about-area2 fix pb-padding">
    <div class="support-wrapper align-items-center">
        <!-- Left Content -->
        <div class="left-content2 d-flex align-items-start" style="padding-top: 50px; flex: 1;">
            <!-- Section Title -->
            <div class="section-tittle section-tittle2 mb-20">
                <div class="front-text">
                    <h2 class="">Daftar Pelatihan Sekarang
                        dan Tingkatkan Keterampilan Anda!</h2>
                    <p>Ikuti pelatihan kami untuk mengembangkan keterampilan profesional Anda. Dapatkan akses ke materi eksklusif dan teknik terbaru untuk meningkatkan kemampuan Anda.</p>
                    <a href="#" class="btn">Daftar Sekarang</a>
                </div>
            </div>
        </div>

      <!-- Right Image Container -->
<div class="right-content2" style="flex: 1; display: flex; justify-content: flex-end; top:40px;">
    <div class="right-img-container" style="display: flex; gap: 30px; position: relative;">
        <!-- First Image -->
        <div class="right-img" style="position: relative; z-index: 1; left: -70%;" >
            <img src="assets/img/cowo1.jpg" alt="" style="width: 300px; height: 400px; object-fit: cover; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        </div>
        <!-- Second Image -->
        <div class="right-img" style="position: absolute; z-index: 2; top: 200px; left: -50px;">
            <img src="assets/img/cewe4.jpg" alt="" style="width: 300px; height: 400px; object-fit: cover; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        </div>
    </div>
</div>
    </div>
</section>
<!-- About Area End -->
<!-- About Area End -->


<!-- Top Subjects Area Start -->
<div class="topic-area py-16 bg-[url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2240%22 height=%2240%22 viewBox=%220 0 20 20%22%3E%3Crect x=%220%22 y=%220%22 width=%2210%22 height=%2210%22 fill=%22rgba(200, 200, 255, 0.3)%22/%3E%3Crect x=%2210%22 y=%2210%22 width=%2210%22 height=%2210%22 fill=%22rgba(200, 200, 255, 0.3)%22/%3E%3C/svg%3E')]">
    <div class="container mx-auto px-4">
        <!-- Judul -->
        <h1 class="text-center text-xl font-bold text-white bg-teal-700 px-4 py-2 rounded-lg shadow-md mb-5">
            Pelatihan Populer
        </h1>
<!-- Pelatihan Grid -->
<div id="pelatihan-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
@foreach ($pelatihans_populer->take(6) as $index => $pelatihan)
<div class="group rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 bg-gradient-to-b from-blue-500 to-purple-600 text-white">
    <div class="relative">
        <img 
            src="{{ $pelatihan->foto_pelatihan ? asset('storage/' . $pelatihan->foto_pelatihan) : 'https://via.placeholder.com/50' }}" 
            alt="Foto Pelatihan"
            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
        />
    </div>
    <div class="p-4">
        <h3 class="text-lg font-semibold text-white group-hover:text-purple-300 transition-colors duration-300">
            <a href="{{ url('/pelatihan/' . $pelatihan->pelatihanID) }}">{{ $pelatihan->nama_pelatihan }}</a>
        </h3>
        <p class="mt-2 text-sm text-white font-medium">Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}</p>
        <div class="flex items-center mt-2">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $pelatihan->rating)
                    <svg class="w-4 h-4 fill-yellow-400 mr-1" viewBox="0 0 24 24">
                        <path d="M12 .587l3.668 7.431L24 9.748l-6 5.843 1.417 8.266L12 18.896l-7.417 4.961L6 15.591 0 9.748l8.332-1.73z"/>
                    </svg>
                @else
                    <svg class="w-4 h-4 fill-gray-300 mr-1" viewBox="0 0 24 24">
                        <path d="M12 .587l3.668 7.431L24 9.748l-6 5.843 1.417 8.266L12 18.896l-7.417 4.961L6 15.591 0 9.748l8.332-1.73z"/>
                    </svg>
                @endif
            @endfor
        </div>
    </div>
</div>
@endforeach

</div>


        <!-- Pagination -->
        <div class="flex justify-center mt-10">
            <button id="toggle-pelatihan" class="border border-gray-300 px-6 py-2 rounded-md text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition duration-300">
                All Pelatihan Populer
            </button>
        </div>
    </div>
</div>
<!-- Top Subjects End -->

<!-- JavaScript -->
<script>
    // Simpan semua data pelatihan dalam array JavaScript
    const allPelatihans = {!! json_encode($pelatihans_populer) !!};
    let isShowingAll = false; // Status apakah sedang menampilkan semua pelatihan

    const pelatihanGrid = document.getElementById('pelatihan-grid');
    const toggleButton = document.getElementById('toggle-pelatihan');

    // Fungsi untuk menampilkan semua pelatihan
    function showAllPelatihans() {
        // Hapus semua pelatihan yang sudah ada (kecuali 6 pertama)
        while (pelatihanGrid.children.length > 6) {
            pelatihanGrid.removeChild(pelatihanGrid.lastChild);
        }

        // Tambahkan semua pelatihan ke grid
        allPelatihans.forEach((pelatihan, index) => {
            if (index >= 6) { // Hanya tambahkan pelatihan setelah 6 pertama
                const card = document.createElement('div');
                card.className = 'group rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 bg-white';

                card.innerHTML = `
                    <div class="relative">
                        <img 
                            src="${pelatihan.foto_pelatihan ? '/storage/' + pelatihan.foto_pelatihan : 'https://via.placeholder.com/50'}" 
                            alt="Foto Pelatihan"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
                        />
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">
                            <a href="/pelatihan/${pelatihan.pelatihanID}">${pelatihan.nama_pelatihan}</a>
                        </h3>
                    </div>
                `;

                pelatihanGrid.appendChild(card);
            }
        });

        // Ubah status dan teks tombol
        isShowingAll = true;
        toggleButton.textContent = 'Tutup Pelatihan';
    }

    // Fungsi untuk menyembunyikan semua pelatihan tambahan
    function hideExtraPelatihans() {
        // Hapus semua pelatihan setelah 6 pertama
        while (pelatihanGrid.children.length > 6) {
            pelatihanGrid.removeChild(pelatihanGrid.lastChild);
        }

        // Ubah status dan teks tombol
        isShowingAll = false;
        toggleButton.textContent = 'All Pelatihan Populer';
    }

    // Event listener untuk tombol toggle
    toggleButton.addEventListener('click', () => {
        if (isShowingAll) {
            // Jika sedang menampilkan semua, sembunyikan kembali
            hideExtraPelatihans();
        } else {
            // Jika belum menampilkan semua, muat semua pelatihan
            showAllPelatihans();
        }
    });
</script>

<div class="left-content2 p-6 md:p-12">
    <!-- Judul Seksi -->
    <div class="section-tittle section-tittle2 mb-6 text-center md:text-left">
        <div class="front-text">
            <h2 class="text-2xl md:text-4xl font-bold leading-tight">
                Ambil Langkah Selanjutnya  
                Menuju Tujuan Pribadi  
                dan Profesional Anda  
                Bersama Kami.
            </h2>
            <p class="mt-4 text-gray-600 text-sm md:text-base">
                Proses otomatis untuk semua kebutuhan pelatihan Anda.  
                Temukan berbagai teknik dan alat untuk berinteraksi secara efektif  
                dengan anak-anak dan remaja yang rentan.
            </p>
            <a href="#" class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-lg text-sm md:text-base font-semibold shadow-md hover:bg-blue-700 transition">
                Daftar Sekarang Gratis
            </a>
        </div>
    </div>
</div>

        <!-- About Area End -->
      <!-- Team Section -->
<section class="team-area section-padding40 fix">
    <div class="container">
        <!-- Title Section -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Para Ahli Komunitas</h2>
                </div>
            </div>
        </div>

       <!-- Slider Wrapper -->
<div class="slider-wrapper position-relative overflow-hidden">
    <!-- Card Slider -->
    <div class="card-slider d-flex" id="cardSlider">
        @foreach ($guruPelatihan as $guru)
            <div class="single-cat text-center mx-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-lg p-4 flex-shrink-0 transition-transform transform hover:scale-105">
                <!-- Image or Placeholder -->
                <div class="cat-icon">
                    @if ($guru->gambar)
                        <img src="{{ asset('storage/' . $guru->gambar) }}" alt="{{ $guru->nama }}"
                            class="w-32 h-32 object-cover rounded-full mx-auto border-4 border-white">
                    @else
                        <div class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center mx-auto">
                            <span class="text-gray-200">No Image</span>
                        </div>
                    @endif
                </div>
                <!-- Content -->
                <div class="cat-cap mt-3">
    <h5>
        <a href="{{ route('guru_pelatihan.show', $guru->gurupelatihanID) }}" class="text-white font-bold">
            {{ $guru->nama }}
        </a>
    </h5>
    <p class="text-gray-200">{{ $guru->jurusan }}</p>
</div>

            </div>
        @endforeach
    </div>
</div>


        <!-- JavaScript -->
<script>
    // JavaScript for Slider
    const cardSlider = document.getElementById('cardSlider');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentIndex = 0;
    const cardWidth = 270; // Width of each card including margin
    const totalCards = {{ count($guruPelatihan) }}; // Total number of cards
    const visibleCards = 4; // Number of cards visible at a time

    // Function to move the slider
    function moveSlider(index) {
        const offset = -index * cardWidth;
        cardSlider.style.transform = `translateX(${offset}px)`;
    }

    // Event listeners for navigation buttons
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            moveSlider(currentIndex);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentIndex < totalCards - visibleCards) {
            currentIndex++;
            moveSlider(currentIndex);
        }
    });

    // Auto-slide functionality
    setInterval(() => {
        if (currentIndex < totalCards - visibleCards) {
            currentIndex++;
        } else {
            currentIndex = 0; // Reset to the beginning
        }
        moveSlider(currentIndex);
    }, 5000); // Change slide every 5 seconds
</script>
    </div>
</section>
<!-- End Team Section -->
<section class="about-area2 fix pb-padding">
    <div class="support-wrapper flex flex-col lg:flex-row items-center justify-between">
        <!-- Konten Kiri -->
        <div class="left-content2 w-full lg:w-1/2 text-left p-6">
            <div class="section-tittle section-tittle2 mb-20">
                <div class="front-text">
                    <h2 class="text-3xl font-bold">Pilih Jurusan Terbaik untuk Masa Depan Anda</h2>
                    <p class="mt-4 text-gray-600">Temukan jurusan yang sesuai dengan minat dan bakat Anda. Pilih dengan bijak untuk memaksimalkan potensi pribadi dan profesional Anda, serta mencapai tujuan karier yang lebih cerah di masa depan.</p>
                </div>
            </div>
        </div>

        <!-- Konten Kejuruan di Kanan -->
        <div class="relative w-full lg:w-1/2 overflow-hidden p-6">
            <!-- Tombol Navigasi -->
            <button id="prevButton" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md z-10">&larr;</button>
            <button id="nextButton" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white p-2 rounded-full shadow-md z-10">&rarr;</button>

            <!-- Grid Card -->
            <div id="scrollContainer" class="flex space-x-6 overflow-hidden scroll-smooth">
                @forelse ($kejuruan as $index => $item)
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg shadow-lg overflow-hidden inline-block w-64 flex-shrink-0 transition-transform transform hover:scale-105" style="display: {{ $index < 5 ? 'block' : 'none' }};">
                        <div class="p-4">
                            <!-- Gambar -->
                            <div class="flex justify-center mb-4">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_kejuruan }}" class="w-32 h-32 object-cover rounded-full border-4 border-white">
                                @else
                                    <span class="text-gray-200">Tidak ada gambar</span>
                                @endif
                            </div>

                            <!-- Nama Kejuruan -->
                            <h2 class="text-xl font-bold text-center">{{ $item->nama_kejuruan }}</h2>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-600 text-center">Tidak ada data kejuruan.</div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const scrollContainer = document.getElementById('scrollContainer');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const cards = scrollContainer.children;
    let index = 0;
    const maxIndex = Math.max(0, cards.length - 5);

    function updateDisplay() {
        for (let i = 0; i < cards.length; i++) {
            cards[i].style.display = (i >= index && i < index + 5) ? 'block' : 'none';
        }
    }

    prevButton.addEventListener('click', () => {
        if (index > 0) {
            index--;
            updateDisplay();
        }
    });

    nextButton.addEventListener('click', () => {
        if (index < maxIndex) {
            index++;
            updateDisplay();
        }
    });

    updateDisplay();
});
</script>


    </main>
    <footer>
     <div class="footer-wrappper footer-bg">
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo mb-25">
                                    <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>The automated process starts as soon as your clothes go into the machine.</p>
                                    </div>
                                </div>
                                <!-- social -->
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Our solutions</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Support</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Company</h4>
                                <ul>
                                    <li><a href="#">Design & creatives</a></li>
                                    <li><a href="#">Telecommunication</a></li>
                                    <li><a href="#">Restaurant</a></li>
                                    <li><a href="#">Programing</a></li>
                                    <li><a href="#">Architecture</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Footer End-->
      </div>
  </footer> 
  <!-- Scroll Up -->
  <div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->
<script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{ asset('js/wow.min.js') }}"></script>
<script src="{{ asset('js/animated.headline.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>

<!-- Date Picker -->
<script src="{{ asset('js/gijgo.min.js') }}"></script>
<!-- Nice-select, sticky -->
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<!-- Progress -->
<script src="{{ asset('js/jquery.barfiller.js') }}"></script>

<!-- counter , waypoint, Hover Direction -->
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/hover-direction-snake.min.js') }}"></script>

<!-- contact js -->
<script src="{{ asset('js/contact.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>


</body>
</html>