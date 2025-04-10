<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name is the plural form of the model)
    protected $table = 'profiles';

    protected $primaryKey = 'profileID'; // Sesuaikan dengan nama primary key di tabel
    public $incrementing = true; // Jika primary key adalah auto-increment
    
    protected $fillable = [
        'user_id', // Tambahkan ini
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
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
}
