<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $profiles = Profile::all(); // Admin melihat semua profil
        } else {
            $profiles = Profile::where('user_id', Auth::id())->get(); // User hanya melihat profilnya
        }

        return view('profile.index', compact('profiles'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin' && Profile::where('user_id', Auth::id())->exists()) {
            return redirect()->route('profile.index')->with('error', 'Anda sudah memiliki profil.');
        }

        return view('profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'nik' => 'required|string|unique:profiles,nik',
            'email' => 'required|email|unique:profiles,email',
            'nomor_hp' => 'required|string',
            'provinsi' => 'required|string',
            'kabupaten' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'pekerjaan' => 'required|in:bekerja,tidak bekerja,mahasiswa',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $gambarPath = $request->file('gambar') 
            ? $request->file('gambar')->store('profile_images', 'public') 
            : null;
    
        Profile::create([
            'user_id' => Auth::id(),
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nik' => $request->nik,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'pekerjaan' => strtolower($request->pekerjaan),
            'gambar' => $gambarPath,
        ]);
    
        // Ambil pelatihanID dari session atau request
        $pelatihanID = session('pembayaranID'); // atau $request->input('pelatihanID')
    
        // Validasi: pastikan pelatihanID tersedia
        if (!$pelatihanID) {
            return redirect()->route('profile.index')->with('error', 'ID pelatihan tidak ditemukan.');
        }
    
        // Redirect ke route pembayaran dengan parameter yang benar
        return redirect()->route('pembayaran.create', ['pelatihanID' => $pelatihanID])
            ->with('success', 'Profil berhasil dibuat! Silakan selesaikan pembayaran.');
    }
    

    public function show($id)
    {
        $profile = Profile::where('profileID', $id)->firstOrFail();
    
        if (Auth::user()->role !== 'admin' && $profile->user_id !== Auth::id()) {
            return redirect()->route('profile.index')->with('error', 'Anda tidak memiliki akses untuk melihat profil ini.');
        }
    
        return view('profile.show', compact('profile'));
    }
    
    public function edit($id)
    {
        $profile = Profile::where('profileID', $id)->firstOrFail();
    
        if (Auth::user()->role !== 'admin' && $profile->user_id !== Auth::id()) {
            return redirect()->route('profile.index')->with('error', 'Anda tidak memiliki akses untuk mengedit profil ini.');
        }
    
        return view('profile.edit', compact('profile'));
    }
    
    public function update(Request $request, $id)
{
    $profile = Profile::where('profileID', $id)->firstOrFail();

    // Cek otorisasi
    if (Auth::user()->role !== 'admin' && $profile->user_id !== Auth::id()) {
        return redirect()->route('profile.index')->with('error', 'Anda tidak memiliki akses untuk mengedit profil ini.');
    }

    // Validasi data input
    $request->validate([
        'nama' => 'required|string|max:255',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tanggal_lahir' => 'required|date',
        'nik' => 'required|string|max:20|unique:profiles,nik,' . $profile->profileID . ',profileID',
        'nomor_hp' => 'required|string|max:20',
        'provinsi' => 'required|string',
        'kabupaten' => 'required|string',
        'kecamatan' => 'required|string',
        'desa' => 'required|string',
        'pekerjaan' => 'required|in:bekerja,tidak bekerja,mahasiswa',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Persiapkan data untuk update
    $data = $request->except(['_token', '_method', 'gambar']);

    // Proses gambar jika diunggah
    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        if ($profile->gambar) {
            Storage::delete('public/' . $profile->gambar);
        }
        
        // Simpan gambar baru
        $data['gambar'] = $request->file('gambar')->store('profile_images', 'public');
    }

    // Update data
    $profile->update($data);

    return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
}
    
    public function destroy($id)
    {
        $profile = Profile::where('profileID', $id)->firstOrFail();
    
        if (Auth::user()->role !== 'admin' && $profile->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus profil ini.');
        }
    
        if ($profile->gambar) {
            Storage::delete('public/' . $profile->gambar);
        }
    
        $profile->delete();
    
        return redirect()->route('profile.index')->with('success', 'Data berhasil dihapus.');
    }
    
}
