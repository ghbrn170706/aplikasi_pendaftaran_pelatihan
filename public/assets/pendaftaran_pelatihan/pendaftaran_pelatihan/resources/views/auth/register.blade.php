<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .alert {
            margin-top: 20px;
            padding: 10px;
            background-color: #e9f7ef;
            border: 1px solid #d4edda;
            color: #155724;
            border-radius: 5px;
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
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <!-- Left Column (Image) -->
        <div class="col-md-6 text-center">
    <video class="img-fluid" autoplay loop muted>
        <source src="{{ asset('videos/vidio2.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>


        <!-- Right Column (Register Form) -->
        <div class="col-md-6">
            <div class="form-container">
            <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-label for="name" :value="__('Name')" />
        <x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-label for="email" :value="__('Email')" />
        <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-label for="password" :value="__('Password')" />
        <x-input id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-input id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required />
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Pesan Verifikasi OTP -->
    @if(session('otp_sent'))
        <div class="alert alert-info mt-3">
            OTP telah dikirim ke email Anda. Silakan masukkan OTP untuk melanjutkan.
        </div>
    @endif

    <div class="d-flex justify-content-between mt-4">
        <a class="text-muted text-sm" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-button class="btn-custom">
            {{ __('Register') }}
        </x-button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
