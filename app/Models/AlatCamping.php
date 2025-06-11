<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlatCamping extends Model
{
    protected $table = 'alat_camping';

    protected $fillable = [
        'pengguna_id', 'name', 'description', 'price_per_day', 'photo', 'status',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }
}
