<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Pengguna;

class UserController extends Controller
{
    public function profil()
    {
        /** @var */
        $user = Auth::user();
        return view('user.profil', compact('user'));
    }

    public function editProfil()
    {
        /** @var */
        $user = Auth::user();
        return view('user.editProfil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        /** @var */
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('user.profil')->with('success', 'Profil berhasil diperbarui.');
    }
}
