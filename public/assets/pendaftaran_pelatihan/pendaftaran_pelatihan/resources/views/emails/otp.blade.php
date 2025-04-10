<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f9;">
    <table align="center" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
        <tr>
            <td style="background: linear-gradient(135deg, #6e8efb, #a777e3); color: white; text-align: center; padding: 20px;">
                <h1 style="font-size: 24px; margin: 0;">Verifikasi OTP Anda</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px; text-align: center; color: #333333;">
                <p style="font-size: 16px; line-height: 1.5; margin-bottom: 20px;">
                    Halo! Berikut adalah kode OTP Anda untuk verifikasi akun:
                </p>
                <h2 style="font-size: 28px; font-weight: bold; color: #6e8efb; margin-bottom: 20px;">{{ $otp }}</h2>
                <p style="font-size: 14px; color: #666666; margin-bottom: 20px;">
                    Kode ini hanya berlaku selama 5 menit. Jangan bagikan kode ini kepada siapa pun.
                </p>
                <a href="#" style="display: inline-block; padding: 12px 24px; font-size: 16px; color: white; background: linear-gradient(135deg, #ff7eb3, #ff758c); text-decoration: none; border-radius: 8px; transition: transform 0.3s ease;">
                    Verifikasi Sekarang
                </a>
                <p style="font-size: 14px; color: #666666; margin-top: 20px;">
                    Jika Anda tidak meminta OTP ini, abaikan email ini.
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; padding: 20px; background-color: #f4f4f9; color: #666666; font-size: 12px;">
                &copy; 2023 Your Company. All rights reserved.
            </td>
        </tr>
    </table>
</body>
</html>