<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        return view ('user.profil');
    }
}
