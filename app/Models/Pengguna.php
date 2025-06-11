<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'pengguna';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'status', 'address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function alatCamping()
    {
        return $this->hasMany(AlatCamping::class, 'pengguna_id');
    }

}
