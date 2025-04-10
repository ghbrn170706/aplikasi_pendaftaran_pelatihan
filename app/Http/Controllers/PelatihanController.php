<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use App\Models\Pembayaran;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PelatihanController extends Controller
{
    /**
     * Menampilkan daftar pelatihan.
     */
    public function index()
    {
        $pelatihans_populer = Pelatihan::all();
        return view('pelatihan_populer.index', compact('pelatihans_populer'));
    }
    

    /**
     * Menampilkan form untuk menambahkan pelatihan baru.
     */
    public function create()
    {
        return view('pelatihan_populer.create');
    }

    /**
     * Menyimpan data pelatihan yang baru dibuat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'jenis' => 'required|in:online,offline',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after_or_equal:jadwal_mulai',
            'kapasitas' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'lokasi' => 'nullable|string|max:255',
            'link_zoom' => 'nullable|url',
            'foto_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sertifikat' => 'required|string',
            'level' => 'required|string',
            'kategori' => 'required|string',
            'sub_judul' => 'required|string'
        ]);

        $fotoPelatihan = $request->file('foto_pelatihan') ? $request->file('foto_pelatihan')->store('pelatihan', 'public') : null;
        $gambarPelatihan = $request->file('gambar_pelatihan') ? $request->file('gambar_pelatihan')->store('pelatihan', 'public') : null;

        Pelatihan::create([
            'nama_pelatihan' => $request->nama_pelatihan,
            'deskripsi' => $request->deskripsi,
            'jenis' => $request->jenis,
            'jadwal_mulai' => $request->jadwal_mulai,
            'jadwal_selesai' => $request->jadwal_selesai,
            'lokasi' => $request->lokasi,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'link_zoom' => $request->link_zoom,
            'foto_pelatihan' => $fotoPelatihan,
            'gambar_pelatihan' => $gambarPelatihan,
            'sertifikat' => $request->sertifikat,
            'level' => $request->level,
            'kategori' => $request->kategori,
            'sub_judul' => $request->sub_judul,
        ]);

        return redirect()->route('pelatihan_populer.index')->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pelatihan tertentu.
     */
    public function show($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        return view('pelatihan_populer.show', compact('pelatihan'));
    }

    /**
     * Menampilkan form untuk mengedit data pelatihan.
     */
    public function edit($id)
    {
        $pelatihans_populer = Pelatihan::findOrFail($id);
        return view('pelatihan_populer.edit', compact('pelatihans_populer'));
    }

    /**
     * Mengupdate data pelatihan yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        // Mengambil data pelatihan berdasarkan ID
        $pelatihans_populer = Pelatihan::findOrFail($id);
    
        // Validasi input
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required',
            'jenis' => 'required|in:online,offline',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after_or_equal:jadwal_mulai',
            'kapasitas' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'lokasi' => 'nullable|string|max:255',
            'link_zoom' => 'nullable|url',
            'foto_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gambar_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sertifikat' => 'required|string',
            'level' => 'required|string',
            'kategori' => 'required|string',
            'sub_judul' => 'required|string'
        ]);
    
        // Update foto pelatihan jika ada file baru diupload
        if ($request->hasFile('foto_pelatihan')) {
            // Hapus foto lama jika ada
            Storage::delete('public/' . $pelatihans_populer->foto_pelatihan);
            // Simpan foto baru
            $pelatihans_populer->foto_pelatihan = $request->file('foto_pelatihan')->store('pelatihan', 'public');
        }
    
        // Update gambar pelatihan jika ada file baru diupload
        if ($request->hasFile('gambar_pelatihan')) {
            // Hapus gambar lama jika ada
            Storage::delete('public/' . $pelatihans_populer->gambar_pelatihan);
            // Simpan gambar baru
            $pelatihans_populer->gambar_pelatihan = $request->file('gambar_pelatihan')->store('pelatihan', 'public');
        }
    
        // Update data pelatihan
        $pelatihans_populer->update($request->except(['foto_pelatihan', 'gambar_pelatihan']));
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pelatihan_populer.index')->with('success', 'Pelatihan berhasil diperbarui.');
    }

    /**
     * Menghapus data pelatihan.
     */
    public function destroy($id)
    {
        $pelatihan = Pelatihan::findOrFail($id);
        Storage::delete('public/' . $pelatihan->foto_pelatihan);
        Storage::delete('public/' . $pelatihan->gambar_pelatihan);
        $pelatihan->delete();

        return redirect()->route('pelatihan_populer.index')->with('success', 'Pelatihan berhasil dihapus.');
    }

    public function daftar(Request $request, $id)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    
        // Cek apakah pengguna sudah memiliki profil
        $profile = Profile::where('user_id', Auth::id())->first();
        if (!$profile) {
            // Simpan data pendaftaran ke tabel pembayaran
            $pelatihan = Pelatihan::findOrFail($id);
            $pembayaran = new Pembayaran();
            $pembayaran->pelatihanID = $pelatihan->pelatihanID;
            $pembayaran->userID = Auth::user()->id;
            $pembayaran->tanggal_bayar = now();
            $pembayaran->jumlah_bayar = $pelatihan->harga;
            $pembayaran->status = 'pending';
            $pembayaran->save();
    
            // Simpan pembayaranID ke session
            session(['pembayaranID' => $pembayaran->pembayaranID]);
    
            // Redirect ke halaman pembuatan profil
            return redirect()->route('profile.create')->with('error', 'Anda harus membuat profil terlebih dahulu sebelum mendaftar pelatihan.');
        }
    
        // Jika pengguna sudah memiliki profil, lanjutkan proses pendaftaran
        $pelatihan = Pelatihan::findOrFail($id);
    
        // Simpan data pendaftaran ke tabel pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->pelatihanID = $pelatihan->pelatihanID;
        $pembayaran->userID = Auth::user()->id;
        $pembayaran->tanggal_bayar = now();
        $pembayaran->jumlah_bayar = $pelatihan->harga;
        $pembayaran->status = 'pending';
        $pembayaran->save();
    
        // Redirect ke halaman pembayaran
        return redirect()->route('pembayaran.create', $pembayaran->pembayaranID)->with('success', 'Silakan selesaikan pembayaran.');
    }
}
