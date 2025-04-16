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
    public function index()
    {
        // Ambil semua data pembayaran dengan relasi pelatihan dan user, urutkan berdasarkan tanggal bayar terbaru
        $pembayaran = Pembayaran::with(['pelatihan', 'user'])->orderBy('tanggal_bayar', 'desc')->paginate(10);
    
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create(Request $request)
    {
        if ($request->has('method')) {
            session(['selectedPaymentMethod' => $request->method]);
        }
    
        $pelatihan = Pelatihan::findOrFail($request->pelatihanID);
        $user = auth()->user();
    
        return view('pembayaran.create', compact('pelatihan', 'user'));
    }
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pelatihanID' => 'required|exists:pelatihan,pelatihanID',
            'userID' => 'required|exists:users,id',
            'metode_pembayaran' => 'required|string|max:100',
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
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'bukti_bayar' => $buktiBayarPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pembayaran berhasil disimpan.');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['pelatihan', 'user'])->find($id);

        if (!$pembayaran) {
            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }

        return view('pembayaran.show', compact('pembayaran'));
    }

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

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);

        if (!$pembayaran) {
            return redirect()->route('pembayaran.index')->with('error', 'Pembayaran tidak ditemukan.');
        }

        $validator = Validator::make($request->all(), [
            'pelatihanID' => 'exists:pelatihan,pelatihanID',
            'userID' => 'exists:users,id',
            'metode_pembayaran' => 'required|string|max:100',
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
            'metode_pembayaran' => $request->metode_pembayaran,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);

        if ($pembayaran->bukti_bayar) {
            Storage::disk('public')->delete($pembayaran->bukti_bayar);
        }

        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dihapus.');
    }

    public function history()
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        // Ambil data hanya untuk user yang login
        $pembayaran = Pembayaran::with(['pelatihan'])
            ->where('userID', auth()->id()) // Filter strict by logged in user
            ->orderBy('tanggal_bayar', 'desc')
            ->paginate(10);
    
        // Debug data (hapus setelah testing)
        // dd($pembayaran);
    
        return view('pembayaran.history', compact('pembayaran'));
    }

}
