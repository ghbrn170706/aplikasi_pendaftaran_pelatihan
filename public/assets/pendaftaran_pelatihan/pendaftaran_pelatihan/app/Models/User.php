<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // Deklarasi kolom yang bisa diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'otp',
        'otp_verified',
        'otp_token',
        'otp_expired_at',
        'google_id',
        'google_token',
        'refresh_token',
        'blocked',
        'token',
        'profile_image',
    ];
    
    // Kolom yang harus disembunyikan
    protected $hidden = [
        'password',
        'remember_token',
    ];

     // Relasi ke model Profile
     public function profile()
     {
         return $this->hasOne(Profile::class);
     }

    // Fungsi untuk memeriksa role pengguna
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }
    // Assuming a relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
