<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Review SkillForge - {{ $pendapat->nama_anggota }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#4F46E5',
            secondary: '#10B981',
            dark: '#1F2937',
            light: '#F9FAFB'
          }
        }
      }
    }
  </script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">

  <!-- Navigation -->
  <header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <img src="https://storage.googleapis.com/a1aa/image/DamTWGgZujCeqxF2ZSkgfgvFOK36dAhcFiTmM7fKo4E.jpg" 
             alt="SkillForge Logo" 
             class="h-10 w-auto" />
        <span class="text-xl font-bold text-primary hidden md:inline">SkillForge</span>
      </div>
      
      <nav class="hidden md:flex space-x-6">
        <a href="#" class="text-gray-600 hover:text-primary font-medium transition-colors duration-200">Panduan Lengkap</a>
        <a href="#" class="text-gray-600 hover:text-primary font-medium transition-colors duration-200">Tips Karir & Kuliah</a>
        <a href="#" class="text-gray-600 hover:text-primary font-medium transition-colors duration-200">Istilah & Tutorial</a>
        <a href="#" class="text-gray-600 hover:text-primary font-medium transition-colors duration-200">Rangkuman Buku</a>
      </nav>
      
      <div class="flex items-center space-x-4">
        <button class="p-2 text-gray-600 hover:text-primary rounded-full hover:bg-gray-100 transition-colors duration-200">
          <i class="fas fa-search"></i>
        </button>
        <button class="hidden md:block bg-primary text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors duration-200">
          Daftar Sekarang
        </button>
        <button class="md:hidden p-2 text-gray-600 hover:text-primary">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <div class="bg-gradient-to-r from-primary to-indigo-600 text-white py-12">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-3xl md:text-4xl font-bold mb-4">Kisah Sukses Alumni</h1>
      <p class="text-lg md:text-xl max-w-3xl mx-auto opacity-90">
        Temukan bagaimana SkillForge membantu {{ $pendapat->nama_anggota }} mencapai {{ $pendapat->gols }} dalam karir mereka
      </p>
    </div>
  </div>

  <!-- Main Content -->
  <main class="container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
      <!-- Review Content -->
      <article class="flex-1 bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Review Header -->
        <div class="p-6 border-b">
          <div class="flex items-center justify-between mb-4">
            <div>
              <h2 class="text-2xl font-bold text-gray-800">{{ $pendapat->nama_anggota }}</h2>
              <p class="text-gray-600">{{ $pendapat->pekerjaan ?? 'Profesional' }}</p>
            </div>
            <div class="flex items-center space-x-1 text-yellow-400">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <span class="text-gray-600 ml-1">4.7</span>
            </div>
          </div>
          
          <div class="flex flex-wrap gap-2">
            <span class="px-3 py-1 bg-blue-100 text-primary text-sm rounded-full">#{{ $pendapat->bidang ?? 'Digital Marketing' }}</span>
            <span class="px-3 py-1 bg-green-100 text-secondary text-sm rounded-full">#{{ $pendapat->gols }}</span>
            <span class="px-3 py-1 bg-purple-100 text-purple-600 text-sm rounded-full">#AlumniSukses</span>
          </div>
        </div>
        
        <!-- Featured Image -->
        <div class="relative h-80 overflow-hidden">
          <img src="{{ $pendapat->foto ? asset('storage/' . $pendapat->foto) : 'https://storage.googleapis.com/a1aa/image/2YLc-T_uDzDmKD5Uoj4FR8wAgiK-k0trE-pXFKWFER0.jpg' }}"
               alt="{{ $pendapat->nama_anggota }}"
               class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
          <div class="absolute bottom-0 left-0 p-6 text-white">
            <h3 class="text-xl font-bold">"{{ $pendapat->testimoni ?? 'SkillForge mengubah karir saya secara signifikan' }}"</h3>
          </div>
        </div>
        
        <!-- Review Body -->
        <div class="p-6">
          <div class="prose max-w-none">
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Perjalanan Karir</h3>
            <p class="text-gray-700 mb-6 leading-relaxed">
              {{ $pendapat->perjalanan_karir ?? 'Belum tersedia informasi perjalanan karir.' }}
            </p>
            
            <div class="bg-blue-50 border-l-4 border-primary p-4 mb-6">
              <h4 class="font-bold text-gray-800 mb-2">Pencapaian Setelah Belajar di SkillForge:</h4>
              <ul class="list-disc pl-5 space-y-1 text-gray-700">
                <li>Mencapai {{ $pendapat->gols ?? 'target karir' }} dalam waktu singkat</li>
                <li>Meningkatkan skill utama sebesar 80%</li>
                <li>Memperluas jaringan profesional secara signifikan</li>
              </ul>
            </div>
            
            <h3 class="text-xl font-semibold text-gray-800 mb-3">Pengalaman Belajar</h3>
            <p class="text-gray-700 mb-4 leading-relaxed">
              {{ $pendapat->pengalaman_belajar ?? 'Pengalaman belajar yang transformatif dengan mentor berpengalaman.' }}
            </p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
              <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center mb-2">
                  <div class="p-2 bg-primary/10 text-primary rounded-full mr-3">
                    <i class="fas fa-chalkboard-teacher"></i>
                  </div>
                  <h4 class="font-semibold">Metode Pembelajaran</h4>
                </div>
                <p class="text-gray-600 text-sm">Kombinasi video, studi kasus, dan project-based learning</p>
              </div>
              <div class="bg-gray-50 p-4 rounded-lg">
                <div class="flex items-center mb-2">
                  <div class="p-2 bg-green-100 text-secondary rounded-full mr-3">
                    <i class="fas fa-user-tie"></i>
                  </div>
                  <h4 class="font-semibold">Dukungan Mentor</h4>
                </div>
                <p class="text-gray-600 text-sm">Feedback personal dan bimbingan karir</p>
              </div>
            </div>
          </div>
        </div>
      </article>
      
      <!-- Sidebar -->
      <aside class="w-full lg:w-80 space-y-6">
        <!-- CTA Box -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="bg-primary text-white p-4 text-center">
            <h3 class="font-bold text-lg">Mulai Perjalanan Belajarmu</h3>
          </div>
          <div class="p-4">
            <p class="text-gray-700 mb-4">Bergabung dengan ribuan profesional yang telah mengubah karir mereka</p>
            <button class="w-full bg-secondary hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
              Daftar Sekarang
            </button>
          </div>
        </div>
        
        <!-- Related Articles -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="border-b p-4">
            <h3 class="font-bold text-gray-800">Artikel Terkait</h3>
          </div>
          <div class="divide-y">
            @php
              $sidebar = [
                ["img" => "bvZDqy2KxUVp65HzQPFyjKffUC4BntJhjH6Brzkl6Qo", "title" => "Panduan Lengkap Akuntansi, Pajak & ..."],
                ["img" => "jVAOxIuCW-c0HJXC9e4YFGhiRpM8mA_kLJasRVpKKjk", "title" => "Sales & Business Development: Penger..."],
                ["img" => "ARyAH_OXAPG3gpG3Ifdmis4-a1pqmQXwwFM8ZtprY6U", "title" => "Panduan Lengkap Graphic Designer: Defini..."],
                ["img" => "ZVOPPqL1Uv9kzRv2rqMksUmHsHDvCVs0XRtJvI4SVvg", "title" => "Product Management: Definisi, Metode, To..."],
                ["img" => "_tXThlr5EE18s6RDC3ZGxD1dzAMiHGaiS9d1wKIb4Vw", "title" => "Software Engineering: Pengertian, Cara K..."],
              ];
            @endphp

            @foreach ($sidebar as $item)
              <a href="#" class="block p-4 hover:bg-gray-50 transition-colors duration-200 group">
                <div class="flex items-center space-x-4">
                  <div class="flex-shrink-0 relative">
                    <img src="https://storage.googleapis.com/a1aa/image/{{ $item['img'] }}.jpg" 
                         alt="{{ $item['title'] }}" 
                         class="w-16 h-16 object-cover rounded-lg group-hover:opacity-90 transition-opacity duration-200" />
                    <div class="absolute inset-0 bg-black/20 rounded-lg group-hover:bg-transparent transition-colors duration-200"></div>
                  </div>
                  <div>
                    <h4 class="font-medium text-gray-800 group-hover:text-primary transition-colors duration-200 line-clamp-2">
                      {{ $item['title'] }}
                    </h4>
                    <span class="text-xs text-gray-500 mt-1 inline-block">Baca selengkapnya →</span>
                  </div>
                </div>
              </a>
            @endforeach
          </div>
        </div>
        
        <!-- Testimonial Carousel -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
          <div class="border-b p-4">
            <h3 class="font-bold text-gray-800">Testimonial Lainnya</h3>
          </div>
          <div class="p-4">
            <div class="relative">
              <div class="absolute inset-0 flex items-center justify-between z-10">
                <button class="p-2 bg-white rounded-full shadow-md -ml-4 text-primary hover:bg-gray-100">
                  <i class="fas fa-chevron-left"></i>
                </button>
                <button class="p-2 bg-white rounded-full shadow-md -mr-4 text-primary hover:bg-gray-100">
                  <i class="fas fa-chevron-right"></i>
                </button>
              </div>
              <div class="bg-gray-50 p-6 rounded-lg">
                <div class="flex items-center mb-4">
                  <img src="https://randomuser.me/api/portraits/women/43.jpg" 
                       alt="Testimonial" 
                       class="w-12 h-12 rounded-full object-cover mr-3" />
                  <div>
                    <h4 class="font-medium">Sarah Wijaya</h4>
                    <p class="text-sm text-gray-600">UI/UX Designer</p>
                  </div>
                </div>
                <p class="text-gray-700 italic">"Belajar di SkillForge membantu saya mendapatkan pekerjaan impian di perusahaan teknologi ternama."</p>
                <div class="flex mt-3 text-yellow-400 text-sm">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-dark text-gray-300 py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <img src="https://storage.googleapis.com/a1aa/image/DamTWGgZujCeqxF2ZSkgfgvFOK36dAhcFiTmM7fKo4E.jpg" 
               alt="SkillForge Logo" 
               class="h-8 mb-4" />
          <p class="text-gray-400 text-sm">Platform pembelajaran online terbaik untuk meningkatkan skill profesional Anda.</p>
        </div>
        <div>
          <h4 class="text-white font-medium mb-4">Perusahaan</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm">Tentang Kami</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm">Karir</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm">Blog</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-white font-medium mb-4">Produk</h4>
          <ul class="space-y-2">
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm">Kelas Online</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm">Bootcamp</a></li>
            <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-200 text-sm">Mentorship</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-white font-medium mb-4">Hubungi Kami</h4>
          <div class="flex space-x-4 mb-4">
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-gray-400 hover:text-white transition-colors duration-200">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
          <p class="text-gray-400 text-sm">hello@skillforge.id</p>
          <p class="text-gray-400 text-sm">+62 123 4567 890</p>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-500 text-sm">
        © 2026 SkillForge. All rights reserved.
      </div>
    </div>
  </footer>

</body>
</html>