<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    // Definisikan primary key
    protected $primaryKey = 'pembayaranID';

    // Jika primary key bukan auto-increment, tambahkan baris berikut:
    public $incrementing = true; // Default true, jika menggunakan bigIncrements

    protected $fillable = [
        'pelatihanID',
        'userID',
        'metode_pembayaran', 
        'tanggal_bayar',
        'jumlah_bayar',
        'bukti_bayar',
    ];

    // Relasi dengan tabel Pelatihan
    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class, 'pelatihanID');
    }

    // Relasi dengan tabel Users
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
