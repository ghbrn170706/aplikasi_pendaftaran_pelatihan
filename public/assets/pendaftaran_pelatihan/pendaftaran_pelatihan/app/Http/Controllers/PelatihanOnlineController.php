<?php

namespace App\Http\Controllers;

use App\Models\PelatihanOnline;
use Illuminate\Http\Request;

class PelatihanOnlineController extends Controller
{
    // Menampilkan daftar pelatihan
    public function index()
    {
        $pelatihans_online = PelatihanOnline::all();

        return view('pelatihan_online.index', compact('pelatihans_online'));
    }

    // Menampilkan form untuk membuat pelatihan baru
    public function create()
    {
        return view('pelatihan_online.create');
    }

    // Menyimpan pelatihan baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date',
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'foto_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pelatihan = new PelatihanOnline;
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->jenis = $request->jenis;
        $pelatihan->jadwal_mulai = $request->jadwal_mulai;
        $pelatihan->jadwal_selesai = $request->jadwal_selesai;
        $pelatihan->kapasitas = $request->kapasitas;
        $pelatihan->harga = $request->harga;

        // Menyimpan foto pelatihan jika ada
        if ($request->hasFile('foto_pelatihan')) {
            $file = $request->file('foto_pelatihan');
            $filePath = $file->store('public/foto_pelatihan');
            $pelatihan->foto_pelatihan = $filePath;
        }

        $pelatihan->save();

        return redirect()->route('pelatihan_online.index')->with('success', 'Pelatihan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit pelatihan
    public function edit($id)
    {
        $pelatihan = PelatihanOnline::findOrFail($id);
        return view('pelatihan_online.edit', compact('pelatihan'));
    }

    // Mengupdate data pelatihan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'jenis' => 'required|string|max:100',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date',
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'foto_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pelatihan = PelatihanOnline::findOrFail($id);
        $pelatihan->nama_pelatihan = $request->nama_pelatihan;
        $pelatihan->jenis = $request->jenis;
        $pelatihan->jadwal_mulai = $request->jadwal_mulai;
        $pelatihan->jadwal_selesai = $request->jadwal_selesai;
        $pelatihan->kapasitas = $request->kapasitas;
        $pelatihan->harga = $request->harga;

        // Menyimpan foto pelatihan jika ada dan mengganti foto lama
        if ($request->hasFile('foto_pelatihan')) {
            $file = $request->file('foto_pelatihan');
            $filePath = $file->store('public/foto_pelatihan');
            $pelatihan->foto_pelatihan = $filePath;
        }

        $pelatihan->save();

        return redirect()->route('pelatihan_online.index')->with('success', 'Pelatihan berhasil diperbarui!');
    }

    // Menghapus pelatihan
    public function destroy($id)
    {
        $pelatihan = PelatihanOnline::findOrFail($id);
        $pelatihan->delete();

        return redirect()->route('pelatihan_online.index')->with('success', 'Pelatihan berhasil dihapus!');
    }
}
