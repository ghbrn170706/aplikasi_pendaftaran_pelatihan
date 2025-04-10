<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $table = 'sertifikats';

    protected $fillable = [
        'nama',
        'pelatihan',
        'tanggal',
        'background_image',
        'logo_penyelenggara', // Kolom baru
        'nama_penyelenggara', // Kolom baru
        'peran', // Kolom baru
        'tanda_tangan_ketua', // Kolom baru
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}