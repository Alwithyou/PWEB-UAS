<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlatCamping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlatCampingController extends Controller
{
    public function index()
    {
        $alat = AlatCamping::where('pengguna_id', Auth::id())->get();
        return view('user.barang.kelolaAlat', compact('alat'));
    }

    public function create()
    {
        return view('user.barang.tambahAlat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_day' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

    public function edit($id)
    {
        $alat = AlatCamping::where('pengguna_id', Auth::id())->findOrFail($id);
        return view('user.barang.editAlat', compact('alat'));
    }

    public function update(Request $request, $id)
    {
        $alat = AlatCamping::where('pengguna_id', Auth::id())->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_day' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($alat->photo && Storage::disk('public')->exists($alat->photo)) {
                Storage::disk('public')->delete($alat->photo);
            }

            $path = $request->file('photo')->store('alat_photos', 'public');
            $validated['photo'] = $path;
        }

        $alat->update($validated);

        return redirect()->route('user.kelola')->with('success', 'Alat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $alat = AlatCamping::where('pengguna_id', Auth::id())->findOrFail($id);

        if ($alat->photo && Storage::disk('public')->exists($alat->photo)) {
            Storage::disk('public')->delete($alat->photo);
        }

        $alat->delete();

        return redirect()->route('user.kelola')->with('success', 'Alat berhasil dihapus!');
    }

    public function dashboard(Request $request)
    {
        $alat = $this->getAlatData($request);
        $hasAlat = AlatCamping::where('pengguna_id', Auth::id())->exists();

        if ($request->ajax()) {
            return view('partials.alatCard', compact('alat'));
        }

        return view('user.dashboardUser', compact('alat', 'hasAlat'));
    }

    private function getAlatData(Request $request)
    {
        $query = AlatCamping::where('status', 'available');

        if ($request->has('search') && $request->search !== null) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return $query->get();
    }

    public function Market(Request $request)
    {
        $alat = $this->getAlatData($request);
        $hasAlat = Auth::check() ? AlatCamping::where('pengguna_id', Auth::id())->exists() : false;

        if ($request->ajax()) {
            return view('partials.alatCard', compact('alat'));
        }

        return view('market', compact('alat', 'hasAlat'));
    }


}
