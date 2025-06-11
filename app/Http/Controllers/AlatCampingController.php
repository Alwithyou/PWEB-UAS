<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamping;
use Illuminate\Support\Facades\Auth;

class AlatCampingController extends Controller
{
    public function index()
    {
        $alatSaya = AlatCamping::where('pengguna_id', Auth::id())->get();
        return view('user.KelolaAlat.index', compact('alatSaya'));
    }

    public function create()
    {
        return view('user.KelolaAlat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price_per_day' => 'required|numeric',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('alat_photos', 'public');
            $validated['photo'] = $path;
        }

        $validated['pengguna_id'] = Auth::id();
        $validated['status'] = 'available';

        AlatCamping::create($validated);

        return redirect()->route('user.kelola')->with('success', 'Alat berhasil ditambahkan!');
    }

    // Tambahkan edit, update, destroy nanti jika kamu siap
}

