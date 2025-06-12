<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';

    protected $fillable = ['transaksi_id', 'alat_camping_id', 'total_price'];

    public function alatCamping()
    {
        return $this->belongsTo(AlatCamping::class, 'alat_camping_id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}
