<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiPelatihan extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi_pelatihan';

    protected $primaryKey = 'dokumentasiID';

    protected $fillable = [
        'judul_pelatihan',
        'deskripsi',
        'gambar',
    ];

    // Optionally, you can add a method to retrieve the full path of the image
    public function getImageUrlAttribute()
    {
        return Storage::url('public/dokumentasi/' . $this->gambar);
    }
}
