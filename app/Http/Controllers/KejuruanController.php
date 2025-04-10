<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kejuruan;
use Illuminate\Support\Facades\Storage;

class KejuruanController extends Controller
{
    public function index() {
        $kejuruan = Kejuruan::all(); // Pastikan model memiliki field id yang benar
        return view('kejuruan.index', compact('kejuruan'));
    }
    

    public function create()
    {
        return view('kejuruan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kejuruan' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('kejuruan_images', 'public');
        }

        Kejuruan::create([
            'nama_kejuruan' => $request->nama_kejuruan,
            'gambar' => $gambarPath
        ]);

        return redirect()->route('kejuruan.index')->with('success', 'Kejuruan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kejuruan = Kejuruan::findOrFail($id); // Cari data berdasarkan ID
        return view('kejuruan.edit', compact('kejuruan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kejuruan' => 'required|string|max:255',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $kejuruan = Kejuruan::findOrFail($id);
        
        if ($request->hasFile('gambar')) {
            if ($kejuruan->gambar) {
                Storage::disk('public')->delete($kejuruan->gambar);
            }
            $gambarPath = $request->file('gambar')->store('kejuruan_images', 'public');
            $kejuruan->gambar = $gambarPath;
        }

        $kejuruan->nama_kejuruan = $request->nama_kejuruan;
        $kejuruan->save();

        return redirect()->route('kejuruan.index')->with('success', 'Kejuruan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kejuruan = Kejuruan::findOrFail($id);
        if ($kejuruan->gambar) {
            Storage::disk('public')->delete($kejuruan->gambar);
        }
        $kejuruan->delete();

        return redirect()->route('kejuruan.index')->with('success', 'Kejuruan berhasil dihapus!');
    }
}
