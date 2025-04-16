<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        success: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    animation: {
                        'bounce-slow': 'bounce-slow 2s infinite',
                        'float': 'float 3s ease-in-out infinite',
                        'confetti-fall': 'confetti-fall 5s linear forwards',
                    },
                    keyframes: {
                        'bounce-slow': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        'float': {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        'confetti-fall': {
                            '0%': { transform: 'translateY(-100vh) rotate(0deg)', opacity: '1' },
                            '100%': { transform: 'translateY(100vh) rotate(360deg)', opacity: '0' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .payment-select option {
            padding: 8px 12px;
        }
        
        .payment-select optgroup {
            padding: 8px 0;
        }
        
        .payment-select optgroup::before {
            content: "";
            display: block;
            height: 1px;
            background-color: #e5e7eb;
            margin: 8px 0;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .payment-icon {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            object-fit: contain;
        }
        
        .payment-option {
            display: flex;
            align-items: center;
            padding: 8px 12px;
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #f00;
            opacity: 0;
        }
        
        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #22c55e;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }
        
        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: 0 0 0 rgba(34, 197, 94, 0.4);
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }
        
        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }
        
        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }
        
        @keyframes scale {
            0%, 100% {
                transform: none;
            }
            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }
        
        @keyframes fill {
            100% {
                box-shadow: inset 0 0 0 100px #22c55e;
            }
        }
        
        .wave {
            animation: wave 1.5s linear infinite;
        }
        
        @keyframes wave {
            0% { transform: rotate(0deg); }
            10% { transform: rotate(14deg); }
            20% { transform: rotate(-8deg); }
            30% { transform: rotate(14deg); }
            40% { transform: rotate(-4deg); }
            50% { transform: rotate(10deg); }
            60% { transform: rotate(0deg); }
            100% { transform: rotate(0deg); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-primary-600 p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold">Konfirmasi Pembayaran</h1>
                            <p class="text-primary-100 mt-1">Selesaikan pembayaran untuk mengikuti pelatihan</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Form Content -->
                <form id="paymentForm" action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                    @csrf
                    
                    <!-- Course Info -->
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                            <div class="bg-primary-100 text-primary-600 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-500 text-sm">Pelatihan</h3>
                                <p class="font-semibold">{{ $pelatihan->nama_pelatihan ?? 'Pelatihan Tidak Tersedia' }}</p>
                                <input type="hidden" name="pelatihanID" value="{{ $pelatihan->pelatihanID }}">
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                            <div class="bg-primary-100 text-primary-600 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-500 text-sm">Peserta</h3>
                                <p class="font-semibold">{{ $user->name ?? 'User Tidak Tersedia' }}</p>
                                <input type="hidden" name="userID" value="{{ $user->id }}">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Details -->
                    <div class="space-y-4">
                        <div>
                            <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Bayar</label>
                            <div class="relative">
                                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" value="{{ date('Y-m-d') }}">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Bayar</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">Rp</span>
                                </div>
                                <input type="number" name="jumlah_bayar" id="jumlah_bayar" step="0.01" class="w-full pl-10 p-3 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-primary-500 focus:border-primary-500" value="{{ $pelatihan->harga }}" readonly>
                            </div>
                        </div>
                        
                        <!-- Payment Method -->
                        <div>
                            <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                            <select name="metode_pembayaran" id="metode_pembayaran" class="payment-select w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500" required>
                                <option value="">-- Pilih Metode Pembayaran --</option>
                                
                                <!-- Digital Wallets Group -->
                                <optgroup label="Dompet Digital" class="py-2">
                                    <option value="Dana" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="Dana" class="payment-icon">
                                        Dana
                                    </option>
                                    <option value="OVO" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo.svg" alt="OVO" class="payment-icon">
                                        OVO
                                    </option>
                                    <option value="Gopay" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" alt="Gopay" class="payment-icon">
                                        GoPay
                                    </option>
                                    <option value="ShopeePay" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/4/45/ShopeePay_logo.svg" alt="ShopeePay" class="payment-icon">
                                        ShopeePay
                                    </option>
                                    <option value="LinkAja" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/LinkAja_logo_2019.svg" alt="LinkAja" class="payment-icon">
                                        LinkAja
                                    </option>
                                    <option value="QRIS" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/73/QRIS_logo.svg" alt="QRIS" class="payment-icon">
                                        QRIS
                                    </option>
                                </optgroup>
                                
                                <!-- Bank Transfers Group -->
                                <optgroup label="Transfer Bank" class="py-2">
                                    <option value="BCA" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/BCA_logo.svg" alt="BCA" class="payment-icon">
                                        BCA
                                    </option>
                                    <option value="Mandiri" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri" class="payment-icon">
                                        Mandiri
                                    </option>
                                    <option value="BRI" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/9/9b/Logo_BRI_%28Bank_Rakyat_Indonesia%29.svg" alt="BRI" class="payment-icon">
                                        BRI
                                    </option>
                                    <option value="BNI" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/BNI_logo.svg" alt="BNI" class="payment-icon">
                                        BNI
                                    </option>
                                    <option value="BSI" class="payment-option">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Logo_Bank_Syariah_Indonesia_%282021%29.svg" alt="BSI" class="payment-icon">
                                        BSI
                                    </option>
                                </optgroup>
                            </select>
                        </div>
                        
                        <!-- Payment Proof -->
                        <div>
                            <label for="bukti_bayar" class="block text-sm font-medium text-gray-700 mb-1">Bukti Bayar</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="bukti_bayar" class="relative cursor-pointer bg-white rounded-md font-medium text-primary-600 hover:text-primary-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-primary-500">
                                            <span>Upload file</span>
                                            <input id="bukti_bayar" name="bukti_bayar" type="file" class="sr-only" required>
                                        </label>
                                        <p class="pl-1">atau drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, PDF maksimal 5MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-primary-600 text-white py-3 px-4 rounded-lg hover:bg-primary-700 transition duration-300 flex items-center justify-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>Konfirmasi Pembayaran</span>
                    </button>
                </form>
            </div>
            
            <div class="mt-4 text-center text-sm text-gray-500">
                <p>Pastikan data yang Anda masukkan sudah benar sebelum mengkonfirmasi</p>
            </div>
        </div>
    </div>

    <!-- Success Notification -->
    <div id="successNotification" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-xl p-6 max-w-sm w-full mx-4 animate-fade-in relative overflow-hidden">
            <!-- Confetti elements -->
            <div id="confettiContainer" class="absolute inset-0 overflow-hidden"></div>
            
            <div class="relative z-10">
                <!-- Animated checkmark -->
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
                
                <h3 class="text-2xl font-bold text-center text-gray-900 mt-4">Pembayaran Berhasil!</h3>
                <p class="mt-2 text-gray-600 text-center">Terima kasih telah melakukan pembayaran untuk pelatihan:</p>
                <p class="font-semibold text-center text-primary-600">{{ $pelatihan->nama_pelatihan ?? 'Pelatihan' }}</p>
                
                <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <div class="bg-success-100 text-success-600 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Jumlah Bayar</p>
                            <p class="font-bold">Rp {{ number_format($pelatihan->harga, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-3 flex items-center space-x-3">
                        <div class="bg-gray-100 text-gray-600 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700">Tanggal Pembayaran</p>
                            <p class="font-bold">{{ date('d F Y') }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 p-4 bg-blue-50 rounded-lg flex items-start">
                    <div class="mr-3 text-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 wave" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-blue-700">
                            <span class="font-semibold">Jadwal pelatihan</span> akan dikirim ke email Anda dalam waktu 1x24 jam. 
                            Mohon periksa folder spam jika email tidak ditemukan.
                        </p>
                    </div>
                </div>
                
                <button id="closeSuccess" class="w-full mt-6 bg-success-600 text-white py-3 px-4 rounded-lg hover:bg-success-700 transition duration-300">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Processing Notification -->
    <div id="processingNotification" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="bg-white rounded-xl p-6 max-w-sm w-full mx-4 animate-fade-in">
            <div class="flex justify-center mb-4">
                <div class="animate-bounce-slow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-lg font-medium text-center text-gray-900">Memproses Pembayaran...</h3>
            <p class="mt-2 text-sm text-gray-500 text-center">Mohon tunggu sebentar, kami sedang memverifikasi pembayaran Anda.</p>
            <div class="mt-6">
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div id="progressBar" class="bg-primary-600 h-2.5 rounded-full" style="width: 0%"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set the payment method from URL parameter or localStorage
        document.addEventListener('DOMContentLoaded', function() {
            // Get payment method from URL parameter
            const urlParams = new URLSearchParams(window.location.search);
            let paymentMethod = urlParams.get('method');
            
            // If not in URL, check localStorage
            if (!paymentMethod) {
                paymentMethod = localStorage.getItem('selectedPaymentMethod');
            }
            
            // Set the selected payment method if exists
            if (paymentMethod) {
                document.getElementById('metode_pembayaran').value = paymentMethod;
            }
            
            // Clear the stored payment method after use
            localStorage.removeItem('selectedPaymentMethod');
            
            // Format the amount input
            const amountInput = document.getElementById('jumlah_bayar');
            if (amountInput) {
                amountInput.addEventListener('focus', function() {
                    this.readOnly = true;
                });
            }
            
            // Close success notification
            document.getElementById('closeSuccess').addEventListener('click', function() {
                document.getElementById('successNotification').classList.add('hidden');
            });
        });

        // Create confetti effect
        function createConfetti() {
            const container = document.getElementById('confettiContainer');
            const colors = ['#ef4444', '#f59e0b', '#10b981', '#3b82f6', '#8b5cf6', '#ec4899'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = Math.random() * 10 + 5 + 'px';
                confetti.style.animationDelay = Math.random() * 5 + 's';
                confetti.style.animationDuration = Math.random() * 3 + 2 + 's';
                container.appendChild(confetti);
            }
        }

        // JavaScript for notification and redirection
        document.getElementById('paymentForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Validate payment method selected
            if (!document.getElementById('metode_pembayaran').value) {
                alert('Silakan pilih metode pembayaran terlebih dahulu');
                return;
            }

            // Show processing notification
            const processingNotification = document.getElementById('processingNotification');
            processingNotification.classList.remove('hidden');
            
            // Animate progress bar
            let width = 0;
            const progressBar = document.getElementById('progressBar');
            const interval = setInterval(() => {
                if (width >= 100) {
                    clearInterval(interval);
                    
                    // Hide processing and show success
                    processingNotification.classList.add('hidden');
                    
                    // Create confetti and show success
                    createConfetti();
                    document.getElementById('successNotification').classList.remove('hidden');
                    
                    // Submit the form after showing success
                    setTimeout(() => {
                        this.submit();
                    }, 3000);
                } else {
                    width += 5;
                    progressBar.style.width = width + '%';
                }
            }, 100);
        });
    </script>
</body>
</html>