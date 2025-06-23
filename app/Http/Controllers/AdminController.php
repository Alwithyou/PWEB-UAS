<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
{
    return view('admin.dashboardadmin', [
        'totalUser' => \App\Models\Pengguna::count(),
        'totalAlat' => \App\Models\AlatCamping::count(),
        'totalPesanan' => \App\Models\Transaksi::count()
    ]);
}

}