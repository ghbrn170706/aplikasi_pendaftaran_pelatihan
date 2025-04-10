<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Ensure this view exists in resources/views/admin/dashboard.blade.php
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // Other methods like users, settings, etc.
}
