<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranAdminController extends Controller
{
    /**
     * Display a listing of all payments for admin.
     */
    public function index()
    {
        // Fetch all payment data with related models (user and training)
        $pembayarans = Pembayaran::with(['pendaftaran.user', 'pendaftaran.pelatihan'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.pembayaran.index', compact('pembayarans'));
    }
}