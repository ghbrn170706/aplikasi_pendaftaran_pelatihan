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
            display: flex;
            flex-direction: column;
            align-items: center; /* Konten di tengah */
            padding: 20px;
        }
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px; /* Posisi di pojok kiri atas */
            width: 80px; /* Lebar kotak logo */
            height: 80px; /* Tinggi kotak logo */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff; /* Warna latar belakang kotak */
            border: 1px solid #ccc; /* Border tipis */
            border-radius: 5px; /* Sudut melengkung */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }
        .logo {
            max-width: 60px; /* Ukuran logo disesuaikan */
            max-height: 60px;
        }
        .content {
            margin-top: 60px;
        }
        h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 60px;
            font-weight: normal;
            color: #000;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 2px;
        }
        p {
            font-size: 18px;
            margin: 5px 0;
            color: #000;
        }
        h2 {
            font-size: 28px;
            margin: 10px 0;
            color: #000;
        }
        h3 {
            font-size: 22px;
            margin: 10px 0;
            color: #000;
        }
        .footer {
            position: absolute;
            bottom: 20px;
            right: 20px;
            text-align: center; /* Teks di tengah */
        }
        .signature {
            display: flex;
            flex-direction: column;
            align-items: center; /* Tanda tangan dan teks di tengah */
        }
        .signature img {
            max-width: 120px; /* Ukuran tanda tangan disesuaikan */
        }
        .signature p {
            margin: 5px 0; /* Jarak antara teks */
        }
        .signature-line {
            width: 150px; /* Lebar garis */
            height: 2px; /* Ketebalan garis */
            background-color: #000; /* Warna garis */
            margin-top: 5px; /* Jarak dari tanda tangan (dikurangi) */
        }
        .controls {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 10;
        }
        .controls button {
            padding: 5px 10px;
            font-size: 12px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <!-- Background Image -->
        @if ($backgroundImage)
        <div id="background" class="background" style="background-image: url('{{ $backgroundImage }}');"></div>
        @endif

        <!-- Logo di sebelah kiri atas -->
        @if ($sertifikat->logo_penyelenggara)
            <div class="logo-container">
                <img class="logo" src="{{ storage_path('app/public/' . $sertifikat->logo_penyelenggara) }}" alt="Logo Penyelenggara">
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
                    <!-- Garis Hitam di Bawah Tanda Tangan -->
                    <div class="signature-line"></div>
                    <p style="margin-top: 5px;">{{ $sertifikat->nama_penyelenggara }}</p>
                    <p style="margin-bottom: 5px;">{{ $sertifikat->peran }}</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>