<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Mountain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function create($id)
    {
        $mountain = Mountain::findOrFail($id);

        return view('laporan.create', compact('mountain'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mountain_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image'
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')
                ->store('laporan', 'public');
        }

        Laporan::create([
            'user_id' => Auth::id(),
            'mountain_id' => $request->mountain_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath
        ]);

        return redirect('/riwayat-laporan');
    }

    public function riwayat()
    {
        $laporans = Laporan::with('mountain')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('laporan.riwayat', compact('laporans'));
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return back();
    }
}