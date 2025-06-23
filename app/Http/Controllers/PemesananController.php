<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamping;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'address' => 'required|string|max:255',
        'identity_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $alat = AlatCamping::findOrFail($id);

    $identityPath = $request->file('identity_photo')->store('identitas', 'public');

    $transaksi = Transaksi::create([
        'pengguna_id' => auth()->id(),
        'status' => 'pending',
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'address' => $request->address,
        'identity_photo' => $identityPath,
    ]);

    DetailTransaksi::create([
        'transaksi_id' => $transaksi->id,
        'alat_camping_id' => $alat->id,
        'price_per_day' => $alat->price_per_day,
        'total_price' => $alat->price_per_day 
    ]);

    return response()->json(['message' => 'Pengajuan sewa berhasil diajukan!']);
}

        
    public function kelolaPesanan()
    {
        $userId = auth()->id();

        $pesanan = Transaksi::whereHas('detailTransaksi.alatCamping', function ($query) use ($userId) {$query->where('pengguna_id', $userId);
        })->with(['pengguna', 'detailTransaksi.alatCamping'])->orderBy('created_at', 'desc')->get();

        return view('user.pesanan.KelolaPesanan', compact('pesanan'));
    }

    public function detailPesanan($id)
    {
        $transaksi = Transaksi::with(['pengguna', 'detailTransaksi.alatCamping'])->findOrFail($id);

        return view('user.pesanan.detailPesanan', compact('transaksi'));

    }

    public function setujuiPesanan(Request $request, $id)
{
    $transaksi = Transaksi::findOrFail($id);
    $transaksi->status = 'approved';
    $transaksi->notes = $request->notes; // simpan catatan
    $transaksi->save();

    return back()->with('success', 'Pesanan disetujui.');
}

    
   public function tolakPesanan(Request $request, $id)
{
    $transaksi = Transaksi::findOrFail($id);
    $transaksi->status = 'rejected';
    $transaksi->notes = $request->notes; // simpan catatan
    $transaksi->save();

    return back()->with('success', 'Pesanan ditolak.');
}


    public function pemesananSaya()
    {
        return view('user.Sewa.pemesananSaya');


    }

    public function pemesananSayaData()
    {
        $transaksis = Transaksi::with('alatCamping')
            ->where('pengguna_id', Auth::id())
            ->latest()
            ->get();

        $data = $transaksis->map(function ($item) {
            return [
                 'id' => $item->id,
                 'nama_alat' => $item->alatCamping->name ?? 'N/A',
                 'tanggal_mulai' => $item->start_date,
                 'tanggal_selesai' => $item->end_date,
                 'status' => $item->status,
                 
            ];
        });

        return response()->json($data);
    }

    public function detailView($id)
{
    return view('user.Sewa.pemesananDetail', ['id' => $id]);
}
public function showdetail($id)
{
    $transaksi = Transaksi::with('detailTransaksi.alatCamping')->findOrFail($id);
    $detail = $transaksi->detailTransaksi;
    $alat = optional($detail)->alatCamping;

    return response()->json([
        'id' => $transaksi->id,
        'start_date' => $transaksi->start_date,
        'end_date' => $transaksi->end_date,
        'address' => $transaksi->address,
        'status' => $transaksi->status,
        'identity_photo' => $transaksi->identity_photo,
        'bukti_pembayaran' => $transaksi->bukti_pembayaran,
        'alat' => $alat ? [
            'name' => $alat->name,
            'description' => $alat->description,
            'photo' => $alat->photo,
        ] : null,
        'total_price' => $detail ? $detail->total_price : null,
        'notes' => $transaksi->notes,
    ]);

}



public function uploadBuktiPembayaran(Request $request, $id)
{
    try {
        \Log::debug("Upload dimulai untuk transaksi ID: {$id}");

        $transaksi = Transaksi::find($id);
        if (!$transaksi) {
            return response()->json(['success' => false, 'message' => 'Transaksi tidak ditemukan.'], 404);
        }

        if ($transaksi->status !== 'approved') {
            return response()->json(['success' => false, 'message' => 'Status pesanan belum disetujui.'], 403);
        }

        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (!$request->hasFile('bukti_pembayaran')) {
            return response()->json(['success' => false, 'message' => 'File tidak ditemukan.'], 400);
        }

        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        $transaksi->update([
            'bukti_pembayaran' => $path,
            'status' => 'menunggu_pengambilan',
        ]);

        return response()->json(['success' => true, 'message' => 'Upload berhasil!']);

    } catch (\Exception $e) {
        \Log::error('Upload Bukti Gagal: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Terjadi kesalahan: ' . $e->getMessage()
        ], 500);
    }
}

public function ubahStatusSewa($id)
{
    $transaksi = Transaksi::with('detailTransaksi.alatCamping')->findOrFail($id);

    $transaksi->status = 'disewa';
    $transaksi->save();

    if ($transaksi->detailTransaksi && $transaksi->detailTransaksi->alatCamping) {
        $transaksi->detailTransaksi->alatCamping->update(['status' => 'unavailable']);
    }

    return back()->with('success', 'Status diubah menjadi disewa.');
}

public function tandaiDikembalikan($id)
{
    $transaksi = Transaksi::with('detailTransaksi.alatCamping')->findOrFail($id);

    $transaksi->status = 'returned';
    $transaksi->returned_at = now();
    $transaksi->save();

    if ($transaksi->detailTransaksi && $transaksi->detailTransaksi->alatCamping) {
        $transaksi->detailTransaksi->alatCamping->update(['status' => 'available']);
    }

    return back()->with('success', 'Barang dikembalikan dan status diperbarui.');
}




}
