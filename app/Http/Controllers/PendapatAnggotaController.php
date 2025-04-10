<?php

namespace App\Http\Controllers;

use App\Models\PendapatAnggota;
use Illuminate\Http\Request;

class PendapatAnggotaController extends Controller
{
    public function index()
    {
        $pendapat = PendapatAnggota::all();
        return view('pendapat_anggota.index', compact('pendapat'));
    }

    public function create()
    {
        return view('pendapat_anggota.create');
    }

    public function show($id)
    {
        $pendapat = PendapatAnggota::findOrFail($id);
        return view('pendapat_anggota.show', compact('pendapat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'posisi_sebagai' => 'required|string|max:255',
            'jabatan_pekerjaan' => 'required|string|max:255',
            'gols' => 'nullable|string',
            'perjalanan_karir' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/pendapat_anggota', 'public');
        }

        PendapatAnggota::create([
            'nama_anggota' => $request->nama_anggota,
            'posisi_sebagai' => $request->posisi_sebagai,
            'jabatan_pekerjaan' => $request->jabatan_pekerjaan,
            'gols' => $request->gols,
            'perjalanan_karir' => $request->perjalanan_karir,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('pendapat_anggota.index')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'posisi_sebagai' => 'required|string|max:255',
            'jabatan_pekerjaan' => 'required|string|max:255',
            'gols' => 'nullable|string',
            'perjalanan_karir' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pendapat = PendapatAnggota::findOrFail($id);

        $data = [
            'nama_anggota' => $request->nama_anggota,
            'posisi_sebagai' => $request->posisi_sebagai,
            'jabatan_pekerjaan' => $request->jabatan_pekerjaan,
            'gols' => $request->gols,
            'perjalanan_karir' => $request->perjalanan_karir,
        ];

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/pendapat_anggota', 'public');
            $data['foto'] = $fotoPath;
        }

        $pendapat->update($data);

        return redirect()->route('pendapat_anggota.index')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function edit($id)
    {
        $pendapat = PendapatAnggota::findOrFail($id);
        return view('pendapat_anggota.edit', compact('pendapat'));
    }

    public function destroy($id)
    {
        $pendapat = PendapatAnggota::findOrFail($id);
        $pendapat->delete();

        return redirect()->route('pendapat_anggota.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}
