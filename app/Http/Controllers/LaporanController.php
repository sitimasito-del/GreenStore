<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Laporan;
use App\Models\Mountain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
<<<<<<< HEAD
    // HALAMAN BUAT LAPORAN
=======
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6
    public function create($id)
    {
        $mountain = Mountain::findOrFail($id);

        return view('laporan.create', compact('mountain'));
    }

    public function store(Request $request)
    {
        $request->validate([
<<<<<<< HEAD

            'mountain_id' => 'required',

            'jenis_laporan' => 'required',

            'deskripsi' => 'required',

            'gambar' => 'nullable|image'
        ]);

        // UPLOAD GAMBAR
        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar')
                ->store(
                    'laporans',
                    'public'
                );
=======
            'mountain_id' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image'
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')
                ->store('laporan', 'public');
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6
        }

        // SIMPAN LAPORAN
        Laporan::create([
<<<<<<< HEAD

            'user_id' => Auth::id(),

=======
            'user_id' => Auth::id(),
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6
            'mountain_id' => $request->mountain_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath
        ]);

        return redirect('/riwayat')
            ->with(
                'success',
                'Laporan berhasil dikirim'
            );
    }

<<<<<<< HEAD
    // RIWAYAT USER
    public function riwayat()
    {
        $laporans = Laporan::with('mountain')
            ->where(
                'user_id',
                Auth::id()
            )
=======
    public function riwayat()
    {
        $laporans = Laporan::with('mountain')
            ->where('user_id', Auth::id())
>>>>>>> 2649c0eb5aba5c612d50adbe56020bd9fab984a6
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