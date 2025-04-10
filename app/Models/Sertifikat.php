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
        'email',
        'pelatihan',
        'tanggal',
        'background_image',
        'logo_penyelenggara',
        'nama_penyelenggara',
        'peran',
        'tanda_tangan_ketua',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
