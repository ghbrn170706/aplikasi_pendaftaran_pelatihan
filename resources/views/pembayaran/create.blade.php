<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Custom styles */
        .notification {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4caf50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .payment-icon {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            object-fit: contain;
        }
        .payment-group-option {
            padding-left: 25px;
            font-style: italic;
            color: #6b7280;
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Tambah Pembayaran</h1>
        <form id="paymentForm" action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Pelatihan</label>
                <p class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-gray-100">
                    {{ $pelatihan->nama_pelatihan ?? 'Pelatihan Tidak Tersedia' }}
                </p>
                <input type="hidden" name="pelatihanID" value="{{ $pelatihan->pelatihanID }}">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama User</label>
                <p class="mt-1 block w-full p-2 border border-gray-300 rounded-md bg-gray-100">
                    {{ $user->name ?? 'User Tidak Tersedia' }}
                </p>
                <input type="hidden" name="userID" value="{{ $user->id }}">
            </div>

            <div class="mb-4">
                <label for="tanggal_bayar" class="block text-sm font-medium text-gray-700">Tanggal Bayar</label>
                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ date('Y-m-d') }}">
            </div>
            <div class="mb-4">
                <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" step="0.01" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" value="{{ $pelatihan->harga }}" readonly>
            </div>
            
            <!-- Payment Method Dropdown -->
            <div class="mb-4">
                <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="">-- Pilih Metode Pembayaran --</option>
                    
                    <!-- Digital Wallets Group -->
                    <optgroup label="Dompet Digital">
                        <option value="Dana">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" alt="Dana" class="payment-icon">
                                Dana
                            </div>
                        </option>
                        <option value="OVO">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo.svg" alt="OVO" class="payment-icon">
                                OVO
                            </div>
                        </option>
                        <option value="Gopay">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" alt="Gopay" class="payment-icon">
                                GoPay
                            </div>
                        </option>
                        <option value="ShopeePay">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/45/ShopeePay_logo.svg" alt="ShopeePay" class="payment-icon">
                                ShopeePay
                            </div>
                        </option>
                        <option value="LinkAja">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/LinkAja_logo_2019.svg" alt="LinkAja" class="payment-icon">
                                LinkAja
                            </div>
                        </option>
                        <option value="QRIS">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/73/QRIS_logo.svg" alt="QRIS" class="payment-icon">
                                QRIS
                            </div>
                        </option>
                    </optgroup>
                    
                    <!-- Bank Transfers Group -->
                    <optgroup label="Transfer Bank">
                        <option value="BCA">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/BCA_logo.svg" alt="BCA" class="payment-icon">
                                BCA
                            </div>
                        </option>
                        <option value="Mandiri">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" alt="Mandiri" class="payment-icon">
                                Mandiri
                            </div>
                        </option>
                        <option value="BRI">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9b/Logo_BRI_%28Bank_Rakyat_Indonesia%29.svg" alt="BRI" class="payment-icon">
                                BRI
                            </div>
                        </option>
                        <option value="BNI">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/55/BNI_logo.svg" alt="BNI" class="payment-icon">
                                BNI
                            </div>
                        </option>
                        <option value="BSI">
                            <div class="flex items-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5f/Logo_Bank_Syariah_Indonesia_%282021%29.svg" alt="BSI" class="payment-icon">
                                BSI
                            </div>
                        </option>
                    </optgroup>
                </select>
            </div>

            <div class="mb-4">
                <label for="bukti_bayar" class="block text-sm font-medium text-gray-700">Bukti Bayar</label>
                <input type="file" name="bukti_bayar" id="bukti_bayar" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-300">Simpan</button>
        </form>

        <!-- Notification -->
        <div id="notification" class="notification">
            Pembayaran Anda sedang diproses. Jadwal pelatihan akan segera dikirim!
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
        });

        // JavaScript for notification and redirection
        document.getElementById('paymentForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Validate payment method selected
            if (!document.getElementById('metode_pembayaran').value) {
                alert('Silakan pilih metode pembayaran terlebih dahulu');
                return;
            }

            // Show notification
            const notification = document.getElementById('notification');
            notification.style.display = 'block';

            // Simulate form submission with a delay
            setTimeout(() => {
                // Hide notification after 3 seconds
                notification.style.display = 'none';

                // Submit the form
                this.submit();
            }, 3000);
        });
    </script>
</body>
</html>