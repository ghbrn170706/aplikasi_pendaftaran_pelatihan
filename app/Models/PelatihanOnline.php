<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanOnline extends Model
{
    use HasFactory;

    protected $table = 'pelatihan_online'; // Nama tabel di database
    protected $primaryKey = 'pelatihanonlineID'; // Primary key tabel
    protected $fillable = [
        'nama_pelatihan',
        'deskripsi',
        'jenis',
        'jadwal_mulai',
        'jadwal_selesai',
        'kapasitas',
        'harga',
        'foto_pelatihan'
    ];

   
}
