<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruPelatihan extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'guru_pelatihan';

    // Primary key dari tabel
    protected $primaryKey = 'gurupelatihanID';

    // Kolom yang dapat diisi (fillable) melalui mass assignment
    protected $fillable = [
        'gambar',
        'nama',
        'jurusan',
        'deskripsi_perjalanan_hidup',
        'spesialisasi_guru',
    ];

    // Timestamps otomatis diaktifkan
    public $timestamps = true;
}