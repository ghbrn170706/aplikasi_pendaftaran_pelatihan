<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard'); // Pastikan Anda memiliki view 'user.dashboard'
    }
}
