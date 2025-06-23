<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamping;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{

    public function kelolaAlat() {
        $alat = AlatCamping::with('pengguna')->get();
        return view('admin.kelolaAlat', compact('alat'));
    }

    public function kelolaPesanan() {
        $pesanan = Transaksi::with('pengguna')->orderBy('created_at', 'desc')->get();
        return view('admin.kelolaPesanan', compact('pesanan'));
    }

    public function kelolaUser() {
        $users = Pengguna::all();
        return view('admin.kelolaUser', compact('users'));
    }

    public function dashboard()
    {
        return view('admin.Dashboardadmin', [
            'totalUser' => \App\Models\Pengguna::count(),
            'totalAlat' => \App\Models\AlatCamping::count(),
            'totalPesanan' => \App\Models\Transaksi::count()
        ]);
    }

}