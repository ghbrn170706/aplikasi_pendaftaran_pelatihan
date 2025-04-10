<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PelatihanOnlineController;
use App\Http\Controllers\PelatihanOfflineController;
use App\Http\Controllers\Admin\PembayaranAdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DokumentasiPelatihanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|--------------------------------------------------------------------------
*/

// **Halaman Utama**
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// **Autentikasi (Login & Register)**
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');

Route::post('/register', [RegisterController::class, 'register']);
Route::get('register/verify-otp/{email}', [RegisterController::class, 'verifyOtpForm'])->name('verifyOtp');
Route::post('register/verify-otp', [RegisterController::class, 'verifyOtp'])->name('verifyOtpPost');


// **Verifikasi Email**
Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/user/dashboard');
})->middleware('auth')->name('verification.verify');

// **Dashboard**
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Ganti 'dashboard' dengan nama view Anda
    })->name('dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

   


    // **Profile**
    Route::resource('profile', ProfileController::class);

    // **Pelatihan**
    Route::resource('/pelatihan_populer', PelatihanController::class);
    Route::resource('/pelatihan_online', PelatihanOnlineController::class);
    Route::resource('/pelatihan_offline', PelatihanOfflineController::class);

    // **Pembayaran**
    Route::resource('pembayaran', PembayaranController::class)->middleware('auth');
});

// **Rute untuk Pengguna yang Sudah Disetujui**
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
});

// **Pelatihan**
Route::resource('/pelatihan', PelatihanController::class);

// **Detail Pelatihan**
Route::get('/pelatihan/{id}', [PelatihanController::class, 'show'])->name('pelatihan.show');

// **Pendaftaran Pelatihan**
Route::get('/pelatihan/{id}/daftar', [PelatihanController::class, 'daftar'])->name('pelatihan.daftar');

// **Pembayaran**
Route::get('/pembayaran/create/{pelatihanID}', [PembayaranController::class, 'create'])->name('pembayaran.create');
Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

// **Dokumentasi Pelatihan**
Route::resource('/dokumentasi', DokumentasiPelatihanController::class);


// **Profil Pengguna**
Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');
});

// **Login Sosial Media**
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', function () {
    $user = Socialite::driver('google')->user();
    // Logika autentikasi pengguna
});

Route::get('/login/microsoft', [LoginController::class, 'redirectToMicrosoft'])->name('login.microsoft');
Route::get('/login/microsoft/callback', [LoginController::class, 'handleMicrosoftCallback']);

Route::get('/login/apple', [LoginController::class, 'redirectToApple'])->name('login.apple');
Route::get('/login/apple/callback', [LoginController::class, 'handleAppleCallback']);


Route::get('/pelatihan/{id}', [PelatihanController::class, 'show'])->name('pelatihan.show');
Route::post('/pelatihan/{id}/daftar', [PelatihanController::class, 'daftar'])->name('pelatihan.daftar');

Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
Route::post('/pembayaran/{id}/update', [PembayaranController::class, 'update'])->name('pembayaran.update');



// Route untuk admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/create/{pelatihanID}', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');

    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
  // Example of route definitions
Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
});



Route::middleware(['auth', 'isUser'])->group(function () {

    Route::get('/pembayaran/create/{pelatihanID}', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::get('/pembayaran/{id}', [PembayaranController::class, 'show'])->name('pembayaran.show');
    Route::put('/pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');
});
// Route untuk user
Route::post('/pembayaran', [PembayaranController::class, 'store'])
    ->middleware('auth')
    ->name('pembayaran.store');





    use App\Http\Controllers\PendapatAnggotaController;

Route::resource('pendapat_anggota', PendapatAnggotaController::class);

Route::get('/pendapat_anggota/{id}', [PendapatAnggotaController::class, 'show'])->name('pendapat_anggota.show');



use App\Http\Controllers\SertifikatController;

// Rute untuk halaman utama sertifikat
Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
Route::get('/sertifikat/{id}/send-email', [SertifikatController::class, 'sendEmail'])->name('sertifikat.sendEmail');

// Rute untuk membuat sertifikat baru
Route::get('/sertifikat/create', [SertifikatController::class, 'create'])->name('sertifikat.create');

// Rute untuk menyimpan data sertifikat
Route::post('/sertifikat', [SertifikatController::class, 'store'])->name('sertifikat.store');

// Rute untuk menghapus sertifikat
Route::delete('/sertifikat/{sertifikat}', [SertifikatController::class, 'destroy'])->name('sertifikat.destroy');

// Rute untuk mengunduh PDF
Route::get('/sertifikat/{id}/generate-pdf', [SertifikatController::class, 'generatePdf'])->name('sertifikat.generatePdf');



use App\Http\Controllers\KejuruanController;


Route::get('/kejuruan', [KejuruanController::class, 'index'])->name('kejuruan.index');
Route::get('/kejuruan/create', [KejuruanController::class, 'create'])->name('kejuruan.create');
Route::post('/kejuruan', [KejuruanController::class, 'store'])->name('kejuruan.store');
Route::get('/kejuruan/{kejuruanID}/edit', [KejuruanController::class, 'edit'])->name('kejuruan.edit');
Route::delete('/kejuruan/{kejuruanID}', [KejuruanController::class, 'destroy'])->name('kejuruan.destroy');
Route::put('/kejuruan/{id}', [KejuruanController::class, 'update'])->name('kejuruan.update');


use App\Http\Controllers\HistoryPelatihanController;

Route::resource('history_pelatihan', HistoryPelatihanController::class);


use App\Models\HistoryPelatihan;

Route::get('/get-pelatihan/{user_id}', function($user_id) {
    $pelatihan = HistoryPelatihan::where('user_id', $user_id)
                                 ->where('status', 'selesai')
                                 ->with('pelatihan')
                                 ->get();
    
    return response()->json($pelatihan->map(function($item) {
        return [
            'nama_pelatihan' => $item->pelatihan->nama_pelatihan,
            'status' => $item->status
        ];
    }));
});


use App\Http\Controllers\GuruPelatihanController;

Route::get('/guru_pelatihan', [GuruPelatihanController::class, 'index'])->name('guru_pelatihan.index');
Route::get('/guru_pelatihan/create', [GuruPelatihanController::class, 'create'])->name('guru_pelatihan.create');
Route::post('/guru_pelatihan', [GuruPelatihanController::class, 'store'])->name('guru_pelatihan.store');
Route::get('/guru_pelatihan/{id}', [GuruPelatihanController::class, 'show'])->name('guru_pelatihan.show');
Route::get('/guru_pelatihan/{id}/edit', [GuruPelatihanController::class, 'edit'])->name('guru_pelatihan.edit');
Route::put('/guru_pelatihan/{id}', [GuruPelatihanController::class, 'update'])->name('guru_pelatihan.update');
Route::delete('/guru_pelatihan/{id}', [GuruPelatihanController::class, 'destroy'])->name('guru_pelatihan.destroy');


