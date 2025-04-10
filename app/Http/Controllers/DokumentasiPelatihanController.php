<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiPelatihanController extends Controller
{
    // Show all documentation
    public function index()
    {
        $dokumentasi = DokumentasiPelatihan::all();
        return view('dokumentasi.index', compact('dokumentasi'));
    }

    // Show the form to create a new documentation
    public function create()
    {
        return view('dokumentasi.create');
    }

    // Store a new documentation
    public function store(Request $request)
    {
        $request->validate([
            'judul_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/dokumentasi', $imageName);
        }

        DokumentasiPelatihan::create([
            'judul_pelatihan' => $request->judul_pelatihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi Pelatihan created successfully.');
    }

    // Show the form to edit the documentation
    public function edit($id)
    {
        $dokumentasi = DokumentasiPelatihan::findOrFail($id);
        return view('dokumentasi.edit', compact('dokumentasi'));
    }

    // Update the documentation
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dokumentasi = DokumentasiPelatihan::findOrFail($id);

        $imageName = $dokumentasi->gambar;
        if ($request->hasFile('gambar')) {
            // Delete old image
            Storage::delete('public/dokumentasi/' . $dokumentasi->gambar);

            // Store new image
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('public/dokumentasi', $imageName);
        }

        $dokumentasi->update([
            'judul_pelatihan' => $request->judul_pelatihan,
            'deskripsi' => $request->deskripsi,
            'gambar' => $imageName,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi Pelatihan updated successfully.');
    }

    // Delete the documentation
    public function destroy($id)
    {
        $dokumentasi = DokumentasiPelatihan::findOrFail($id);
        
        // Delete image from storage
        Storage::delete('public/dokumentasi/' . $dokumentasi->gambar);

        $dokumentasi->delete();

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi Pelatihan deleted successfully.');
    }
}
