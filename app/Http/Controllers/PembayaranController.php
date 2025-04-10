<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pelatihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    /**
     * Menampilkan semua data pembayaran.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pembayaran = Pembayaran::with(['pelatihan', 'user'])->latest()->first(); // Ambil 1 data terbaru
        return view('pembayaran.index', compact('pembayaran'));
    }
    

    /**
     * Menampilkan form untuk menambahkan pembayaran baru.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pelatihan = Pelatihan::first(); // Ambil pelatihan tertentu, bisa disesuaikan
        $user = auth()->user(); // Ambil user yang sedang login
    
        return view('pembayaran.create', compact('pelatihan', 'user'));
    }
    

    /**
     * Menyimpan data pembayaran baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pelatihanID' => 'required|exists:pelatihan,pelatihanID',
            'userID' => 'required|exists:users,id',
            'tanggal_bayar' => 'required|date',
            'jumlah_bayar' => 'required|numeric|min:0',
            'bukti_bayar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $buktiBayarPath = null;
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $buktiBayarPath = $file->storeAs('bukti_bayar', $fileName, 'public');
        }
    
        Pembayaran::create([
            'pelatihanID' => $request->pelatihanID,
            'userID' => $request->userID,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'bukti_bayar' => $buktiBayarPath,
        ]);
    
        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil disimpan.');
    }

    /**
     * Menampilkan detail pembayaran berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::with(['pelatihan', 'user'])->find($id);

        if (!$pembayaran) {
            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }

        return view('pembayaran.show', compact('pembayaran'));
    }

    /**
     * Menampilkan form untuk mengedit pembayaran.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }

        $pelatihan = Pelatihan::all();
        $users = User::all();

        return view('pembayaran.edit', compact('pembayaran', 'pelatihan', 'users'));
    }

    /**
     * Memperbarui data pembayaran berdasarkan ID.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'pelatihanID' => 'exists:pelatihan,pelatihanID',
            'userID' => 'exists:users,id',
            'tanggal_bayar' => 'date',
            'jumlah_bayar' => 'numeric|min:0',
            'bukti_bayar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('bukti_bayar')) {
            if ($pembayaran->bukti_bayar) {
                Storage::disk('public')->delete($pembayaran->bukti_bayar);
            }

            $file = $request->file('bukti_bayar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $buktiBayarPath = $file->storeAs('bukti_bayar', $fileName, 'public');
            $pembayaran->bukti_bayar = $buktiBayarPath;
        }

        $pembayaran->update([
            'pelatihanID' => $request->pelatihanID,
            'userID' => $request->userID,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    /**
     * Menghapus data pembayaran berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);

        if ($pembayaran->bukti_bayar) {
            Storage::disk('public')->delete($pembayaran->bukti_bayar);
        }

        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }
}