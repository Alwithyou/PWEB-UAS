<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    

    public function showRegister()
    {
        return view('auth.register');
    }

    public function registerAjax(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = Pengguna::create($validated);

        Auth::login($user);
        $user->sendEmailVerificationNotification();

        return response()->json([
            'message' => 'Register berhasil, silakan verifikasi email.',
            'redirect' => route('verification.notice')
        ]);
    }


    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            $route = $user->role === 'admin'
                ? route('admin.dashboard')
                : route('user.dashboard');

            return response()->json([
                'message' => 'Login berhasil',
                'redirect' => $route
            ]);
        }

        return response()->json(['message' => 'Email atau password salah'], 401);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}