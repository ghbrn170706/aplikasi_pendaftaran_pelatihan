<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\GuruPelatihan;
use Illuminate\Http\Request;

class GuruPelatihanController extends Controller
{
    /**
     * Menampilkan semua data guru pelatihan.
     */
    public function index()
    {
        $guruPelatihan = GuruPelatihan::all();
        return view('guru_pelatihan.index', compact('guruPelatihan'));
    }

    /**
     * Menampilkan halaman form untuk menambahkan data baru.
     */
    public function create()
    {
        return view('guru_pelatihan.create');
    }

    /**
     * Menyimpan data guru pelatihan baru.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'deskripsi_perjalanan_hidup' => 'required|string',
            'spesialisasi_guru' => 'required|string|max:255',
        ]);
    
        // Tangani unggahan gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('guru_pelatihan', 'public'); // Simpan di folder public/guru_pelatihan
            $validatedData['gambar'] = $gambarPath; // Simpan path ke database
        }
    
        // Simpan data ke database
        GuruPelatihan::create($validatedData);
    
        return redirect()->route('guru_pelatihan.index')->with('success', 'Data guru pelatihan berhasil disimpan.');
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Maksimal 2MB
            'nama' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'deskripsi_perjalanan_hidup' => 'required|string',
            'spesialisasi_guru' => 'required|string|max:255',
        ]);
    
        // Cari data berdasarkan ID
        $guruPelatihan = GuruPelatihan::find($id);
    
        if (!$guruPelatihan) {
            return redirect()->route('guru_pelatihan.index')->with('error', 'Data guru pelatihan tidak ditemukan.');
        }
    
        // Tangani unggahan gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($guruPelatihan->gambar) {
                Storage::disk('public')->delete($guruPelatihan->gambar);
            }
    
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('guru_pelatihan', 'public');
            $validatedData['gambar'] = $gambarPath;
        }
    
        // Perbarui data
        $guruPelatihan->update($validatedData);
    
        return redirect()->route('guru_pelatihan.index')->with('success', 'Data guru pelatihan berhasil diperbarui.');
    }

    /**
     * Menampilkan detail data guru pelatihan berdasarkan ID.
     */
    public function show($id)
    {
        $guruPelatihan = GuruPelatihan::find($id);

        if (!$guruPelatihan) {
            return redirect()->route('guru_pelatihan.index')->with('error', 'Data guru pelatihan tidak ditemukan.');
        }

        return view('guru_pelatihan.show', compact('guruPelatihan'));
    }

    /**
     * Menampilkan halaman form untuk mengedit data.
     */
    public function edit($id)
    {
        $guruPelatihan = GuruPelatihan::find($id);
    
        if (!$guruPelatihan) {
            return redirect()->route('guru-pelatihan.index')->with('error', 'Data guru pelatihan tidak ditemukan.');
        }
    
        return view('guru_pelatihan.edit', compact('guruPelatihan'));
    }

    /**
     * Memperbarui data guru pelatihan berdasarkan ID.
     */
   

    /**
     * Menghapus data guru pelatihan berdasarkan ID.
     */
    public function destroy($id)
    {
        $guruPelatihan = GuruPelatihan::find($id);

        if (!$guruPelatihan) {
            return redirect()->route('guru_pelatihan.index')->with('error', 'Data guru pelatihan tidak ditemukan.');
        }

        // Hapus data
        $guruPelatihan->delete();

        return redirect()->route('guru_pelatihan.index')->with('success', 'Data guru pelatihan berhasil dihapus.');
    }
}