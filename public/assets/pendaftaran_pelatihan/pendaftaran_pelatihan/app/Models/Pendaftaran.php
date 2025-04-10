<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    // Table name (optional if the name follows Laravel's naming convention)
    protected $table = 'pendaftaran';

    // Primary key (optional if the name follows Laravel's convention)
    protected $primaryKey = 'pendaftaranID';

    // If the primary key is not auto-incrementing
    public $incrementing = true;

    // Timestamps
    public $timestamps = true;

    // Mass assignable attributes
    protected $fillable = [
        'userID',
        'pelatihanID',
        'status',
        'tanggal_daftar',
    ];

    // Define relationships if needed (e.g., User and Pelatihan)
    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }


       // Relasi dengan Pelatihan
       public function pelatihan()
       {
           return $this->belongsTo(Pelatihan::class, 'pelatihanID');
       }
}
