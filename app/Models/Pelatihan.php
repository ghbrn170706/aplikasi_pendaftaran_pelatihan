<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';
    protected $primaryKey = 'pelatihanID';
    public $timestamps = true;

    protected $fillable = [
        'nama_pelatihan',
        'deskripsi',
        'jenis',
        'jadwal_mulai',
        'jadwal_selesai',
        'lokasi',
        'kapasitas',
        'harga',
        'link_zoom',
        'foto_pelatihan',
        'sertifikat',
        'level',
        'kategori',
        'gambar_pelatihan',
        'sub_judul',
    ];

     // Relasi ke Pembayaran
     public function pembayaran()
     {
         return $this->hasMany(Pembayaran::class, 'pelatihanID');
     }
}
