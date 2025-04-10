<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        label {
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        input[type="text"]:focus {
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
            background: rgba(255, 255, 255, 0.2);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(255, 75, 140, 0.5);
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        .footer a {
            color: #ff7eb3;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verifikasi OTP Anda</h2>
        <form method="POST" action="{{ route('verifyOtpPost') }}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <label for="otp">Masukkan Kode OTP</label>
            <input type="text" id="otp" name="otp" placeholder="Contoh: 123456" required>
            <button type="submit">Verifikasi OTP</button>
        </form>
        <div class="footer">
            Belum menerima kode? <a href="#">Kirim ulang</a>
        </div>
    </div>
</body>
</html>