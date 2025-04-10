<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelatihanOffline extends Model
{
   

    // The table associated with the model
    protected $table = 'pelatihan_offline';

    // The primary key for the table (optional if it's 'id')
    protected $primaryKey = 'pelatihanofflineID';

    // The attributes that are mass assignable
    protected $fillable = [
        'nama_pelatihan',
        'deskripsi',
        'jenis',
        'jadwal_mulai',
        'jadwal_selesai',
        'lokasi',
        'kapasitas',
        'harga',
        'foto_pelatihan',
    ];

    
}
