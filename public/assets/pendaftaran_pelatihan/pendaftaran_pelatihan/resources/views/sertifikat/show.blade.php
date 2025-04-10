<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat {{ $sertifikat->nama }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@700&display=swap" rel="stylesheet">
    <style>
        /* Mengatur ukuran kertas A5 landscape */
        @page {
            size: A5 landscape;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 0;
            margin: 0;
            width: 210mm; /* Lebar A5 landscape */
            height: 148mm; /* Tinggi A5 landscape */
            box-sizing: border-box;
            position: relative;
        }

        .certificate {
            position: relative;
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-size: cover; /* Gambar akan menutupi seluruh area */
            background-position: center; /* Gambar akan berada di tengah */
            background-repeat: no-repeat; /* Mencegah gambar diulang */
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            max-width: 100px; /* Sesuaikan ukuran logo */
        }

        .content {
            margin-top: 60px; /* Beri ruang untuk logo di atas */
        }

        h1 {
            font-family: 'Great Vibes', cursive; /* Gunakan font Great Vibes */
            font-size: 60px; /* Ukuran font besar */
            font-weight: normal; /* Tidak perlu bold untuk font ini */
            color: #000; /* Warna teks */
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Efek shadow */
            letter-spacing: 2px; /* Jarak antar huruf */
        }

        p {
            font-size: 18px; /* Disesuaikan untuk A5 landscape */
            margin: 5px 0;
            color: #000; /* Pastikan teks terlihat jelas */
        }

        h2 {
            font-size: 28px; /* Disesuaikan untuk A5 landscape */
            margin: 10px 0;
            color: #000; /* Pastikan teks terlihat jelas */
        }

        h3 {
            font-size: 22px; /* Disesuaikan untuk A5 landscape */
            margin: 10px 0;
            color: #000; /* Pastikan teks terlihat jelas */
        }

        .footer {
            position: absolute;
            bottom: 20px;
            right: 20px;
            text-align: right;
        }

        .signature img {
            max-width: 150px; /* Sesuaikan ukuran tanda tangan */
        }
    </style>
</head>
<body>
    <div class="certificate">
        <!-- Background Image -->
        @if ($backgroundImage)
        <div class="background" style="background-image: url('{{ $backgroundImage }}');"></div>
        @endif

        <!-- Logo di sebelah kiri atas -->
        @if ($sertifikat->logo_penyelenggara)
            <div class="logo">
                <img src="{{ storage_path('app/public/' . $sertifikat->logo_penyelenggara) }}" alt="Logo Penyelenggara">
            </div>
        @endif

        <div class="content">
            <h1>SERTIFIKAT</h1>
            <h3>PENGHARGAAN</h3>
            <p>Diberikan kepada:</p>
            <h2>{{ $sertifikat->nama }}</h2>
            <h4>PESERTA</h4>
            <p>Telah berhasil menyelesaikan pelatihan:</p>
            <h3>{{ $sertifikat->pelatihan }}</h3>
            <p>Pada tanggal: {{ $sertifikat->tanggal->format('d-m-Y') }}</p>
        </div>

        <!-- Footer dengan tanda tangan di sebelah kanan bawah -->
        <div class="footer">
            @if ($sertifikat->tanda_tangan_ketua)
                <div class="signature">
                    <img src="{{ storage_path('app/public/' . $sertifikat->tanda_tangan_ketua) }}" alt="Tanda Tangan Ketua">
                    <p>{{ $sertifikat->nama_penyelenggara }}</p>
                    <p>{{ $sertifikat->peran }}</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>