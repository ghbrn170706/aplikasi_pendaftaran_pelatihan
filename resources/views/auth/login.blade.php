<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f4f7fc;
        }
        .container {
            padding-top: 50px;
        }
        .col-md-6 {
            padding: 20px;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .form-container {
            background-color: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 40px;
        }
        .btn-custom {
            background-color: #4e73df;
            color: white;
            border-radius: 20px;
            width: 100%;
            padding: 12px;
            border: none;
            font-weight: bold;
        }
        .btn-custom:hover {
            background-color: #2e59d9;
            color: white;
        }
        .text-muted {
            color: #6c757d;
        }
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border-radius: 20px;
            width: 100%;
            padding: 12px;
            border: none;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: capitalize;
        }
        .btn-google {
            background-color: #dd4b39;
            color: white;
        }
        .btn-microsoft {
            background-color: #2f2f2f;
            color: white;
        }
        .btn-apple {
            background-color: #000000;
            color: white;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #ccc;
        }
        .divider span {
            margin: 0 10px;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <!-- Left Column (Image) -->
        <div class="col-md-6 text-center">
            <video class="img-fluid" autoplay loop muted>
                <source src="{{ asset('videos/vidio1.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- Right Column (Login Form) -->
        <div class="col-md-6">
            <div class="form-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <!-- Remember Me -->
                    <div class="mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <div class="d-flex flex-column align-items-center mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-muted text-sm mb-2" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                        <x-button class="btn-custom">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="divider">
                    <span>or</span>
                </div>

                <!-- Social Login Buttons -->
                <div class="d-flex flex-column align-items-center">
                    <button type="button" class="social-btn btn-google">
                        <i class="fab fa-google"></i> Continue with Google
                    </button>
                    <button type="button" class="social-btn btn-microsoft">
                        <i class="fab fa-windows"></i> Continue with Microsoft Account
                    </button>
                    <button type="button" class="social-btn btn-apple">
                        <i class="fab fa-apple"></i> Continue with Apple
                    </button>
                </div>

                <!-- Link Register -->
                <p class="mt-3 text-muted text-center">
                    {{ __('Belum memiliki akun?') }} 
                    <a href="{{ route('register') }}" class="text-primary fw-bold">{{ __('Register di sini') }}</a>
                </p>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('.btn-google').addEventListener('click', function() {
            // Redirect to Google login
            window.location.href = '{{ route('login.google') }}';
        });
        document.querySelector('.btn-microsoft').addEventListener('click', function() {
            // Redirect to Microsoft login
            window.location.href = '{{ route('login.microsoft') }}';
        });
        document.querySelector('.btn-apple').addEventListener('click', function() {
            // Redirect to Apple login
            window.location.href = '{{ route('login.apple') }}';
        });
    </script>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>