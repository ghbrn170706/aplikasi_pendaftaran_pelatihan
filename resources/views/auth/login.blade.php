<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        
        .social-btn {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
        }
        
        .password-toggle:hover {
            color: #4b5563;
        }
    </style>
</head>
<body class="h-screen">
    <div class="flex h-full">
        <!-- Left side - Login Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 bg-white">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Masuk ke Akun Anda</h2>
                    <p class="text-gray-600">Silakan masuk menggunakan email dan password</p>
                </div>
                
                <!-- Error Message -->
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                        <p class="font-medium">Gagal masuk:</p>
                        <ul class="list-disc list-inside mt-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf
                    
                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                    </div>
                    
                    <!-- Password Input with Toggle -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <div class="relative">
                            <input id="password" name="password" type="password" required autocomplete="current-password"
                                class="w-full px-4 py-3 pr-10 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                            <span class="password-toggle" id="togglePassword">
                                <i class="far fa-eye"></i>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" 
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                Ingat saya
                            </label>
                        </div>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">
                                Lupa password?
                            </a>
                        @endif
                    </div>
                    
                    <!-- Login Button -->
                    <button type="submit" 
                        class="w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-blue-400 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        Masuk
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">atau masuk dengan</span>
                    </div>
                </div>

                <!-- Social Login Buttons -->
                <div class="space-y-3">
                    <button type="button" onclick="window.location.href='{{ route('login.google') }}'"
                        class="social-btn w-full py-2 px-4 bg-white text-gray-700 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-50">
                        <i class="fab fa-google text-red-500"></i>
                        <span>Google</span>
                    </button>
                    
                    <button type="button" onclick="window.location.href='{{ route('login.microsoft') }}'"
                        class="social-btn w-full py-2 px-4 bg-white text-gray-700 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-50">
                        <i class="fab fa-windows text-blue-500"></i>
                        <span>Microsoft</span>
                    </button>
                    
                    <button type="button" onclick="window.location.href='{{ route('login.apple') }}'"
                        class="social-btn w-full py-2 px-4 bg-white text-gray-700 rounded-lg flex items-center justify-center gap-2 hover:bg-gray-50">
                        <i class="fab fa-apple text-gray-900"></i>
                        <span>Apple</span>
                    </button>
                </div>

                <!-- Register Link -->
                <p class="mt-6 text-center text-sm text-gray-600">
                    Belum memiliki akun? 
                    <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Daftar disini
                    </a>
                </p>
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
                    <h3 class="text-4xl font-bold mb-4">Selamat Datang Kembali</h3>
                    <p class="text-xl opacity-90">Masuk untuk melanjutkan ke dashboard Anda</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggle
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the eye icon
            this.querySelector('i').classList.toggle('fa-eye');
            this.querySelector('i').classList.toggle('fa-eye-slash');
        });
        
        // Add red border to password field if there's an error
        document.addEventListener('DOMContentLoaded', function() {
            @if($errors->has('password'))
                document.getElementById('password').classList.add('border-red-500');
            @endif
            
            @if($errors->has('email'))
                document.getElementById('email').classList.add('border-red-500');
            @endif
        });
    </script>
</body>
</html>