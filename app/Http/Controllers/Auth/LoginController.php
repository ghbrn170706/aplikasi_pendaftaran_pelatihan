<?php

namespace App\Http\Controllers\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm(Request $request)
    {
        // Jika ada ID pelatihan di query string, simpan ke session
        if ($request->has('pelatihan')) {
            session(['pelatihanID' => $request->pelatihan]);
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($user->status !== 'disetujui') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Akun Anda belum disetujui oleh admin.');
        }

        // Coba melakukan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek apakah ada pelatihan yang dipilih untuk pembayaran
            $pelatihanID = session('pelatihanID'); // Ambil ID pelatihan dari session

            if ($pelatihanID) {
                // Hapus session pelatihanID setelah digunakan
                session()->forget('pelatihanID');
                return redirect()->route('pembayaran.create', $pelatihanID);
            }

            // Jika tidak ada pelatihan yang dipilih, arahkan ke dashboard
            return redirect()->route('dashboard')->with('message', 'Selamat datang kembali!');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }


    public function redirectToMicrosoft()
{
    return Socialite::driver('microsoft')->redirect();
}

public function handleMicrosoftCallback()
{
    try {
        $user = Socialite::driver('microsoft')->user();

        // Find or create the user in your database
        $existingUser = User::where('email', $user->getEmail())->first();
        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt(Str::random(16)), // Generate a random password
            ]);
            Auth::login($newUser);
        }

        return redirect()->route('dashboard');
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Microsoft login failed.');
    }
}

public function redirectToApple()
{
    return Socialite::driver('apple')->redirect();
}

public function handleAppleCallback()
{
    try {
        $user = Socialite::driver('apple')->user();

        // Find or create the user in your database
        $existingUser = User::where('email', $user->getEmail())->first();
        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt(Str::random(16)), // Generate a random password
            ]);
            Auth::login($newUser);
        }

        return redirect()->route('dashboard');
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Apple login failed.');
    }
}
}