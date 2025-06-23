<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'pengguna_id',
        'start_date',
        'end_date',
        'address',
        'status',
        'returned_at',
        'notes',
        'identity_photo',
        'bukti_pembayaran'
    ];

    // Relasi ke pengguna (penyewa)
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    // Relasi ke detail transaksi (pivot alat)
    // Jika 1 transaksi hanya untuk 1 alat
public function detailTransaksi()
{
    return $this->hasOne(DetailTransaksi::class, 'transaksi_id');
}


public function alatCamping()
{
    return $this->hasOneThrough(
        \App\Models\AlatCamping::class,
        \App\Models\DetailTransaksi::class,
        'transaksi_id',      // Foreign key on DetailTransaksi
        'id',                // Foreign key on AlatCamping
        'id',                // Local key on Transaksi
        'alat_camping_id'    // Local key on DetailTransaksi
    );
}


}
