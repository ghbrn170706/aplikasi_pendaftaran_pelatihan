<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryPelatihan;
use App\Models\Pelatihan;
use App\Models\User;

class HistoryPelatihanController extends Controller
{
    /**
     * Tampilkan daftar riwayat pelatihan.
     */
    public function index()
{
    $history = HistoryPelatihan::where('user_id', auth()->id())->with('pelatihan')->get();
    return view('history_pelatihan.index', compact('history'));
}


    /**
     * Tampilkan form untuk menambahkan riwayat pelatihan.
     */
    public function create()
    {
        $users = User::all();
        $pelatihan = Pelatihan::all();
        return view('history_pelatihan.create', compact('users', 'pelatihan'));
    }

    /**
     * Simpan riwayat pelatihan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pelatihan_id' => 'required|exists:pelatihan,pelatihanID',
            'status' => 'required|in:belum_selesai,selesai'
        ]);

        HistoryPelatihan::create($request->all());
        return redirect()->route('history_pelatihan.index')->with('success', 'Riwayat pelatihan berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail riwayat pelatihan.
     */
    public function show($id)
    {
        $history = HistoryPelatihan::with('user', 'pelatihan')->findOrFail($id);
        return view('history_pelatihan.show', compact('history'));
    }

    /**
     * Tampilkan form edit riwayat pelatihan.
     */
    public function edit($id)
    {
        $history = HistoryPelatihan::findOrFail($id);
        $users = User::all();
        $pelatihan = Pelatihan::all();
        return view('history_pelatihan.edit', compact('history', 'users', 'pelatihan'));
    }

    /**
     * Perbarui riwayat pelatihan.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:belum_selesai,selesai'
        ]);

        $history = HistoryPelatihan::findOrFail($id);
        $history->update($request->all());
        return redirect()->route('history_pelatihan.index')->with('success', 'Riwayat pelatihan berhasil diperbarui.');
    }

    /**
     * Hapus riwayat pelatihan.
     */
    public function destroy($id)
    {
        $history = HistoryPelatihan::findOrFail($id);
        $history->delete();
        return redirect()->route('history_pelatihan.index')->with('success', 'Riwayat pelatihan berhasil dihapus.');
    }


    public function getPelatihan($userId)
{
    $user = User::find($userId);
    
    if (!$user) {
        return response()->json([]);
    }

    $pelatihan = $user->historyPelatihan()->with('pelatihan')->get()->map(function ($item) {
        return [
            'id' => $item->pelatihan->id,
            'nama_pelatihan' => $item->pelatihan->nama_pelatihan
        ];
    });

    return response()->json($pelatihan);
}

}
