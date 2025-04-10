<?php

// app/Http/Middleware/RoleMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }

        if (!Auth::check()) {
            // Jika user belum login
            return redirect()->route('login')->withErrors(['error' => 'Anda harus login terlebih dahulu.']);
        }
    
        $user = Auth::user();
    
        // Periksa status akun
        if (in_array($user->status, ['proses', 'ditolak'])) {
            Auth::logout(); // Pastikan user dikeluarkan jika sudah login
            return redirect()->route('login')->withErrors(['error' => 'Akun Anda sedang diproses atau ditolak. Silakan hubungi admin.']);
        }
    
        // Periksa role
        if (!in_array($user->role, $roles)) {
            return redirect()->route('forbidden')->withErrors(['error' => 'Anda tidak memiliki akses ke halaman ini.']);
        }
    
        return $next($request);
    }

}
