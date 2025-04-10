@extends('layouts.template')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="jumlah_bayar" class="block text-sm font-medium text-gray-700">Jumlah Bayar</label>
                <input type="number" name="jumlah_bayar" id="jumlah_bayar" step="0.01" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="bukti_bayar" class="block text-sm font-medium text-gray-700">Bukti Bayar</label>
                <input type="file" name="bukti_bayar" id="bukti_bayar" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition duration-300">Simpan</button>
        </form>

        <!-- Notification -->
        <div id="notification" class="notification">
            Pembayaran Anda sedang diproses. Jadwal pelatihan akan segera dikirim!
        </div>
    </div>

    <script>
        // JavaScript for notification and redirection
        document.getElementById('paymentForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent default form submission

            // Show notification
            const notification = document.getElementById('notification');
            notification.style.display = 'block';

            // Simulate form submission with a delay
            setTimeout(() => {
                // Hide notification after 3 seconds
                notification.style.display = 'none';

                // Redirect to dashboard or index page
                window.location.href = "{{ route('user.dashboard') }}"; // Replace with your dashboard route
            }, 3000);

            // Submit the form via AJAX (optional, if you want to handle it without page reload)
            fetch(this.action, {
                method: 'POST',
                body: new FormData(this),
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>


@endsection