<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\Sertifikat;
use App\Mail\SertifikatMail;
use Barryvdh\DomPDF\Facade\Pdf;

class SertifikatController extends Controller
{
    // Tampilkan semua sertifikat
    public function index()
    {
        $sertifikats = Sertifikat::all();
        return view('sertifikat.index', compact('sertifikats'));
    }

    // Tampilkan form untuk membuat sertifikat
    public function create()
    {
        return view('sertifikat.create');
    }

    // Simpan data sertifikat
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pelatihan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'background_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'logo_penyelenggara' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'nama_penyelenggara' => 'nullable|string|max:255',
            'peran' => 'nullable|string|max:255',
            'tanda_tangan_ketua' => 'nullable|string', // base64 image
        ]);

        // Upload background image
        $backgroundImagePath = null;
        if ($request->hasFile('background_image')) {
            $backgroundImagePath = $request->file('background_image')->store('images', 'public');
        }
    
        // Upload logo penyelenggara
        $logoPenyelenggaraPath = null;
        if ($request->hasFile('logo_penyelenggara')) {
            $logoPenyelenggaraPath = $request->file('logo_penyelenggara')->store('logos', 'public');
        }
    
        // Simpan tanda tangan sebagai file jika ada
        $tandaTanganKetuaPath = null;
        if ($request->tanda_tangan_ketua) {
            $tandaTanganKetuaPath = 'tanda_tangan/' . uniqid() . '.png';
            Storage::disk('public')->put($tandaTanganKetuaPath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->tanda_tangan_ketua)));
        }
    

        // Simpan tanda tangan base64 sebagai file jika ada
        $tandaTanganKetuaPath = null;
        if ($request->tanda_tangan_ketua) {
            $tandaTanganKetuaPath = 'tanda_tangan/' . uniqid() . '.png';
            $base64Data = preg_replace('#^data:image/\w+;base64,#i', '', $request->tanda_tangan_ketua);
            Storage::disk('public')->put($tandaTanganKetuaPath, base64_decode($base64Data));
        }

        // Simpan ke database
        Sertifikat::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pelatihan' => $request->pelatihan,
            'tanggal' => $request->tanggal,
            'background_image' => $backgroundImagePath,
            'logo_penyelenggara' => $logoPenyelenggaraPath,
            'nama_penyelenggara' => $request->nama_penyelenggara,
            'peran' => $request->peran,
            'tanda_tangan_ketua' => $tandaTanganKetuaPath,
        ]);

        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil dibuat.');
    }

    // Generate PDF sertifikat
    public function generatePdf($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        $backgroundImage = $sertifikat->background_image ? storage_path('app/public/' . $sertifikat->background_image) : null;
        $logoPenyelenggara = $sertifikat->logo_penyelenggara ? storage_path('app/public/' . $sertifikat->logo_penyelenggara) : null;
        $tandaTanganKetua = $sertifikat->tanda_tangan_ketua ? storage_path('app/public/' . $sertifikat->tanda_tangan_ketua) : null;

        // Pastikan file gambar ada
        if ($backgroundImage && !file_exists($backgroundImage)) {
            return back()->with('error', 'Gambar latar belakang tidak ditemukan.');
        }

        $pdf = Pdf::loadView('sertifikat.pdf', [
            'sertifikat' => $sertifikat,
            'backgroundImage' => $backgroundImage,
            'logoPenyelenggara' => $logoPenyelenggara,
            'tandaTanganKetua' => $tandaTanganKetua,
        ]);

        return $pdf->download('Sertifikat_' . $sertifikat->nama . '.pdf');
    }

    // Hapus sertifikat
    public function destroy($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        // Hapus file terkait jika ada
        foreach (['background_image', 'logo_penyelenggara', 'tanda_tangan_ketua'] as $field) {
            if ($sertifikat->$field) {
                $filePath = storage_path('app/public/' . $sertifikat->$field);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $sertifikat->delete();

        return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil dihapus.');
    }

    // Kirim sertifikat ke email
    public function sendEmail($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);

        if (!$sertifikat->email) {
            return back()->with('error', 'Email penerima tidak ditemukan.');
        }

        Mail::to($sertifikat->email)->send(new SertifikatMail($sertifikat));

        return back()->with('success', 'Sertifikat berhasil dikirim ke email.');
    }
}
