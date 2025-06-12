<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamping;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PemesananController extends Controller
{
    public function show($id)
    {
        $alat = AlatCamping::with('pengguna')->findOrFail($id);
        return view('user.detailAlat', compact('alat'));
    }

    public function formSewa($id)
    {
        $alat = AlatCamping::findOrFail($id);
        return view('user.Sewa.formSewa', compact('alat'));
    }
    public function prosesSewa(Request $request, $id)
    {
        $alat = AlatCamping::findOrFail($id);

        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'address' => 'required|string|max:255',
        ]);

        $days = Carbon::parse($request->start_date)->diffInDays(Carbon::parse($request->end_date)) + 1;
        $totalPrice = $alat->price_per_day * $days;

        $transaksi = Transaksi::create([
            'pengguna_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'address' => $request->address,
            'status' => 'pending',
        ]);

        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'alat_camping_id' => $alat->id,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Pemesanan berhasil diajukan!');
    }
        
    public function kelolaPesanan()
    {
        $userId = auth()->id();

        $pesanan = Transaksi::whereHas('detailTransaksi.alatCamping', function ($query) use ($userId) {
            $query->where('pengguna_id', $userId);
        })->with(['pengguna', 'detailTransaksi.alatCamping'])->orderBy('created_at', 'desc')->get();

        return view('user.pesanan.KelolaPesanan', compact('pesanan'));
    }

    public function detailPesanan($id)
    {
        $transaksi = Transaksi::with(['pengguna', 'detailTransaksi.alatCamping'])->findOrFail($id);

        return view('user.pesanan.detailPesanan', compact('transaksi'));

    }

    public function setujuiPesanan($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'approved';
        $transaksi->save();

        return redirect()->route('user.pesanan.kelola')->with('success', 'Pesanan disetujui.');
    }
    
    public function tolakPesanan($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = 'rejected';
        $transaksi->save();

        return redirect()->route('user.pesanan.kelola')->with('error', 'Pesanan ditolak.');
    }

}
