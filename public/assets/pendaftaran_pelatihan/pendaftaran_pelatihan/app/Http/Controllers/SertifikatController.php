<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Sertifikat;
use Illuminate\Http\Request;
use App\Mail\SertifikatMail;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class SertifikatController extends Controller
{
    // Tampilkan semua sertifikat
    public function index()
    {
        $sertifikats = Sertifikat::all();
        return view('sertifikat.index', compact('sertifikats'));
    }

    // Form untuk membuat sertifikat
    public function create()
    {
        return view('sertifikat.create');
    }

    // Simpan data sertifikat
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pelatihan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'background_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'logo_penyelenggara' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'nama_penyelenggara' => 'nullable|string|max:255',
            'peran' => 'nullable|string|max:255',
            'tanda_tangan_ketua' => 'nullable|string', // Tanda tangan disimpan sebagai base64
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
    
        // Simpan data ke database
        Sertifikat::create([
            'nama' => $request->nama,
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

    public function generatePdf($id)
    {
        $sertifikat = Sertifikat::findOrFail($id);
    
        // Path untuk gambar latar belakang
        $backgroundImage = storage_path('app/public/' . $sertifikat->background_image);
    
        // Path untuk logo penyelenggara
        $logoPenyelenggara = $sertifikat->logo_penyelenggara ? storage_path('app/public/' . $sertifikat->logo_penyelenggara) : null;
    
        // Path untuk tanda tangan ketua
        $tandaTanganKetua = $sertifikat->tanda_tangan_ketua ? storage_path('app/public/' . $sertifikat->tanda_tangan_ketua) : null;
    
        // Periksa apakah file gambar latar belakang ada
        if (!file_exists($backgroundImage)) {
            return back()->with('error', 'Gambar latar tidak ditemukan.');
        }
    
        // Load view dengan data tambahan
        $pdf = Pdf::loadView('sertifikat.pdf', [
            'sertifikat' => $sertifikat,
            'backgroundImage' => $backgroundImage,
            'logoPenyelenggara' => $logoPenyelenggara,
            'tandaTanganKetua' => $tandaTanganKetua,
        ]);
    
        return $pdf->download('Sertifikat_' . $sertifikat->nama . '.pdf');
    }

    // Hapus data sertifikat
public function destroy($id)
{
    $sertifikat = Sertifikat::findOrFail($id);

    // Hapus gambar latar belakang dari storage
    if ($sertifikat->background_image) {
        $imagePath = storage_path('app/public/' . $sertifikat->background_image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Hapus data sertifikat dari database
    $sertifikat->delete();

    return redirect()->route('sertifikat.index')->with('success', 'Sertifikat berhasil dihapus.');
}

public function sendEmail($id)
{
    $sertifikat = Sertifikat::findOrFail($id);

    // Kirim email
    Mail::to('gpt26@gmail.com')->send(new SertifikatMail($sertifikat));

    return back()->with('success', 'Sertifikat telah dikirim melalui email.');
}
}
