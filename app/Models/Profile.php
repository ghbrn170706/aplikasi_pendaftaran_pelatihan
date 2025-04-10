<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    // Primary key yang digunakan di tabel
    protected $primaryKey = 'profileID';
    public $incrementing = true; // Sesuaikan true/false sesuai apakah auto-increment
    protected $keyType = 'int';  // Jika primary key bertipe integer

    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'email',
        'nomor_hp',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'alamat_peserta',
        'pekerjaan',
        'gambar',
    ];

    // Relasi ke tabel users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
