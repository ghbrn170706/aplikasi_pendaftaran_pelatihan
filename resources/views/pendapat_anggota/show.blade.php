<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Review  SkillForge</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body class="bg-white text-black font-sans">

  <!-- Header -->
  <header class="border-b">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <img src="https://storage.googleapis.com/a1aa/image/DamTWGgZujCeqxF2ZSkgfgvFOK36dAhcFiTmM7fKo4E.jpg" alt="MySkill Logo" class="h-8" width="100" height="50" />
      <nav class="space-x-4">
        <a href="#" class="text-gray-700 hover:text-black">PANDUAN LENGKAP</a>
        <a href="#" class="text-gray-700 hover:text-black">TIPS KARIR &amp; KULIAH</a>
        <a href="#" class="text-gray-700 hover:text-black">ISTILAH &amp; TUTORIAL</a>
        <a href="#" class="text-gray-700 hover:text-black">RANGKUMAN BUKU</a>
        <a href="#" class="text-gray-700 hover:text-black"> SkillForge</a>
      </nav>
      <div class="flex items-center space-x-4">
        <i class="fas fa-search text-gray-700"></i>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto px-6 py-8">
    <h1 class="text-2xl font-bold mb-4">
      Review  SkillForge: {{ $pendapat->nama_anggota }},{{ $pendapat->gols }} Berkat Belajar di SkillForge
    </h1>

    <div class="flex flex-col lg:flex-row">
      <!-- Review Section -->
      <div class="flex-1">
        <img src="{{ $pendapat->foto ? asset('storage/' . $pendapat->foto) : 'https://storage.googleapis.com/a1aa/image/2YLc-T_uDzDmKD5Uoj4FR8wAgiK-k0trE-pXFKWFER0.jpg' }}"
             alt="{{ $pendapat->nama_anggota }}"
             class="w-full mb-4" width="600" height="400" />

        <p class="text-gray-700 text-sm">
          Review  SkillForge: {{ $pendapat->nama_anggota }}, {{ $pendapat->gols }} Berkat Belajar di SkillForge
        </p>


        <p class="text-gray-700 text-sm mt-4">
  <strong>Perjalanan Karir:</strong> {{ $pendapat->perjalanan_karir ?? 'Belum tersedia.' }}
</p>

      </div>

      <!-- Sidebar -->
      <aside class="w-full lg:w-1/3 lg:pl-8 mt-8 lg:mt-0">
        <ul class="space-y-4">
          <!-- isi sidebar tetap sama seperti sebelumnya -->
          @php
            $sidebar = [
              ["img" => "bvZDqy2KxUVp65HzQPFyjKffUC4BntJhjH6Brzkl6Qo", "title" => "Panduan Lengkap Akuntansi, Pajak & ..."],
              ["img" => "jVAOxIuCW-c0HJXC9e4YFGhiRpM8mA_kLJasRVpKKjk", "title" => "Sales & Business Development: Penger..."],
              ["img" => "ARyAH_OXAPG3gpG3Ifdmis4-a1pqmQXwwFM8ZtprY6U", "title" => "Panduan Lengkap Graphic Designer: Defini..."],
              ["img" => "ZVOPPqL1Uv9kzRv2rqMksUmHsHDvCVs0XRtJvI4SVvg", "title" => "Product Management: Definisi, Metode, To..."],
              ["img" => "_tXThlr5EE18s6RDC3ZGxD1dzAMiHGaiS9d1wKIb4Vw", "title" => "Software Engineering: Pengertian, Cara K..."],
              ["img" => "4jE330w1z-qM6y1PiRf5WZUDL5AeK6EsmgQMjKlhLjw", "title" => "Panduan Lengkap Human Resource Developmen..."],
              ["img" => "WaZ-WHxo5QWLV6xVQd5e541GbxYr6yQH95pHp7TDYqE", "title" => "Panduan Lengkap Bahasa Inggris dan Beasi..."],
              ["img" => "lj9jmfXw9Z9ZHDyd8zH3rfPfiXNZ5Rp9OUrsIXSdgCQ", "title" => "Panduan Lengkap UI-UX Design: Pengertian..."],
            ];
          @endphp

          @foreach ($sidebar as $item)
            <li class="flex items-center space-x-4">
              <img src="https://storage.googleapis.com/a1aa/image/{{ $item['img'] }}.jpg" alt="{{ $item['title'] }}" class="w-16 h-16 object-cover" />
              <a href="#" class="text-gray-700 hover:text-black">{{ $item['title'] }}</a>
            </li>
          @endforeach
        </ul>
      </aside>
    </div>
  </main>

  <!-- Footer -->
  <footer class="border-t py-4">
    <div class="container mx-auto text-center text-gray-700 text-sm">
      © 2026 PelatihanUtama. All rights reserved.
    </div>
  </footer>

</body>
</html>
