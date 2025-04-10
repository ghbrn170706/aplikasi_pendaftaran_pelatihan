<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $profil = auth()->user()->profil; // asumsi relasi profil dimiliki oleh user
        return view('dashboard', compact('profil'));
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // Other methods like users, settings, etc.
}
