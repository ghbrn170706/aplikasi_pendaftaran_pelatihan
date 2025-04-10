<?php

namespace App\Http\Controllers;

use App\Models\PelatihanOffline;
use Illuminate\Http\Request;

class PelatihanOfflineController extends Controller
{
    // Display a listing of the pelatihan offline
    public function index()
    {
        $pelatihan_offline = PelatihanOffline::all();
        return view('pelatihan_offline.index', compact('pelatihan_offline'));
    }

    // Show the form for creating a new pelatihan offline
    public function create()
    {
        return view('pelatihan_offline.create');
    }

    // Store a newly created pelatihan offline in storage
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jenis' => 'required|in:offline',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after_or_equal:jadwal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'foto_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pelatihanOffline = new PelatihanOffline($request->all());

        // Handle file upload if there's a photo
        if ($request->hasFile('foto_pelatihan')) {
            $file = $request->file('foto_pelatihan');
            $path = $file->store('images/pelatihan', 'public');
            $pelatihanOffline->foto_pelatihan = $path;
        }

        $pelatihanOffline->save();

        return redirect()->route('pelatihan_offline.index')->with('success', 'Pelatihan Offline created successfully.');
    }

    // Display the specified pelatihan offline
    public function show($id)
    {
        $pelatihanOffline = PelatihanOffline::findOrFail($id);
        return view('pelatihan_offline.show', compact('pelatihanOffline'));
    }

    // Show the form for editing the specified pelatihan offline
    public function edit($id)
    {
        $pelatihanOffline = PelatihanOffline::findOrFail($id);
        return view('pelatihan_offline.edit', compact('pelatihanOffline'));
    }

    // Update the specified pelatihan offline in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelatihan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jenis' => 'required|in:offline',
            'jadwal_mulai' => 'required|date',
            'jadwal_selesai' => 'required|date|after_or_equal:jadwal_mulai',
            'lokasi' => 'nullable|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'foto_pelatihan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pelatihanOffline = PelatihanOffline::findOrFail($id);
        $pelatihanOffline->update($request->all());

        // Handle file upload if there's a new photo
        if ($request->hasFile('foto_pelatihan')) {
            $file = $request->file('foto_pelatihan');
            $path = $file->store('images/pelatihan', 'public');
            $pelatihanOffline->foto_pelatihan = $path;
        }

        return redirect()->route('pelatihan_offline.index')->with('success', 'Pelatihan Offline updated successfully.');
    }

    // Remove the specified pelatihan offline from storage
    public function destroy($id)
    {
        $pelatihanOffline = PelatihanOffline::findOrFail($id);
        $pelatihanOffline->delete();

        return redirect()->route('pelatihan_offline.index')->with('success', 'Pelatihan Offline deleted successfully.');
    }
}
