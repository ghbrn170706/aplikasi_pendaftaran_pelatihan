<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .otp-input {
            width: 3.5rem !important;
            height: 3.5rem;
            font-size: 1.5rem;
            text-align: center;
            margin-right: 0.75rem;
            border-radius: 0.5rem;
            border: 2px solid #e2e8f0;
            transition: all 0.3s;
        }
        
        .otp-input:last-child {
            margin-right: 0;
        }
        
        .otp-input:focus {
            border-color: #a777e3;
            box-shadow: 0 0 0 3px rgba(167, 119, 227, 0.2);
            outline: none;
        }
        
        .video-container {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }
        
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.3), transparent);
        }
        
        .video-content {
            position: relative;
            z-index: 10;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
            color: white;
        }
    </style>
</head>
<body class="h-screen bg-gray-100">
    <div class="flex h-full">
        <!-- Left side - OTP Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-6 bg-white">
            <div class="w-full max-w-md">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Verifikasi OTP Anda</h2>
                    <p class="text-gray-600">Kami telah mengirim kode OTP ke email Anda</p>
                </div>
                
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                        <p class="font-medium">Verifikasi gagal:</p>
                        <ul class="list-disc list-inside mt-1">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('verifyOtpPost') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Masukkan 6 Digit Kode OTP</label>
                        <div class="flex justify-between">
                            <input type="text" maxlength="1" class="otp-input" pattern="\d*" inputmode="numeric" required>
                            <input type="text" maxlength="1" class="otp-input" pattern="\d*" inputmode="numeric" required>
                            <input type="text" maxlength="1" class="otp-input" pattern="\d*" inputmode="numeric" required>
                            <input type="text" maxlength="1" class="otp-input" pattern="\d*" inputmode="numeric" required>
                            <input type="text" maxlength="1" class="otp-input" pattern="\d*" inputmode="numeric" required>
                            <input type="text" maxlength="1" class="otp-input" pattern="\d*" inputmode="numeric" required>
                        </div>
                        <input type="hidden" id="otp" name="otp">
                    </div>
                    
                    <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-medium rounded-lg shadow-md hover:shadow-lg transition duration-300">
                        Verifikasi OTP
                    </button>
                </form>
                
                <div class="text-center mt-6 text-sm text-gray-600">
                    Belum menerima kode? <a href="#" class="font-medium text-purple-600 hover:text-purple-500">Kirim ulang</a>
                </div>
            </div>
        </div>
        
        <!-- Right side - Full Height Video -->
        <div class="hidden md:block md:w-1/2">
            <div class="video-container">
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('videos/pelatihan.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="video-overlay"></div>
                <div class="video-content">
                    <h3 class="text-4xl font-bold mb-4">Verifikasi Akun Anda</h3>
                    <p class="text-xl opacity-90">Langkah terakhir untuk mengakses semua fitur kami</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to handle OTP input and combine values
        document.addEventListener('DOMContentLoaded', function() {
            const otpInputs = document.querySelectorAll('.otp-input');
            const otpField = document.getElementById('otp');
            
            otpInputs.forEach((input, index) => {
                // Only allow numbers
                input.addEventListener('input', (e) => {
                    e.target.value = e.target.value.replace(/[^0-9]/g, '');
                    
                    // Auto focus to next input
                    if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                        otpInputs[index + 1].focus();
                    }
                    
                    // Combine all OTP values
                    let otpValue = '';
                    otpInputs.forEach(input => {
                        otpValue += input.value;
                    });
                    otpField.value = otpValue;
                });
                
                // Handle backspace
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                        otpInputs[index - 1].focus();
                    }
                });
                
                // Paste OTP from clipboard
                input.addEventListener('paste', (e) => {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text').trim();
                    const pasteNumbers = pasteData.replace(/[^0-9]/g, '');
                    
                    if (pasteNumbers.length === 6) {
                        for (let i = 0; i < 6; i++) {
                            if (otpInputs[i]) {
                                otpInputs[i].value = pasteNumbers[i] || '';
                            }
                        }
                        otpField.value = pasteNumbers;
                        otpInputs[5].focus();
                    }
                });
            });
            
            // Auto-focus first input on load
            if (otpInputs[0]) {
                otpInputs[0].focus();
            }
        });
    </script>
</body>
</html>