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
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DokumentasiPelatihanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PendapatAnggotaController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\KejuruanController;
use App\Http\Controllers\HistoryPelatihanController;
use App\Http\Controllers\GuruPelatihanController;
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

// **Public Routes**
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Authentication Routes
Route::controller(AuthenticatedSessionController::class)->group(function() {
    Route::get('/login', 'create')->name('login');
    Route::post('/login', 'store');
    Route::post('/logout', 'destroy')->middleware('auth')->name('logout');
});

Route::controller(RegisterController::class)->group(function() {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::get('register/verify-otp/{email}', 'verifyOtpForm')->name('verifyOtp');
    Route::post('register/verify-otp', 'verifyOtp')->name('verifyOtpPost');
});

// Email Verification
Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/user/dashboard');
})->middleware('auth')->name('verification.verify');

// Socialite Routes
Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

Route::get('/login/google/callback', function () {
    $user = Socialite::driver('google')->user();
    // Authentication logic
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login/microsoft', 'redirectToMicrosoft')->name('login.microsoft');
    Route::get('/login/microsoft/callback', 'handleMicrosoftCallback');
    Route::get('/login/apple', 'redirectToApple')->name('login.apple');
    Route::get('/login/apple/callback', 'handleAppleCallback');
});

// Pelatihan Routes (Public)
Route::controller(PelatihanController::class)->group(function() {
    Route::get('/pelatihan', 'index')->name('pelatihan.index');
    Route::get('/pelatihan/{id}', 'show')->name('pelatihan.show');
});

// **Authenticated Routes**
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Routes
    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'index')->name('profile.index');
        Route::get('/profile/create', 'create')->name('profile.create');
        Route::resource('profile', ProfileController::class)->except(['index', 'create']);
    });

    Route::controller(ProfilController::class)->group(function() {
        Route::get('/profil', 'index')->name('profil.index');
        Route::post('/profil/update', 'update')->name('profil.update');
    });

    // Pelatihan Registration
    Route::post('/pelatihan/{id}/daftar', [PelatihanController::class, 'daftar'])->name('pelatihan.daftar');

    // Pembayaran Routes
    Route::controller(PembayaranController::class)->group(function() {
        Route::get('/pembayaran/create/{pelatihanID}', 'create')->name('pembayaran.create');
        Route::post('/pembayaran', 'store')->name('pembayaran.store');
        Route::get('/pembayaran/{id}', 'show')->name('pembayaran.show');
    });

    // Dokumentasi Pelatihan
    Route::resource('/dokumentasi', DokumentasiPelatihanController::class);

    // Sertifikat Routes
    Route::controller(SertifikatController::class)->group(function() {
        Route::get('/sertifikat', 'index')->name('sertifikat.index');
        Route::get('/sertifikat/{id}/send-email', 'sendEmail')->name('sertifikat.sendEmail');
        Route::get('/sertifikat/create', 'create')->name('sertifikat.create');
        Route::post('/sertifikat', 'store')->name('sertifikat.store');
        Route::delete('/sertifikat/{sertifikat}', 'destroy')->name('sertifikat.destroy');
        Route::get('/sertifikat/{id}/generate-pdf', 'generatePdf')->name('sertifikat.generatePdf');
    });

    // History Pelatihan
    Route::resource('history_pelatihan', HistoryPelatihanController::class);
    Route::get('/get-pelatihan/{user_id}', function($user_id) {
        $pelatihan = \App\Models\HistoryPelatihan::where('user_id', $user_id)
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

    // Pendapat Anggota
    Route::resource('pendapat_anggota', PendapatAnggotaController::class);
    Route::get('/pendapat_anggota/{id}', [PendapatAnggotaController::class, 'show'])->name('pendapat_anggota.show');
});

// **Admin Routes**
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
  // Route untuk memilih metode pembayaran
  Route::get('/pembayaran/choose-method/{pelatihanID}', [PembayaranController::class, 'chooseMethod'])
  ->name('pembayaran.choose.method');
    // Pelatihan Management
    Route::resource('/pelatihan_populer', PelatihanController::class);
    Route::resource('/pelatihan_online', PelatihanOnlineController::class);
    Route::resource('/pelatihan_offline', PelatihanOfflineController::class);
    Route::get('/pelatihan_populer/{pelatihan_populer}', [PelatihanController::class, 'show'])->name('pelatihan_populer.show');
    // Pembayaran Management
    Route::controller(PembayaranController::class)->group(function() {
        Route::get('/pembayaran', 'index')->name('pembayaran.index');
        Route::get('/pembayaran/{id}/edit', 'edit')->name('pembayaran.edit');
        Route::put('/pembayaran/{id}', 'update')->name('pembayaran.update');
        Route::delete('/pembayaran/{id}', 'destroy')->name('pembayaran.destroy');
    });

    // Kejuruan Management
    Route::controller(KejuruanController::class)->group(function() {
        Route::get('/kejuruan', 'index')->name('kejuruan.index');
        Route::get('/kejuruan/create', 'create')->name('kejuruan.create');
        Route::post('/kejuruan', 'store')->name('kejuruan.store');
        Route::get('/kejuruan/{kejuruanID}/edit', 'edit')->name('kejuruan.edit');
        Route::delete('/kejuruan/{kejuruanID}', 'destroy')->name('kejuruan.destroy');
        Route::put('/kejuruan/{id}', 'update')->name('kejuruan.update');
    });

    // Guru Pelatihan Management
    Route::controller(GuruPelatihanController::class)->group(function() {
        Route::get('/guru_pelatihan', 'index')->name('guru_pelatihan.index');
        Route::get('/guru_pelatihan/create', 'create')->name('guru_pelatihan.create');
        Route::post('/guru_pelatihan', 'store')->name('guru_pelatihan.store');
        Route::get('/guru_pelatihan/{id}', 'show')->name('guru_pelatihan.show');
        Route::get('/guru_pelatihan/{id}/edit', 'edit')->name('guru_pelatihan.edit');
        Route::put('/guru_pelatihan/{id}', 'update')->name('guru_pelatihan.update');
        Route::delete('/guru_pelatihan/{id}', 'destroy')->name('guru_pelatihan.destroy');
    });
});

// **User Routes**
Route::middleware(['auth', 'isUser'])->group(function () {
    // User-specific routes if needed
});



Route::get('/pembayaran-history', [PembayaranController::class, 'history'])->name('pembayaran.history');
