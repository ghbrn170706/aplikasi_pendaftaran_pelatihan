<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .video-container {
            border-radius: 0;
            overflow: hidden;
            height: 100vh;
        }
        
        .video-container video {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="h-screen">
    <div class="flex h-full">
        <!-- Left side - Registration Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 bg-white">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-600">Isi form berikut untuk mendaftar</p>
                </div>
                
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf
                    
                    <!-- Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    </div>
                    
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    </div>
                    
                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" name="password" type="password" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    </div>
                    
                    <!-- Confirm Password Input -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    </div>
                    
                    <!-- Success Message -->
                    @if(session('message'))
                        <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <!-- OTP Message -->
                    @if(session('otp_sent'))
                        <div class="p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded">
                            OTP telah dikirim ke email Anda. Silakan masukkan OTP untuk melanjutkan.
                        </div>
                    @endif
                    
                    <!-- Register Button -->
                    <button type="submit" 
                        class="w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        Daftar
                    </button>
                    
                    <!-- Login Link -->
                    <div class="text-center mt-4">
                        <p class="text-sm text-gray-600">
                            Sudah memiliki akun?
                            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                                Masuk disini
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Right side - Full Height Video -->
        <div class="hidden md:block md:w-1/2 relative">
            <div class="video-container">
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('videos/pelatihan.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-30"></div>
            <div class="absolute inset-0 flex items-center justify-center p-12">
                <div class="text-white text-center">
                    <h3 class="text-4xl font-bold mb-4">Bergabunglah Dengan Kami</h3>
                    <p class="text-xl opacity-90">Mulai perjalanan Anda bersama kami hari ini</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>