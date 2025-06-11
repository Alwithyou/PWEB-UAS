<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        DB::table('pengguna')->insert([
            [
                'name' => 'Admin Utama',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
                'role' => 'admin',
                'status' => 'active',
                'address' => 'Jl. Merdeka No.1, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@example.com',
                'password' => Hash::make('userpassword'),
                'email_verified_at' => now(),
                'role' => 'user',
                'status' => 'active',
                'address' => 'Jl. Sudirman No.10, Bandung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
