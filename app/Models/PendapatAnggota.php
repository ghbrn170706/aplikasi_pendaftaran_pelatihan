<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendapatAnggota extends Model
{
    protected $table = 'pendapat_anggota';

    protected $fillable = [
        'foto',
        'nama_anggota',
        'posisi_sebagai',
        'jabatan_pekerjaan',
        'gols',
        'perjalanan_karir',
    ];
    
}
