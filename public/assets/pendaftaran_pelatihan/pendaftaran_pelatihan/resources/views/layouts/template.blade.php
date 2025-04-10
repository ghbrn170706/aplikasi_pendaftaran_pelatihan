<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
     main {
      flex: 1; /* Mengisi sisa ruang di bawah navbar */
      display: flex;
      position: relative;
      top:40px;
      justify-content: center; /* Pusatkan secara horizontal */
      align-items: center; /* Pusatkan secara vertikal */
      padding: 11px;
    }

    .content {
    
      text-align: center; /* Opsi tambahan jika ingin teks juga berada di tengah */
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="page-flex" >
    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="main-wrapper ml-0 md:ml-64 transition-all duration-300">
      <!-- Navbar -->
      @include('layouts.navbar')

      <!-- Content -->
      <main class="p-11">
        @yield('content')
      </main>
    </div>
  </div>

  <!-- JavaScript for Toggle Menu -->
  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.querySelector('.sidebar');
    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });
  </script>
</body>
</html>