<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class ProfilController extends Controller
{
    /**
     * Menampilkan halaman edit profil.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data profil berdasarkan user_id yang sedang login
        $profil = Profil::where('user_id', Auth::id())->first();

        // Tentukan rute dashboard berdasarkan peran pengguna
        $user = Auth::user();
        if ($user->role === 'admin') {
            $dashboardRoute = route('admin.dashboard');
        } else {
            $dashboardRoute = route('user.dashboard');
        }

        return view('profil.index', compact('profil', 'dashboardRoute'));
    }

    /**
     * Memperbarui data profil pengguna.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
        ]);

        // Temukan atau buat profil berdasarkan user_id
        $profil = Profil::updateOrCreate(
            ['user_id' => Auth::id()],
            ['nama' => $request->nama]
        );

        // Penanganan upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($profil->foto) {
                Storage::disk('public')->delete($profil->foto);
            }

            // Simpan foto baru
            $path = $request->file('foto')->store('profile_pictures', 'public');
            $profil->update(['foto' => $path]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}