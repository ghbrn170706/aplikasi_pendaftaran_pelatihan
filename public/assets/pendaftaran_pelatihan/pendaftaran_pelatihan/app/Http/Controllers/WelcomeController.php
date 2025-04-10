<?php

namespace App\Http\Controllers;
use App\Models\Pembayaran;
use App\Models\PendapatAnggota;
use App\Models\Pelatihan; // Pastikan model Pelatihan sudah dibuat
use App\Models\PelatihanOnline;
use App\Models\DokumentasiPelatihan;
use App\Models\PelatihanOffline;
use App\Models\Kejuruan;


use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $kejuruan = Kejuruan::all();
        $pendapat = PendapatAnggota::all();
        $pelatihans_populer = Pelatihan::paginate(10);
           $pelatihanOffline = PelatihanOffline::all();
           $dokumentasi = DokumentasiPelatihan::all();
        $pembayarans = Pembayaran::all();   
        $pelatihans_online = PelatihanOnline::all();
        return view('welcome', compact('pelatihans_populer','dokumentasi','pelatihans_online','pelatihanOffline', 'pendapat','kejuruan')); // Passing data ke view
    }
}
 