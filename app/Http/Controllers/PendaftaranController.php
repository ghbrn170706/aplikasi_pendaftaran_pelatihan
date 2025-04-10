<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Display a listing of the pendaftaran
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    // Show the form for creating a new pendaftaran
    public function create()
    {
        return view('pendaftaran.create');
    }

    // Store a newly created pendaftaran in storage
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'userID' => 'required|exists:users,id',
            'pelatihanID' => 'required|exists:pelatihan,id',
            'status' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
        ]);

        // Create a new Pendaftaran record
        Pendaftaran::create([
            'userID' => $request->userID,
            'pelatihanID' => $request->pelatihanID,
            'status' => $request->status,
            'tanggal_daftar' => $request->tanggal_daftar,
        ]);

        // Redirect to index page with a success message
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dibuat');
    }

    // Show the form for editing the specified pendaftaran
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('pendaftaran.edit', compact('pendaftaran'));
    }

    // Update the specified pendaftaran in storage
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'userID' => 'required|exists:users,id',
            'pelatihanID' => 'required|exists:pelatihan,id',
            'status' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
        ]);

        // Find and update the Pendaftaran record
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update([
            'userID' => $request->userID,
            'pelatihanID' => $request->pelatihanID,
            'status' => $request->status,
            'tanggal_daftar' => $request->tanggal_daftar,
        ]);

        // Redirect to index page with a success message
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil diperbarui');
    }

    // Remove the specified pendaftaran from storage
    public function destroy($id)
    {
        // Find and delete the Pendaftaran record
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        // Redirect to index page with a success message
        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus');
    }
}
