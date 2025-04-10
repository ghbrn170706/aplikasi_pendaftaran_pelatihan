<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerificationMail;

class RegisterController extends Controller
{
    // Menampilkan halaman register
    public function showRegistrationForm(Request $request)
    {
        // Jika ada ID pelatihan di query string, simpan ke session
        if ($request->has('pelatihan')) {
            session(['pelatihanID' => $request->pelatihan]);
        }
    
        return view('auth.register');
    }

    // Proses pendaftaran dengan OTP
    public function register(Request $request)
    {
        // Validasi input pengguna
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Membuat pengguna baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'user',
        ]);
    
        // Membuat OTP dan menyimpannya di user
        $otp = rand(100000, 999999);  // OTP acak 6 digit
        $user->otp = $otp;
        $user->otp_expired_at = now()->addMinutes(10);  // OTP kedaluwarsa setelah 10 menit
        $user->save();
    
        // Kirim OTP ke email pengguna
        Mail::to($user->email)->send(new OtpVerificationMail($otp));
    
        // Arahkan ke halaman verifikasi OTP
        return redirect()->route('verifyOtp', ['email' => $user->email])
                         ->with('otp_sent', 'OTP telah dikirimkan ke email Anda!');
    }

    // Menampilkan form verifikasi OTP
    public function verifyOtpForm($email)
    {
        return view('auth.verifyOtp', ['email' => $email]);
    }

    // Verifikasi OTP yang dimasukkan
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'Pengguna tidak ditemukan.']);
        }

        // Memeriksa apakah OTP sesuai dan belum kadaluarsa
        if ($user->otp === $request->otp && now()->lt($user->otp_expired_at)) {
            // Menandai OTP sebagai terverifikasi
            $user->otp_verified = true;
            $user->save();

            return redirect()->route('login')->with('message', 'OTP berhasil diverifikasi, Anda dapat login sekarang!');
        }

        return back()->withErrors(['otp' => 'OTP tidak valid atau sudah kedaluwarsa.']);
    }
}
